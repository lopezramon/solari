<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Requests\API\Admin\CreateRoomAPIRequest;
use App\Http\Requests\API\Admin\UpdateRoomAPIRequest;
use App\Models\Admin\Room;
use App\Repositories\Admin\RoomRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
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

    public function __construct(RoomRepository $roomRepo)
    {
        $this->roomRepository = $roomRepo;
    }

    /**
     * Display a listing of the Room.
     * GET|HEAD /rooms
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->roomRepository->pushCriteria(new RequestCriteria($request));
        $this->roomRepository->pushCriteria(new LimitOffsetCriteria($request));
        $rooms = $this->roomRepository->all();

        return $this->sendResponse($rooms->toArray(), 'Rooms retrieved successfully');
    }

    /**
     * Store a newly created Room in storage.
     * POST /rooms
     *
     * @param CreateRoomAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateRoomAPIRequest $request)
    {
        $input = $request->all();

        $rooms = $this->roomRepository->create($input);

        return $this->sendResponse($rooms->toArray(), 'Room saved successfully');
    }

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
        $room = $this->roomRepository->findWithoutFail($id);

        if (empty($room)) {
            return $this->sendError('Room not found');
        }

        return $this->sendResponse($room->toArray(), 'Room retrieved successfully');
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
    public function update($id, UpdateRoomAPIRequest $request)
    {
        $input = $request->all();

        /** @var Room $room */
        $room = $this->roomRepository->findWithoutFail($id);

        if (empty($room)) {
            return $this->sendError('Room not found');
        }

        $room = $this->roomRepository->update($input, $id);

        return $this->sendResponse($room->toArray(), 'Room updated successfully');
    }

    /**
     * Remove the specified Room from storage.
     * DELETE /rooms/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Room $room */
        $room = $this->roomRepository->findWithoutFail($id);

        if (empty($room)) {
            return $this->sendError('Room not found');
        }

        $room->delete();

        return $this->sendResponse($id, 'Room deleted successfully');
    }
}