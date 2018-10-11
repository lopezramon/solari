<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Controllers\AppBaseController;
use App\Http\Controllers\MailController;
use App\Http\Requests\API\Admin\CreateOrderAPIRequest;
use App\Http\Requests\API\Admin\UpdateOrderAPIRequest;
use App\Models\Admin\Order;
use App\Repositories\Admin\AdditionalRepository;
use App\Repositories\Admin\OrderDetailAdditionalRepository;
use App\Repositories\Admin\OrderDetailRepository;
use App\Repositories\Admin\OrderRepository;
use App\Repositories\Admin\ProductPresentationProductRepository;
use App\Repositories\Admin\ProductRepository;
use App\Repositories\Admin\UserRepository;
use Illuminate\Http\Request;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class OrderController
 * @package App\Http\Controllers\API\Admin
 */

class OrderAPIController extends AppBaseController
{
    /** @var  OrderRepository */
    private $orderRepository;

    /** @var  OrderDetailRepository */
    private $orderDetailRepository;

    /** @var  OrderDetailAdditionalRepository */
    private $orderDetailAdditionalRepository;

    /** @var  ProductRepository */
    // private $productRepository;

    /** @var  ProductPresentationProductRepository */
    private $productPresentationProductRepository;

    /** @var  AdditionalRepository */
    private $additionalRepository;

    /** @var  UserRepository */
    private $userRepository;

    public function __construct(OrderRepository $orderRepo,
        OrderDetailRepository $orderDetailRepo,
        OrderDetailAdditionalRepository $orderDetailAdditionalRepo,
        // ProductRepository $productRepo,
        ProductPresentationProductRepository $productPresentationProductRepo,
        AdditionalRepository $additionalRepo,
        UserRepository $userRepo)
    {
        $this->orderRepository                      = $orderRepo;
        $this->orderDetailRepository                = $orderDetailRepo;
        $this->orderDetailAdditionalRepository      = $orderDetailAdditionalRepo;
        // $this->productRepository                    = $productRepo;
        $this->productPresentationProductRepository = $productPresentationProductRepo;
        $this->additionalRepository                 = $additionalRepo;
        $this->userRepository                       = $userRepo;
    }

    /**
     * Display a listing of the Order.
     * GET|HEAD /orders
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request, $user_id)
    {
        $this->orderRepository->pushCriteria(new RequestCriteria($request));
        $this->orderRepository->pushCriteria(new LimitOffsetCriteria($request));

        // OBTENEMOS LAS ORDENES QUE PERTENECEN AL USUARIO Y QUE TIENEN show_to_user=1
        $orders = $this->orderRepository->findWhere(['user_id' => $user_id, 'show_to_user' => 1]);

        $ordersWithRelations = collect();
        foreach ($orders as $order) {
            $ordersWithRelations->push( $this->orderRepository->getOrderWithRelations($order) );
        }

        return $this->sendResponse($ordersWithRelations->toArray(), 'Orders retrieved successfully');
    }

    /**
     * Store a newly created Order in storage.
     * POST /orders
     *
     * @param CreateOrderAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateOrderAPIRequest $request)
    {
        $input = $request->all();

        /*$array_store = [
            "data" => [
                "products_cart" => [
                    0 =>  [
                        "type_cart" => "productcart",
                        "id" => 2,
                        "name" => "Napoli",
                        "adicionales" => [],
                        "dimensiones" => [
                            "dimension_id" => "4",
                            "price" => "9",
                            "title" => "Giganti"
                        ],
                        "masas" => [
                            "masa_id" => "1",
                            "title" => "SCROCCHIARELLA"
                        ],
                        "total_item" => 9,
                        "image" => "image.jpg",
                        "total" => 18,
                        "cant" => 3
                    ],
                    1 =>  [
                        "type_cart" => "productcart",
                        "id" => 3,
                        "name" => "Marinara",
                        "adicionales" => [
                            0 => [
                                "adicional_id" => "1",
                                "title" => "Maiz",
                                "price" => "5"
                            ],
                            1 => [
                                "adicional_id" => "2",
                                "title" => "Jamon",
                                "price" => "7"
                            ]
                        ],
                        "dimensiones" => [
                            "dimension_id" => "6",
                            "price" => "9",
                            "title" => "Giganti"
                        ],
                        "masas" => [
                            "masa_id" => "1",
                            "title" => "SCROCCHIARELLA"
                        ],
                        "total_item" => 21,
                        "image" => "image.jpg",
                        "total" => 21,
                        "cant" => 4
                    ],
                    2 =>  [
                        "adicionales" => [],
                        "cant" => "2",
                        "dimensiones" => [
                            "dimension_id" => "4",
                            "price" => "9",
                            "title" => "Giganti"
                        ],
                        "id" => 26,
                        "image" => "image.jpg",
                        "masas" => [],
                        "name" => "Bianca Menù",
                        "total_item" => 12,
                        "total" => 24,
                        "type_cart" => "suggestion"
                    ]
                ],
                "cantidad" => 3,
                "total" => 63,
                "comentario_orden" => null,
                "formulario" => [
                    "email" => "steven.sucre@jumperr.com",
                    "name" => "Richard",
                    "lastName" => "Ramirez",
                    "phone" => "4334343434",
                    "delivery" => "test",
                    "hour" => "test",
                    "method" => "store"
                ],
                "user_id" => 3
            ]
        ];
        $input = $array_store;*/

