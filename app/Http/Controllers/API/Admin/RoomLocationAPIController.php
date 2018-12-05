<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Requests\API\Admin\CreateRoomLocationAPIRequest;
use App\Http\Requests\API\Admin\UpdateRoomLocationAPIRequest;
use App\Models\Admin\RoomLocation;
use App\Repositories\Admin\RoomLocationRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class RoomLocationController
 * @package App\Http\Controllers\API\Admin
 */

class RoomLocationAPIController extends AppBaseController
{
    /** @var  RoomLocationRepository */
    private $roomLocationRepository;

    public function __construct(RoomLocationRepository $roomLocationRepo)
    {
        $this->roomLocationRepository = $roomLocationRepo;
    }

    /**
     * Display a listing of the RoomLocation.
     * GET|HEAD /roomLocations
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->roomLocationRepository->pushCriteria(new RequestCriteria($request));
        $this->roomLocationRepository->pushCriteria(new LimitOffsetCriteria($request));
        $roomLocations = $this->roomLocationRepository->all();

        return $this->sendResponse($roomLocations->toArray(), 'Room Locations retrieved successfully');
    }

    /**
     * Store a newly created RoomLocation in storage.
     * POST /roomLocations
     *
     * @param CreateRoomLocationAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateRoomLocationAPIRequest $request)
    {
        $input = $request->all();

        $roomLocations = $this->roomLocationRepository->create($input);

        return $this->sendResponse($roomLocations->toArray(), 'Room Location saved successfully');
    }

    /**
     * Display the specified RoomLocation.
     * GET|HEAD /roomLocations/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var RoomLocation $roomLocation */
        $roomLocation = $this->roomLocationRepository->findWithoutFail($id);

        if (empty($roomLocation)) {
            return $this->sendError('Room Location not found');
        }

        return $this->sendResponse($roomLocation->toArray(), 'Room Location retrieved successfully');
    }

    /**
     * Update the specified RoomLocation in storage.
     * PUT/PATCH /roomLocations/{id}
     *
     * @param  int $id
     * @param UpdateRoomLocationAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateRoomLocationAPIRequest $request)
    {
        $input = $request->all();

        /** @var RoomLocation $roomLocation */
        $roomLocation = $this->roomLocationRepository->findWithoutFail($id);

        if (empty($roomLocation)) {
            return $this->sendError('Room Location not found');
        }

        $roomLocation = $this->roomLocationRepository->update($input, $id);

        return $this->sendResponse($roomLocation->toArray(), 'RoomLocation updated successfully');
    }

    /**
     * Remove the specified RoomLocation from storage.
     * DELETE /roomLocations/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var RoomLocation $roomLocation */
        $roomLocation = $this->roomLocationRepository->findWithoutFail($id);

        if (empty($roomLocation)) {
            return $this->sendError('Room Location not found');
        }

        $roomLocation->delete();

        return $this->sendResponse($id, 'Room Location deleted successfully');
    }
}
