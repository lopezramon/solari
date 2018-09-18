<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\AppBaseController;
use App\Http\Controllers\LanguageController;
use App\Http\Requests\Admin\CreateRequestCategoryRequest;
use App\Http\Requests\Admin\UpdateRequestCategoryRequest;
use App\Repositories\Admin\RequestCategoryRepository;
use Flash;
use Illuminate\Http\Request;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class RequestCategoryController extends AppBaseController
{
    /** @var  RequestCategoryRepository */
    private $requestCategoryRepository;

    public function __construct(RequestCategoryRepository $requestCategoryRepo)
    {
        $this->requestCategoryRepository = $requestCategoryRepo;
    }

    /**
     * Display a listing of the RequestCategory.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->requestCategoryRepository->pushCriteria(new RequestCriteria($request));
        $requestCategories = $this->requestCategoryRepository->getCustomized();
        // dd($requestCategories);
        return view('admin.requests.request_categories.index')
            ->with('requestCategories', $requestCategories);
    }

    /**
     * Show the form for creating a new RequestCategory.
     *
     * @return Response
     */
    public function create()
    {
        $languages = LanguageController::getLanguageAll()->pluck('name', 'id');
        $statuses = LanguageController::getLanguageStatuses()->pluck('code', 'id');
        return view('admin.requests.request_categories.create', compact(['languages', 'statuses']));
    }

    /**
     * Store a newly created RequestCategory in storage.
     *
     * @param CreateRequestCategoryRequest $request
     *
     * @return Response
     */
    public function store(CreateRequestCategoryRequest $request)
    {
        $input = $request->all();

        $requestCategory = $this->requestCategoryRepository->create($input);
        $requestCategory->requestCategoryTranslations()->create($input);

        Flash::success('Request Category saved successfully.');

        return redirect(route('admin.requestCategories.index'));
    }

    /**
     * Display the specified RequestCategory.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $requestCategory = $this->requestCategoryRepository->findWithoutFail($id);

        if (empty($requestCategory)) {
            Flash::error('Request Category not found');

            return redirect(route('admin.requestCategories.index'));
        }

        return view('admin.requests.request_categories.show')->with('requestCategory', $requestCategory);
    }

    /**
     * Show the form for editing the specified RequestCategory.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $requestCategory = $this->requestCategoryRepository->findWithoutFail($id);

        if (empty($requestCategory)) {
            Flash::error('Request Category not found');

            return redirect(route('admin.requestCategories.index'));
        }

        $languages = LanguageController::getLanguageAll()->pluck('name', 'id');
        $statuses = LanguageController::getLanguageStatuses()->pluck('code', 'id');

        return view('admin.requests.request_categories.edit', compact(['languages', 'statuses', 'requestCategory']));
    }

    /**
     * Update the specified RequestCategory in storage.
     *
     * @param  int              $id
     * @param UpdateRequestCategoryRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateRequestCategoryRequest $request)
    {
        $requestCategory = $this->requestCategoryRepository->findWithoutFail($id);

        if (empty($requestCategory)) {
            Flash::error('Request Category not found');

            return redirect(route('admin.requestCategories.index'));
        }

        $requestCategory = $this->requestCategoryRepository->update($request->all(), $id);
        unset($request['_token']);unset($request['_method']);unset($request['status_id']);
        $requestCategory->requestCategoryTranslations()->update($request->all(), $requestCategory->id);

        Flash::success('Request Category updated successfully.');

        return redirect(route('admin.requestCategories.index'));
    }

    /**
     * Remove the specified RequestCategory from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $requestCategory = $this->requestCategoryRepository->findWithoutFail($id);

        if (empty($requestCategory)) {
            Flash::error('Request Category not found');

            return redirect(route('admin.requestCategories.index'));
        }

        $this->requestCategoryRepository->delete($id);

        Flash::success('Request Category deleted successfully.');

        return redirect(route('admin.requestCategories.index'));
    }
}
