<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\CreateEventCategoryRequest;
use App\Http\Requests\Admin\UpdateEventCategoryRequest;
use App\Repositories\Admin\EventCategoryRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class EventCategoryController extends AppBaseController
{
    /** @var  EventCategoryRepository */
    private $eventCategoryRepository;

    public function __construct(EventCategoryRepository $eventCategoryRepo)
    {
        $this->eventCategoryRepository = $eventCategoryRepo;
    }

    /**
     * Display a listing of the EventCategory.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->eventCategoryRepository->pushCriteria(new RequestCriteria($request));
        $eventCategories = $this->eventCategoryRepository->all();

        return view('admin.events.event_categories.index')
            ->with('eventCategories', $eventCategories);
    }

    /**
     * Show the form for creating a new EventCategory.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.events.event_categories.create');
    }

    /**
     * Store a newly created EventCategory in storage.
     *
     * @param CreateEventCategoryRequest $request
     *
     * @return Response
     */
    public function store(CreateEventCategoryRequest $request)
    {
        $input = $request->all();

        $eventCategory = $this->eventCategoryRepository->create($input);

        Flash::success('Event Category saved successfully.');

        return redirect(route('admin.eventCategories.index'));
    }

    /**
     * Display the specified EventCategory.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $eventCategory = $this->eventCategoryRepository->findWithoutFail($id);

        if (empty($eventCategory)) {
            Flash::error('Event Category not found');

            return redirect(route('admin.eventCategories.index'));
        }

        return view('admin.events.event_categories.show')->with('eventCategory', $eventCategory);
    }

    /**
     * Show the form for editing the specified EventCategory.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $eventCategory = $this->eventCategoryRepository->findWithoutFail($id);

        if (empty($eventCategory)) {
            Flash::error('Event Category not found');

            return redirect(route('admin.eventCategories.index'));
        }

        return view('admin.events.event_categories.edit')->with('eventCategory', $eventCategory);
    }

    /**
     * Update the specified EventCategory in storage.
     *
     * @param  int              $id
     * @param UpdateEventCategoryRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateEventCategoryRequest $request)
    {
        $eventCategory = $this->eventCategoryRepository->findWithoutFail($id);

        if (empty($eventCategory)) {
            Flash::error('Event Category not found');

            return redirect(route('admin.eventCategories.index'));
        }

        $eventCategory = $this->eventCategoryRepository->update($request->all(), $id);

        Flash::success('Event Category updated successfully.');

        return redirect(route('admin.eventCategories.index'));
    }

    /**
     * Remove the specified EventCategory from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $eventCategory = $this->eventCategoryRepository->findWithoutFail($id);

        if (empty($eventCategory)) {
            Flash::error('Event Category not found');

            return redirect(route('admin.eventCategories.index'));
        }

        $this->eventCategoryRepository->delete($id);

        Flash::success('Event Category deleted successfully.');

        return redirect(route('admin.eventCategories.index'));
    }
}