        $data = $input['data'];

        // montos
        $total = 0;
        $iva = 0;

        // Save Order
        $order = $this->setOrderModel($data);

        foreach ($data['products_cart'] as $key => $productItem) {
            // Save OrderDetail
            $orderDetail = $this->setOrderDetailModel($productItem, $order);

            $additional_total_item = 0;
            $additional_iva_item   = 0;
            foreach ($productItem['adicionales'] as $keyJ => $additionalItem) {
                // Save OrderDetailAdditional
                $orderDetailAdditional = $this->setOrderDetailAdditionalModel($additionalItem, $orderDetail);

                // montos para el OrderDetailAdditional
                $additional_total_item += $orderDetail->product_quantity * $orderDetailAdditional->total_item;
                $additional_iva_item   += $orderDetail->product_quantity * $orderDetailAdditional->iva_item;
            }

            // montos para el OrderDetail
            $total_item = $orderDetail->total_item + $additional_total_item;
            $iva_item   = $orderDetail->iva_item + $additional_iva_item;

            // dd($total_item);

            // montos para el Order
            $total  += $total_item;
            $iva    += $iva_item;
        }

        // Update Order (para guardar los montos y generar codigo)
        $orderData = [];
        $orderData['subtotal']  = $total - $iva;
        $orderData['iva']       = $iva;
        $orderData['total']     = $total;
        $orderData['code']      = $this->orderRepository->generateCode( $order->id );
        $order = $this->orderRepository->update($orderData, $order->id);

        // ENVIAR CORREOOO
        $orderWithRelations = $this->orderRepository->getOrderWithRelations($order);
        $sended = $this->sendMail($orderWithRelations, 'order');


        if( $sended=='OK' ){
            $message = 'Order saved successfully, email sended';
        }
        else{
            $message = 'Order saved successfully, email not sended';
        }

