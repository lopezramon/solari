<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Controllers\AppBaseController;
use App\Http\Requests\API\Admin\CreateBookingAPIRequest;
use App\Http\Requests\API\Admin\UpdateBookingAPIRequest;
use App\Models\Admin\Booking;
use App\Repositories\Admin\BookingDetailRepository;
use App\Repositories\Admin\BookingRepository;
use App\Repositories\Admin\FormDataRepository;
use App\Repositories\Admin\RoomRepository;
use App\Repositories\Admin\UserRepository;
use Illuminate\Http\Request;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class BookingController
 * @package App\Http\Controllers\API\Admin
 */

class BookingAPIController extends AppBaseController
{
    /** @var  BookingRepository */
    private $bookingRepository;

    /** @var  BookingDetailRepository */
    private $bookingDetailRepository;

    /** @var  FormDataRepository */
    private $formDataRepository;

    /** @var  UserRepository */
    private $userRepository;

    /** @var  RoomRepository */
    private $roomRepository;

    public function __construct(BookingRepository $bookingRepo,
        BookingDetailRepository $bookingDetailRepo,
        FormDataRepository $formDataRepo,
        UserRepository $userRepo,
        RoomRepository $roomRepo)
    {
        $this->bookingRepository = $bookingRepo;
        $this->bookingDetailRepository = $bookingDetailRepo;
        $this->formDataRepository = $formDataRepo;
        $this->userRepository = $userRepo;
        $this->roomRepository = $roomRepo;
    }

    /**
     * Display a listing of the Booking.
     * GET|HEAD /bookings
     *
     * @param Request $request
     * @param integer $user_id
     * @return Response
     */
    public function index(Request $request, $user_id)
    {
        $this->bookingRepository->pushCriteria(new RequestCriteria($request));
        $this->bookingRepository->pushCriteria(new LimitOffsetCriteria($request));

        // OBTENEMOS LAS ORDENES QUE PERTENECEN AL USUARIO Y QUE TIENEN show_to_user=1
        $bookings = $this->bookingRepository->findWhere(['user_id' => $user_id, 'show_to_user' => 1]);

        $bookingsWithRelations = collect();
        foreach ($bookings as $booking) {
            $bookingsWithRelations->push( $this->bookingRepository->findCustomized($booking->id) );
        }

        return $this->sendResponse(['bookings' => $bookingsWithRelations->toArray()], 'Bookings retrieved successfully');
    }

    /**
     * Store a newly created Booking in storage.
     * POST /bookings
     *
     * @param CreateBookingAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateBookingAPIRequest $request)
    {
        $input = $request->all();
        /*$input = (object)[
            'orden' => (object)[
                'cart' => (object)[
                    'adult' => 2,
                    'cart'  => [
                        'id' => 1
                    ],
                    'checkin'   => '2018-09-18',
                    'checkout'  => '2018-09-25',
                    'total'     => 59.05,
                    'iva'       => 12.99
                ],
                'comentario'    => 'Hola',
                'datos_reserva' => [
                    (object)[
                        'email'     => 'steven.sucre@jumperr.com',
                        'idroom'    => 1,
                        'name'      => 'Steven Sucre',
                        'numero'    => '1'
                    ]
                ],
                'user_id'       => 1
            ]
        ];*/

        $data = (array)$input->orden;

        // montos
        $total  = 0;
        $iva    = 0;

        // Save Booking
        $booking = $this->setBookingModel( $data );

        foreach ($data['datos_reserva'] as $key => $roomItem) {

            // Save BookingDetail
            $bookingDetail = $this->setBookingDetailModel($roomItem, $booking);

            // montos para el BookingDetail
            $total  += $bookingDetail->total_item;
            $iva    += $bookingDetail->iva_item;
        }

        // Update Booking (para guardar los montos y generar codigo)
        $bookingData = [];
        $bookingData['subtotal']    = $total - $iva;
        $bookingData['iva']         = $iva;
        $bookingData['total']       = $total;
        $bookingData['code']        = $this->bookingRepository->generateCode($booking->id);
        $booking = $this->bookingRepository->update($bookingData, $booking->id);

