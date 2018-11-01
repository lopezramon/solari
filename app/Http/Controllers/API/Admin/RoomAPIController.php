<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Controllers\AppBaseController;
use App\Http\Requests\API\Admin\CreateRoomAPIRequest;
use App\Http\Requests\API\Admin\UpdateRoomAPIRequest;
use App\Models\Admin\Room;
use App\Repositories\Admin\BookingDetailRepository;
use App\Repositories\Admin\LockedRoomRepository;
use App\Repositories\Admin\RoomRepository;
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
     * GET|HEAD /rooms
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

        $availableBookingDetailRooms = $this->bookingDetailRepository->findAvailableRoomsInRange($checkin, $checkout);


        $availableLockedRoomRooms;

        $rooms = $this->roomRepository->getCustomized(null, $input);

        return $this->sendResponse(['rooms' => $rooms], 'Rooms retrieved successfully');
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