        return $this->sendResponse($orderWithRelations, $message);
    }

    /**
     * Set and store the order.
     *
     * @param array     $data
     *
     * @return Order
     */
    private function setOrderModel( $data )
    {
        $order                  = [];

        // DATOS DE LA ORDEN
        $order['comment']       = $data['comentario_orden'];
        $order['total']         = $data['total'];

        // DATOS DEL USUARIO QUE REALIZA LA ORDEN
        $order['form_email']    = $data['formulario']['email'];
        $order['form_name']     = $data['formulario']['name'];
        $order['form_lastname'] = $data['formulario']['lastName'];
        $order['form_phone']    = $data['formulario']['phone'];

        // RELACION CON MODELO USER
        $user                   = $this->userRepository->findWithoutFail($data['user_id']);
        $order['user_id']       = $user->id ?? null;

        return $this->orderRepository->create($order);
    }

    /**
     * Set and store the order detail.
     *
     * @param object    $productItem
     * @param Order     $order
     *
     * @return OrderDetail
     */
    private function setOrderDetailModel( $productItem, $order )
    {
        $productPresentationProductId = $productItem['dimensiones']['dimension_id'];
        $productPresentationProduct = $this->productPresentationProductRepository->findWithoutFail($productPresentationProductId);

        $orderDetail                                    = [];
        $orderDetail['order_id']                        = $order->id;
        $orderDetail['product_presentation_product_id'] = $productItem['dimensiones']['dimension_id'];
        $orderDetail['product_feature_id']              = $productItem['masas']['masa_id'] ?? null;
        $orderDetail['product_quantity']                = $productItem['cant'];
        $orderDetail['total_item']                      = $productItem['cant'] * $productPresentationProduct->price;
        $orderDetail['iva_item']                        = ($productItem['cant'] * $productPresentationProduct->price) * $productPresentationProduct->iva;

        $orderDetail['type_cart']                       = $productItem['type_cart'];

        return $this->orderDetailRepository->create($orderDetail);
    }

    /**
     * Set and store the additionals of the order detail.
     *
     * @param object    $productItem
     * @param Order     $order
     *
     * @return OrderDetail
     */
    private function setOrderDetailAdditionalModel( $additionalItem, $orderDetail )
    {
        $additionalId = $additionalItem['adicional_id'];
        $additional = $this->additionalRepository->findWithoutFail($additionalId);

        $additionalItem['cant'] = 1; // ESTATICO

        $orderDetailAdditional                          = [];
        $orderDetailAdditional['order_detail_id']       = $orderDetail->id;
        $orderDetailAdditional['additional_id']         = $additionalItem['adicional_id'];
        $orderDetailAdditional['additional_quantity']   = $additionalItem['cant'];
        $orderDetailAdditional['total_item']            = $additionalItem['cant'] * $additional->price;
        $orderDetailAdditional['iva_item']              = ($additionalItem['cant'] * $additional->price) * $additional->iva;

        return $this->orderDetailAdditionalRepository->create($orderDetailAdditional);
    }

    /**
     * Send the mail of the invoice and the purchase order
     * Enviar el correo de la factura y la orden de compra
     * @param array $orderWithRelations
     * @param string $email
     * @return $flag
     */
    public function sendMail( $orderWithRelations, $template )
    {
        $request = [
            'subject'   => 'Subject TEST',
            'msg'       => json_encode($orderWithRelations),
            'email'     => $orderWithRelations->formulario->email,
            'data'      => (array)$orderWithRelations
        ];

        return MailController::sendMail($request, $template);
    }

    /**
     * Display the specified Order.
     * GET|HEAD /orders/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Order $order */
        $order = $this->orderRepository->findWithoutFail($id);

        if (empty($order) || $order->show_to_user != 1) {
            return $this->sendError('Order not found');
        }

        $orderWithRelations = $this->orderRepository->getOrderWithRelations($order);

        return $this->sendResponse($orderWithRelations, 'Order retrieved successfully');
    }

    /**
     * Update the field 'show_to_user' to '0'.
     * PUT/PATCH /orders/hide/{id}
     *
     * @param  int $id
     * @param Request $request
     *
     * @return Response
     */
    public function hide($id, Request $request)
    {
        /** @var Order $order */
        $order = $this->orderRepository->findWithoutFail($id);

        if (empty($order)) {
            return $this->sendError('Order not found');
        }

        $order = $this->orderRepository->update(['show_to_user' => 0], $id);

        return $this->sendResponse($order->id, 'Order hidden successfully');
    }

    /**
     * Update the specified Order in storage.
     * PUT/PATCH /orders/{id}
     *
     * @param  int $id
     * @param UpdateOrderAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateOrderAPIRequest $request)
    {
        $input = $request->all();

        /** @var Order $order */
        $order = $this->orderRepository->findWithoutFail($id);

        if (empty($order)) {
            return $this->sendError('Order not found');
        }

        $order = $this->orderRepository->update($input, $id);

        return $this->sendResponse($order->toArray(), 'Order updated successfully');
    }

    /**
     * Remove the specified Order from storage.
     * DELETE /orders/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Order $order */
        $order = $this->orderRepository->findWithoutFail($id);

        if (empty($order)) {
            return $this->sendError('Order not found');
        }

        $order->delete();

        return $this->sendResponse($id, 'Order deleted successfully');
    }
}



