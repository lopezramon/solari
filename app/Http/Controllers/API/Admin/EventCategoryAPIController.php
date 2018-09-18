<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Requests\API\Admin\CreateEventCategoryAPIRequest;
use App\Http\Requests\API\Admin\UpdateEventCategoryAPIRequest;
use App\Models\Admin\EventCategory;
use App\Repositories\Admin\EventCategoryRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class EventCategoryController
 * @package App\Http\Controllers\API\Admin
 */

class EventCategoryAPIController extends AppBaseController
{
    /** @var  EventCategoryRepository */
    private $eventCategoryRepository;

    public function __construct(EventCategoryRepository $eventCategoryRepo)
    {
        $this->eventCategoryRepository = $eventCategoryRepo;
    }

    /**
     * Display a listing of the EventCategory.
     * GET|HEAD /eventCategories
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->eventCategoryRepository->pushCriteria(new RequestCriteria($request));
        $this->eventCategoryRepository->pushCriteria(new LimitOffsetCriteria($request));
        $eventCategories = $this->eventCategoryRepository->all();

        return $this->sendResponse($eventCategories->toArray(), 'Event Categories retrieved successfully');
    }

    /**
     * Store a newly created EventCategory in storage.
     * POST /eventCategories
     *
     * @param CreateEventCategoryAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateEventCategoryAPIRequest $request)
    {
        $input = $request->all();

        $eventCategories = $this->eventCategoryRepository->create($input);

        return $this->sendResponse($eventCategories->toArray(), 'Event Category saved successfully');
    }

    /**
     * Display the specified EventCategory.
     * GET|HEAD /eventCategories/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var EventCategory $eventCategory */
        $eventCategory = $this->eventCategoryRepository->findWithoutFail($id);

        if (empty($eventCategory)) {
            return $this->sendError('Event Category not found');
        }

        return $this->sendResponse($eventCategory->toArray(), 'Event Category retrieved successfully');
    }

    /**
     * Update the specified EventCategory in storage.
     * PUT/PATCH /eventCategories/{id}
     *
     * @param  int $id
     * @param UpdateEventCategoryAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateEventCategoryAPIRequest $request)
    {
        $input = $request->all();

        /** @var EventCategory $eventCategory */
        $eventCategory = $this->eventCategoryRepository->findWithoutFail($id);

        if (empty($eventCategory)) {
            return $this->sendError('Event Category not found');
        }

        $eventCategory = $this->eventCategoryRepository->update($input, $id);

        return $this->sendResponse($eventCategory->toArray(), 'EventCategory updated successfully');
    }

    /**
     * Remove the specified EventCategory from storage.
     * DELETE /eventCategories/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var EventCategory $eventCategory */
        $eventCategory = $this->eventCategoryRepository->findWithoutFail($id);

        if (empty($eventCategory)) {
            return $this->sendError('Event Category not found');
        }

        $eventCategory->delete();

        return $this->sendResponse($id, 'Event Category deleted successfully');
    }
}
