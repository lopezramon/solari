<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Requests\API\Admin\CreateLockedRoomAPIRequest;
use App\Http\Requests\API\Admin\UpdateLockedRoomAPIRequest;
use App\Models\Admin\LockedRoom;
use App\Repositories\Admin\LockedRoomRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class LockedRoomController
 * @package App\Http\Controllers\API\Admin
 */

class LockedRoomAPIController extends AppBaseController
{
    /** @var  LockedRoomRepository */
    private $lockedRoomRepository;

    public function __construct(LockedRoomRepository $lockedRoomRepo)
    {
        $this->lockedRoomRepository = $lockedRoomRepo;
    }

    /**
     * Display a listing of the LockedRoom.
     * GET|HEAD /lockedRooms
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->lockedRoomRepository->pushCriteria(new RequestCriteria($request));
        $this->lockedRoomRepository->pushCriteria(new LimitOffsetCriteria($request));
        $lockedRooms = $this->lockedRoomRepository->all();

        return $this->sendResponse($lockedRooms->toArray(), 'Locked Rooms retrieved successfully');
    }

    /**
     * Store a newly created LockedRoom in storage.
     * POST /lockedRooms
     *
     * @param CreateLockedRoomAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateLockedRoomAPIRequest $request)
    {
        $input = $request->all();

        $lockedRooms = $this->lockedRoomRepository->create($input);

        return $this->sendResponse($lockedRooms->toArray(), 'Locked Room saved successfully');
    }

    /**
     * Display the specified LockedRoom.
     * GET|HEAD /lockedRooms/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var LockedRoom $lockedRoom */
        $lockedRoom = $this->lockedRoomRepository->findWithoutFail($id);

        if (empty($lockedRoom)) {
            return $this->sendError('Locked Room not found');
        }

        return $this->sendResponse($lockedRoom->toArray(), 'Locked Room retrieved successfully');
    }

    /**
     * Update the specified LockedRoom in storage.
     * PUT/PATCH /lockedRooms/{id}
     *
     * @param  int $id
     * @param UpdateLockedRoomAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateLockedRoomAPIRequest $request)
    {
        $input = $request->all();

        /** @var LockedRoom $lockedRoom */
        $lockedRoom = $this->lockedRoomRepository->findWithoutFail($id);

        if (empty($lockedRoom)) {
            return $this->sendError('Locked Room not found');
        }

        $lockedRoom = $this->lockedRoomRepository->update($input, $id);

        return $this->sendResponse($lockedRoom->toArray(), 'LockedRoom updated successfully');
    }

    /**
     * Remove the specified LockedRoom from storage.
     * DELETE /lockedRooms/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var LockedRoom $lockedRoom */
        $lockedRoom = $this->lockedRoomRepository->findWithoutFail($id);

        if (empty($lockedRoom)) {
            return $this->sendError('Locked Room not found');
        }

        $lockedRoom->delete();

        return $this->sendResponse($id, 'Locked Room deleted successfully');
    }
}
