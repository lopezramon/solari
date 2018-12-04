<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Controllers\AppBaseController;
use App\Http\Requests\API\Admin\CreateRoomAPIRequest;
use App\Http\Requests\API\Admin\UpdateRoomAPIRequest;
use App\Models\Admin\Room;
use App\Repositories\Admin\BookingDetailRepository;
use App\Repositories\Admin\LockedRoomRepository;
use App\Repositories\Admin\RoomRepository;
use Carbon\Carbon;
use Illuminate\Http\Request;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class RoomController
 * @package App\Http\Controllers\API\Admin
 */

class RoomAPIController extends AppBaseController
{
    /** @var  RoomRepository */
    private $roomRepository;

    /** @var  LockedRoomRepository */
    private $lockedRoomRepository;

    /** @var  BookingDetail */
    private $bookingDetailRepository;

    public function __construct(RoomRepository $roomRepo,
        LockedRoomRepository $lockedRoomRepo,
        BookingDetailRepository $bookingDetailRepo)
    {
        $this->roomRepository = $roomRepo;
        $this->lockedRoomRepository = $lockedRoomRepo;
        $this->bookingDetailRepository = $bookingDetailRepo;
    }

    /**
     * Display a listing of the Room.
     * POST /rooms
     * @see http://localhost:8011/api/admin/rooms?checkin=2018-11-10&checkout=2018-11-25
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->roomRepository->pushCriteria(new RequestCriteria($request));
        $this->roomRepository->pushCriteria(new LimitOffsetCriteria($request));

        $input = $request->all();
        $checkin = $input['checkin'];
        $checkout = $input['checkout'];

        // $unavailableBookingDetailRooms = $this->bookingDetailRepository->findUnavailableBookingDetailRoomsInRange($checkin, $checkout);

        // // dd( $unavailableBookingDetailRooms );

        // $unavailableLockedRoomRooms = $this->lockedRoomRepository->findUnavailableLockedRoomRoomsInRange($checkin, $checkout);

        // // dd( $availableLockedRoomRooms );

        // $unavailableRooms = array_unique( array_merge($unavailableBookingDetailRooms, $unavailableLockedRoomRooms) );

        // // dd( $unavailableRooms );

        // ////////////////////////////
        // //////////////////////////
        // ////////////////////////

        $unavailableBookingDetailRooms = $this->findUnavailableRooms($checkin, $checkout, function($start_range_, $end_range_) {
            return $this->bookingDetailRepository->findWhere([
                ['checkin_date',    '>', $start_range_],
                ['checkout_date',   '<', $end_range_]
            ]);
        });

        // filtros para obtener un rango de busqueda mas centrado (mas o menos 3 <holgura default> meses el rango indicado por el usuario)
        $unavailableLockedRoomRooms = $this->findUnavailableRooms($checkin, $checkout, function($start_range_, $end_range_) {
            return $this->lockedRoomRepository->findWhere([
                ['checkin_date',    '>', $start_range_],
                ['checkout_date',   '<', $end_range_],

                # PENDIENTE que este valor (3) sea administrable
                ['locked_at',       '>', Carbon::now()->subMinutes(5)] // se buscan solo las rooms cuyo locked_at sea mayor a hace cinco minutos
            ]);
        });

        $unavailableRooms = array_unique( array_merge($unavailableBookingDetailRooms, $unavailableLockedRoomRooms) );

        // dd( $unavailableRooms );

        // ////////////////////////
        // //////////////////////////
        // ////////////////////////////

        $rooms = $this->roomRepository->getCustomized(null, $input, $unavailableRooms);

        return $this->sendResponse(['rooms' => $rooms], 'Rooms retrieved successfully');
    }

    /**
     * Obtener las habitaciones no disponibles en el rango de fechas indicado.

     * Para este proceso se manejan los siguientes cinco escenarios, del 1 al 4 son casos donde
     * la habitación no está disponible, en el caso cinco sí lo está.
     *
     * En cada uno de los casos, el rango A representa las fechas indicadas por el usuario, mientras que
     * el rango (o los rangos) B representan las fechas en donde la habitación está bloqueada, bien sea por
     * un booking ya realizado (tabla booking_details) o por un bloqueo temporal (tabla locked_rooms).
     *
     *
     * Case 1:
     * |---- Date Range A ----|                   _
     * _                   |---- Date Range B ----|
     *
     *
     * Case 2:
     * _                   |---- Date Range A ----|
     * |---- Date Range B ----|                   _
     *
     *
     * Case 3:
     * _         |---- Date Range A ----|         _
     * |-------------- Date Range B --------------|
     *
     *
     * Case 4:
     * |-------------- Date Range A --------------|
     * _         |---- Date Range B ----|         _
     *
     *
     * Case 5: ( SUCCESSFUL )
     * _                           |---- Date Range A ----|                           _
     * |---- Date Range B ----|                                |---- Date Range B ----|
     *
     *
     * @param string    $checkin
     * @param string    $checkout
     * @param int       $callbackModel Retorna el modelo desde el cual se obtendrán las habitaciones no disponibles
     *
     * @return
     */
    private function findUnavailableRooms( $checkin, $checkout, $callbackModel )
    {
        $checkin_request    = Carbon::createFromFormat('Y-m-d H', $checkin . ' 0');
        $checkout_request   = Carbon::createFromFormat('Y-m-d H', $checkout . ' 0');

        // holgura que se tendra en la busqueda contra los booking ya realizados.
        $start_range    = Carbon::createFromFormat('Y-m-d H', $checkin . ' 0')->subMonths(3);
        $end_range      = Carbon::createFromFormat('Y-m-d H', $checkout . ' 0')->addMonths(3);

        // filtros
        $model = $callbackModel($start_range, $end_range);

        $filteredModel = $model->filter(function($modelItem) use($checkin_request, $checkout_request) {
            // Check if overlap (Cases 1, 2 and 3)
            if ( $checkin_request->between($modelItem->checkin_date, $modelItem->checkout_date) ||
                    $checkout_request->between($modelItem->checkin_date, $modelItem->checkout_date) ) {
                return true;
            }

            // Check if overlap (Case 4)
            if ( $modelItem->checkin_date->between($checkin_request, $checkout_request) &&
                    $modelItem->checkout_date->between($checkin_request, $checkout_request) ) {
                return true;
            }

            return false;
        });

        $unavailableRooms = [];
        foreach ($filteredModel->toArray() as $item) {
            $unavailableRooms[] = $item['room']['id'];
        }

        return array_unique( $unavailableRooms );
    }