// DELIVERY
/*$array_delivery = [
    "data" => [
        "products_cart" => [
            0 =>  [
                "type_cart" => "productcart",
                "id" => 2,
                "name" => "Napoli",
                "adicionales" => [],
                "dimensiones" => [
                    "dimension_id" => "4",
                    "price" => "9",
                    "title" => "Giganti"
                ],
                "masas" => [
                    "masa_id" => "1",
                    "title" => "SCROCCHIARELLA"
                ],
                "total_item" => 9,
                "image" => "image.jpg",
                "total" => 18,
                "cant" => 2
            ]
        ],
        "cantidad" => 1,
        "total" => 18,
        "comentario_orden" => null,
        "formulario" => [
            "email" => "carla.ramirez@gmail.com",
            "name" => "Carla",
            "lastName" => "Solange",
            "phone" => "2332322323",
            "city" => "Caracas",
            "address" => "La candelaria",
            "floor" => "23323232",
            "method" => "delivery"
        ]
    ]
];*/

// STORE
/*$array_store = [
    "data" => [
        "products_cart" => [
            0 =>  [
                "type_cart" => "productcart",
                "id" => 2,
                "name" => "Napoli",
                "adicionales" => [],
                "dimensiones" => [
                    "dimension_id" => "4",
                    "price" => "9",
                    "title" => "Giganti"
                ],
                "masas" => [
                    "masa_id" => "1",
                    "title" => "SCROCCHIARELLA"
                ],
                "total_item" => 9,
                "image" => "image.jpg",
                "total" => 18,
                "cant" => 3
            ],
            1 =>  [
                "type_cart" => "productcart",
                "id" => 3,
                "name" => "Marinara",
                "adicionales" => [
                    0 => [
                        "adicional_id" => "1",
                        "title" => "Maiz",
                        "price" => "5"
                    ],
                    1 => [
                        "adicional_id" => "2",
                        "title" => "Jamon",
                        "price" => "7"
                    ]
                ],
                "dimensiones" => [
                    "dimension_id" => "6",
                    "price" => "9",
                    "title" => "Giganti"
                ],
                "masas" => [
                    "masa_id" => "1",
                    "title" => "SCROCCHIARELLA"
                ],
                "total_item" => 21,
                "image" => "image.jpg",
                "total" => 21,
                "cant" => 4
            ],
            2 =>  [
                "adicionales" => [],
                "cant" => "2",
                "dimensiones" => [
                    "dimension_id" => "4",
                    "price" => "9",
                    "title" => "Giganti"
                ],
                "id" => 26,
                "image" => "image.jpg",
                "masas" => [],
                "name" => "Bianca Menù",
                "total_item" => 12,
                "total" => 24,
                "type_cart" => "suggestion"
            ]
        ],
        "cantidad" => 3,
        "total" => 63,
        "comentario_orden" => null,
        "formulario" => [
            "email" => "steven.sucre@jumperr.com",
            "name" => "Richard",
            "lastName" => "Ramirez",
            "phone" => "4334343434",
            "delivery" => "test",
            "hour" => "test",
            "method" => "store"
        ],
        "user_id" => 3
    ]
];*/