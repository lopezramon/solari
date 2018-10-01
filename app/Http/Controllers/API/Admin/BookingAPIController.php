<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Controllers\AppBaseController;
use App\Http\Controllers\MailController;
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

        // OBTENEMOS LAS BOOKINGS QUE PERTENECEN AL USUARIO Y QUE TIENEN show_to_user=1
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
        $input = [
            'comentario'    => 'Hola 2',
            'datos_reserva' => [
                [
                    'idroom'    => 1,
                    'email'     => 'otro.sucre2@jumperr.com',
                    'name'      => 'Otro Sucre2',
                    'numero'    => '1'
                ]
            ],
            'cart' => [
                'checkin'   => '2018-09-18',
                'checkout'  => '2018-09-25',
                'adult'     => 2,
                'cart'  => [
                    'id' => 1
                ],
                'total'     => 59.05
            ],
            'responsable' => [
              'name'        => 'Carla',
              'email'       => 'steven.sucre@jumperr.com',
              'phone'       => '323232232323',
              'identidad'   => '2332233223'
            ],
            'user_id'       => 2,
        ];

        $data = (array)$input;

        // Save Booking
        $booking = $this->bookingRepository->createCustomized($data);

        // Get BookingWithRelations
        $bookingWithRelations = $this->bookingRepository->findCustomized($booking->id);

        // Guardar Correo
        $sended = $this->sendMail($bookingWithRelations, 'order'); #PENDIENTE
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
     * Send the mail of the invoice and the purchase BOOKING
     * @param array $bookingWithRelations
     * @param string $template
     * @return void
     */
    public function sendMail( $bookingWithRelations, $template )
    {
        $request = [
            'subject'   => 'Subject TEST',
            'msg'       => json_encode($bookingWithRelations),
            'email'     => $bookingWithRelations['responsable']['email'],
            'data'      => (array)$bookingWithRelations
        ];

        // dd($bookingWithRelations['responsable']);

        return MailController::sendMail($request, $template);
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

        // $bookingWithRelations = $this->bookingRepository->getBookingWithRelations($booking);
        $bookingWithRelations = $this->bookingRepository->findCustomized($booking->id);

        return $this->sendResponse(['booking' => $bookingWithRelations], 'Booking retrieved successfully');
    }

    /**
     * Update the field 'show_to_user' to '0'.
     * PUT/PATCH /bookings/hide/{id}
     *
     * @param  int $id
     * @param Request $request
     *
     * @return Response
     */
    public function hide($id, Request $request)
    {
        /** @var Booking $booking */
        $booking = $this->bookingRepository->findWithoutFail($id);

        if (empty($booking)) {
            return $this->sendError('Booking not found');
        }

        $booking = $this->bookingRepository->update(['show_to_user' => 0], $id);

        return $this->sendResponse($booking->id, 'Booking hidden successfully');
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
