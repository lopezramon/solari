<?php

namespace App\Repositories\Admin;

use App\Models\Admin\Order;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class OrderRepository
 * @package App\Repositories\Admin
 * @version August 28, 2018, 11:03 pm CEST
 *
 * @method Order findWithoutFail($id, $columns = ['*'])
 * @method Order find($id, $columns = ['*'])
 * @method Order first($columns = ['*'])
*/
class OrderRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'code',
        'user_id',
        'user_name',
        'user_email',
        'user_phone',
        'fiscal_code',
        'delivery_date',
        'store_date',
        'shipping_date',
        'shipping_address',
        'shipping_state',
        'shipping_city',
        'shipping_zip',
        'shipping_lat',
        'shipping_lng',
        'invoice_name',
        'invoice_fiscal_code',
        'invoice_sede_fiscal',
        'invoice_address',
        'invoice_city',
        'invoice_state',
        'invoice_zip',
        'total',
        'subtotal',
        'iva',
        'show_to_user',
        'status_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Order::class;
    }

    /**
     * Generate code with the given id.
     */
    public function generateCode( $id )
    {
        return str_pad($id, 4, '0', STR_PAD_LEFT);
    }

    /**
     * Find data by field and value.
     */
    public function getOrderWithRelations( $order )
    {
        $finalOrder = (object)[];

        // DATOS DE LA ORDEN
        $finalOrder->id                 = $order->id;
        $finalOrder->code               = $order->code;
        $finalOrder->subtotal           = $order->subtotal;
        $finalOrder->iva                = $order->iva;
        $finalOrder->total              = $order->total;
        $finalOrder->comentario_orden   = $order->comment;

        // FECHA Y ESTATUS
        $finalOrder->date               = $order->created_at->format('l d/m/Y');
        $finalOrder->status             = $order->status->statusTranslation()->name;

        // DATOS DEL USUARIO QUE REALIZA LA ORDEN
        $finalOrder->formulario             = (object)[];
        $finalOrder->formulario->email      = $order->form_email;
        $finalOrder->formulario->name       = $order->form_name;
        $finalOrder->formulario->lastName   = $order->form_lastname;
        $finalOrder->formulario->phone      = $order->form_phone;

        // datos de los productos de la orden (orderDetails)
        $finalOrder->products_cart = $this->getOrderDetails($order);

        // ID DEL USUARIO (O NULL)
        $finalOrder->user_id    = $order->user_id;

        return $finalOrder;
    }

    /**
     * Get all order details of a given order.
     *
     * @param  Order $order
     *
     * @return array
     */
    private function getOrderDetails( $order )
    {
        $products_cart = [];

        foreach ($order->orderDetails as $key => $orderDetail) {

            $products_cart[$key] = (object)[];
            $products_cart[$key]->type_cart     = $orderDetail->type_cart;
            $products_cart[$key]->id            = $orderDetail->productPresentationProduct->product->id;
            $products_cart[$key]->name          = $orderDetail->productPresentationProduct->product->productTranslation()->name;

            $products_cart[$key]->adicionales   = $this->getOrderDetailAdditionals($orderDetail);

            $products_cart[$key]->dimensiones   = [
                'dimension_id'  => $orderDetail->productPresentationProduct->id,
                'price'         => $orderDetail->productPresentationProduct->price,
                'title'         => $orderDetail->productPresentationProduct->productPresentation->productPresentationTranslation()->name
            ];

            $products_cart[$key]->masas = ($orderDetail->productFeature) ? [
                'masa_id'   => $orderDetail->productFeature->id,
                'title'     => $orderDetail->productFeature->productFeatureTranslation()->name
            ] : [];

            $products_cart[$key]->total_item    = $orderDetail->productPresentationProduct->price;
            $products_cart[$key]->total         = $orderDetail->total_item;
            $products_cart[$key]->iva_item      = $orderDetail->iva_item;
            $products_cart[$key]->image         = $orderDetail->productPresentationProduct->product->image;
            $products_cart[$key]->cant          = $orderDetail->product_quantity;
        }
        return $products_cart;
    }

    /**
     * Get all additionals of a given order detail.
     *
     * @param  OrderDetail $orderDetail
     *
     * @return array
     */
    private function getOrderDetailAdditionals( $orderDetail )
    {
        $adicionales = [];

        if ( $orderDetail->orderDetailAdditionals ) {
            foreach ($orderDetail->orderDetailAdditionals as $key => $orderDetailAdditional) {

                $adicionales[$key]                  = (object)[];
                $adicionales[$key]->adicional_id    = $orderDetailAdditional->additional->id;
                $adicionales[$key]->title           = $orderDetailAdditional->additional->additionalTranslation()->name;
                $adicionales[$key]->price           = $orderDetailAdditional->additional->price;
            }
        }

        return $adicionales;
    }
}
