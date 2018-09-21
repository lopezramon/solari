<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Requests\API\Admin\CreateRoomSeasonAPIRequest;
use App\Http\Requests\API\Admin\UpdateRoomSeasonAPIRequest;
use App\Models\Admin\RoomSeason;
use App\Repositories\Admin\RoomSeasonRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class RoomSeasonController
 * @package App\Http\Controllers\API\Admin
 */

class RoomSeasonAPIController extends AppBaseController
{
    /** @var  RoomSeasonRepository */
    private $roomSeasonRepository;

    public function __construct(RoomSeasonRepository $roomSeasonRepo)
    {
        $this->roomSeasonRepository = $roomSeasonRepo;
    }

    /**
     * Display a listing of the RoomSeason.
     * GET|HEAD /roomSeasons
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->roomSeasonRepository->pushCriteria(new RequestCriteria($request));
        $this->roomSeasonRepository->pushCriteria(new LimitOffsetCriteria($request));
        $roomSeasons = $this->roomSeasonRepository->all();

        return $this->sendResponse($roomSeasons->toArray(), 'Room Seasons retrieved successfully');
    }

    /**
     * Store a newly created RoomSeason in storage.
     * POST /roomSeasons
     *
     * @param CreateRoomSeasonAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateRoomSeasonAPIRequest $request)
    {
        $input = $request->all();

        $roomSeasons = $this->roomSeasonRepository->create($input);

        return $this->sendResponse($roomSeasons->toArray(), 'Room Season saved successfully');
    }

    /**
     * Display the specified RoomSeason.
     * GET|HEAD /roomSeasons/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var RoomSeason $roomSeason */
        $roomSeason = $this->roomSeasonRepository->findWithoutFail($id);

        if (empty($roomSeason)) {
            return $this->sendError('Room Season not found');
        }

        return $this->sendResponse($roomSeason->toArray(), 'Room Season retrieved successfully');
    }

    /**
     * Update the specified RoomSeason in storage.
     * PUT/PATCH /roomSeasons/{id}
     *
     * @param  int $id
     * @param UpdateRoomSeasonAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateRoomSeasonAPIRequest $request)
    {
        $input = $request->all();

        /** @var RoomSeason $roomSeason */
        $roomSeason = $this->roomSeasonRepository->findWithoutFail($id);

        if (empty($roomSeason)) {
            return $this->sendError('Room Season not found');
        }

        $roomSeason = $this->roomSeasonRepository->update($input, $id);

        return $this->sendResponse($roomSeason->toArray(), 'RoomSeason updated successfully');
    }

    /**
     * Remove the specified RoomSeason from storage.
     * DELETE /roomSeasons/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var RoomSeason $roomSeason */
        $roomSeason = $this->roomSeasonRepository->findWithoutFail($id);

        if (empty($roomSeason)) {
            return $this->sendError('Room Season not found');
        }

        $roomSeason->delete();

        return $this->sendResponse($id, 'Room Season deleted successfully');
    }
}