    /**
     * Store a newly created Room in storage.
     * POST /rooms
     *
     * @param CreateRoomAPIRequest $request
     *
     * @return Response
     */
    /*public function store(CreateRoomAPIRequest $request)
    {
        $input = $request->all();

        $rooms = $this->roomRepository->create($input);

        return $this->sendResponse($rooms->toArray(), 'Room saved successfully');
    }*/

    /**
     * Display the specified Room.
     * GET|HEAD /rooms/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Room $room */
        $room = $this->roomRepository->findCustomized($id);

        if (empty($room)) {
            return $this->sendError('Room not found');
        }

        return $this->sendResponse(['room' => $room], 'Room retrieved successfully');
    }

    /**
     * Lock the specified Room in the given range (checkin_date, checkout_date).
     *
     * $request = [
     *     'roomId'        => 1,
     *     'checkinDate'   => '2018-06-23',
     *     'checkoutDate'  => '2018-06-25'
     * ];
     *
     * POST /rooms/lock
     *
     * @param Request $request
     *
     * @return Response
     */
    public function lock(Request $request)
    {
        $data = $request->all();

        /** @var Room $room */
        $room = $this->roomRepository->findWithoutFail($data['roomId']);

        if (empty($room)) {
            return $this->sendError('Room not found');
        }

        // Bloquear la habitacion
        $lockedRoom = $this->lockedRoomRepository->lockRoom($room->id, $data['checkinDate'], $data['checkoutDate']);

        return $this->sendResponse(['room' => $room], 'Room locked successfully');
    }

    /**
     * Update the specified Room in storage.
     * PUT/PATCH /rooms/{id}
     *
     * @param  int $id
     * @param UpdateRoomAPIRequest $request
     *
     * @return Response
     */
    /*public function update($id, UpdateRoomAPIRequest $request)
    {
        $input = $request->all();

        // * @var Room $room
        $room = $this->roomRepository->findWithoutFail($id);

        if (empty($room)) {
            return $this->sendError('Room not found');
        }

        $room = $this->roomRepository->update($input, $id);

        return $this->sendResponse($room->toArray(), 'Room updated successfully');
    }*/

    /**
     * Remove the specified Room from storage.
     * DELETE /rooms/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    /*public function destroy($id)
    {
        // * @var Room $room
        $room = $this->roomRepository->findWithoutFail($id);

        if (empty($room)) {
            return $this->sendError('Room not found');
        }

        $room->delete();

        return $this->sendResponse($id, 'Room deleted successfully');
    }*/
}