        // ENVIAR CORREOOO
        $bookingWithRelations = $this->bookingRepository->findCustomized($booking->id);
        // $sended = $this->sendMail($bookingWithRelations, 'booking'); #PENDIENTE
        $sended = 'NOK';

        if( $sended == 'OK' ){
            $message = 'Booking saved successfully, email sended';
        }
        else{
            $message = 'Booking saved successfully, email not sended';
        }

        return $this->sendResponse($bookingWithRelations, $message);
    }

    /**
     * Set and store the booking.
     *
     * @param array $data
     *
     * @return Booking
     */
    private function setBookingModel( $data )
    {
        $booking                    = [];

        // RELACION CON MODELO USER
        $user                       = $this->userRepository->findWithoutFail($data['user_id']);
        $booking['user_id']         = $user->id ?? null;

        // DATOS DE LA ORDEN
        $booking['checkin_date']    = $data['cart']->checkin;
        $booking['checkout_date']   = $data['cart']->checkout;
        $booking['subtotal']        = $data['cart']->total - $data['cart']->iva;
        $booking['iva']             = $data['cart']->iva;
        $booking['total']           = $data['cart']->total;
        $booking['comment']         = $data['comentario'];

        return $this->bookingRepository->create($booking);
    }

    /**
     * Set and store the booking detail.
     *
     * @param object    $roomItem
     * @param Order     $booking
     *
     * @return BookingDetail
     */
    private function setBookingDetailModel( $roomItem, $booking )
    {
        $roomId = $roomItem->idroom;
        $room = $this->roomRepository->findWithoutFail($roomId);

        // booking datail
        $bookingDetail                      = [];
        $bookingDetail['booking_id']        = $booking->id;
        $bookingDetail['row_id']            = $room->row->id;
        $bookingDetail['adult_quantity']    = $roomItem->numero;

        // form data
        $formData = $this->setFormDataModel( $roomItem );
        $bookingDetail['form_data_id']      = $formData->id;

        // montos
        $dates = [
            'checkin'   => $booking->checkin_date->toDateString(),
            'checkout'  => $booking->checkout_date->toDateString()
        ];
        $ivaAndPrice = $this->roomRepository->getCurrentIvaAndPrice($room, $dates);
        $bookingDetail['total_item']        = $ivaAndPrice['price'];
        $bookingDetail['iva_item']          = $ivaAndPrice['iva'];

        // dd($ivaAndPrice);
        return $this->bookingDetailRepository->create($bookingDetail);
    }

    /**
     * Set and store the form data for the given booking detail.
     *
     * @param object    $roomItem
     *
     * @return FormData
     */
    private function setFormDataModel( $roomItem )
    {
        $formData           = [];
        $formData['name']   = $roomItem->name;
        $formData['email']  = $roomItem->email;

        return $this->formDataRepository->create($formData);
    }

    /**
     * Display the specified Booking.
     * GET|HEAD /bookings/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $booking = $this->bookingRepository->findWithoutFail($id);

        if (empty($booking)) {
            return $this->sendError('Booking not found');
        }

        // $bookingWithRelations = $this->bookingRepository->getOrderWithRelations($booking);
        $bookingWithRelations = $this->bookingRepository->findCustomized($booking->id);

        return $this->sendResponse(['booking' => $bookingWithRelations], 'Booking retrieved successfully');
    }

    /**
     * Update the specified Booking in storage.
     * PUT/PATCH /bookings/{id}
     *
     * @param  int $id
     * @param UpdateBookingAPIRequest $request
     *
     * @return Response
     */
    /*public function update($id, UpdateBookingAPIRequest $request)
    {
        $input = $request->all();

        $booking = $this->bookingRepository->findWithoutFail($id);

        if (empty($booking)) {
            return $this->sendError('Booking not found');
        }

        $booking = $this->bookingRepository->update($input, $id);

        return $this->sendResponse($booking->toArray(), 'Booking updated successfully');
    }*/

    /**
     * Remove the specified Booking from storage.
     * DELETE /bookings/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    /*public function destroy($id)
    {
        $booking = $this->bookingRepository->findWithoutFail($id);

        if (empty($booking)) {
            return $this->sendError('Booking not found');
        }

        $booking->delete();

        return $this->sendResponse($id, 'Booking deleted successfully');
    }*/
}
