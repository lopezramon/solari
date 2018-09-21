<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\CreateActivityCategoryRequest;
use App\Http\Requests\Admin\UpdateActivityCategoryRequest;
use App\Repositories\Admin\ActivityCategoryRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class ActivityCategoryController extends AppBaseController
{
    /** @var  ActivityCategoryRepository */
    private $activityCategoryRepository;

    public function __construct(ActivityCategoryRepository $activityCategoryRepo)
    {
        $this->activityCategoryRepository = $activityCategoryRepo;
    }

    /**
     * Display a listing of the ActivityCategory.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->activityCategoryRepository->pushCriteria(new RequestCriteria($request));
        $activityCategories = $this->activityCategoryRepository->all();

        return view('admin.activities.activity_categories.index')
            ->with('activityCategories', $activityCategories);
    }

    /**
     * Show the form for creating a new ActivityCategory.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.activities.activity_categories.create');
    }

    /**
     * Store a newly created ActivityCategory in storage.
     *
     * @param CreateActivityCategoryRequest $request
     *
     * @return Response
     */
    public function store(CreateActivityCategoryRequest $request)
    {
        $input = $request->all();

        $activityCategory = $this->activityCategoryRepository->create($input);

        Flash::success('Activity Category saved successfully.');

        return redirect(route('admin.activityCategories.index'));
    }

    /**
     * Display the specified ActivityCategory.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $activityCategory = $this->activityCategoryRepository->findWithoutFail($id);

        if (empty($activityCategory)) {
            Flash::error('Activity Category not found');

            return redirect(route('admin.activityCategories.index'));
        }

        return view('admin.activities.activity_categories.show')->with('activityCategory', $activityCategory);
    }

    /**
     * Show the form for editing the specified ActivityCategory.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $activityCategory = $this->activityCategoryRepository->findWithoutFail($id);

        if (empty($activityCategory)) {
            Flash::error('Activity Category not found');

            return redirect(route('admin.activityCategories.index'));
        }

        return view('admin.activities.activity_categories.edit')->with('activityCategory', $activityCategory);
    }

    /**
     * Update the specified ActivityCategory in storage.
     *
     * @param  int              $id
     * @param UpdateActivityCategoryRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateActivityCategoryRequest $request)
    {
        $activityCategory = $this->activityCategoryRepository->findWithoutFail($id);

        if (empty($activityCategory)) {
            Flash::error('Activity Category not found');

            return redirect(route('admin.activityCategories.index'));
        }

        $activityCategory = $this->activityCategoryRepository->update($request->all(), $id);

        Flash::success('Activity Category updated successfully.');

        return redirect(route('admin.activityCategories.index'));
    }

    /**
     * Remove the specified ActivityCategory from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $activityCategory = $this->activityCategoryRepository->findWithoutFail($id);

        if (empty($activityCategory)) {
            Flash::error('Activity Category not found');

            return redirect(route('admin.activityCategories.index'));
        }

        $this->activityCategoryRepository->delete($id);

        Flash::success('Activity Category deleted successfully.');

        return redirect(route('admin.activityCategories.index'));
    }
}
