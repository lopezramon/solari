<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Requests\API\Admin\CreateRoomCategoryAPIRequest;
use App\Http\Requests\API\Admin\UpdateRoomCategoryAPIRequest;
use App\Models\Admin\RoomCategory;
use App\Repositories\Admin\RoomCategoryRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class RoomCategoryController
 * @package App\Http\Controllers\API\Admin
 */

class RoomCategoryAPIController extends AppBaseController
{
    /** @var  RoomCategoryRepository */
    private $roomCategoryRepository;

    public function __construct(RoomCategoryRepository $roomCategoryRepo)
    {
        $this->roomCategoryRepository = $roomCategoryRepo;
    }

    /**
     * Display a listing of the RoomCategory.
     * GET|HEAD /roomCategories
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        \Log::info($request->all());

        $this->roomCategoryRepository->pushCriteria(new RequestCriteria($request));
        $this->roomCategoryRepository->pushCriteria(new LimitOffsetCriteria($request));
        $roomCategories = $this->roomCategoryRepository->all();

        return $this->sendResponse($roomCategories->toArray(), 'Room Categories retrieved successfully');
    }

    /**
     * Store a newly created RoomCategory in storage.
     * POST /roomCategories
     *
     * @param CreateRoomCategoryAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateRoomCategoryAPIRequest $request)
    {
        $input = $request->all();

        $roomCategories = $this->roomCategoryRepository->create($input);

        return $this->sendResponse($roomCategories->toArray(), 'Room Category saved successfully');
    }

    /**
     * Display the specified RoomCategory.
     * GET|HEAD /roomCategories/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var RoomCategory $roomCategory */
        $roomCategory = $this->roomCategoryRepository->findWithoutFail($id);

        if (empty($roomCategory)) {
            return $this->sendError('Room Category not found');
        }

        return $this->sendResponse($roomCategory->toArray(), 'Room Category retrieved successfully');
    }

    /**
     * Update the specified RoomCategory in storage.
     * PUT/PATCH /roomCategories/{id}
     *
     * @param  int $id
     * @param UpdateRoomCategoryAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateRoomCategoryAPIRequest $request)
    {
        $input = $request->all();

        /** @var RoomCategory $roomCategory */
        $roomCategory = $this->roomCategoryRepository->findWithoutFail($id);

        if (empty($roomCategory)) {
            return $this->sendError('Room Category not found');
        }

        $roomCategory = $this->roomCategoryRepository->update($input, $id);

        return $this->sendResponse($roomCategory->toArray(), 'RoomCategory updated successfully');
    }

    /**
     * Remove the specified RoomCategory from storage.
     * DELETE /roomCategories/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var RoomCategory $roomCategory */
        $roomCategory = $this->roomCategoryRepository->findWithoutFail($id);

        if (empty($roomCategory)) {
            return $this->sendError('Room Category not found');
        }

        $roomCategory->delete();

        return $this->sendResponse($id, 'Room Category deleted successfully');
    }
}
