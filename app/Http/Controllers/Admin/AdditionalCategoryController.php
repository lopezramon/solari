<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\AppBaseController;
use App\Http\Controllers\LanguageController;
use App\Http\Requests\Admin\CreateAdditionalCategoryRequest;
use App\Http\Requests\Admin\UpdateAdditionalCategoryRequest;
use App\Repositories\Admin\AdditionalCategoryRepository;
use Flash;
use Illuminate\Http\Request;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class AdditionalCategoryController extends AppBaseController
{
    /** @var  AdditionalCategoryRepository */
    private $additionalCategoryRepository;

    public function __construct(AdditionalCategoryRepository $additionalCategoryRepo)
    {
        $this->additionalCategoryRepository = $additionalCategoryRepo;
    }

    /**
     * Display a listing of the AdditionalCategory.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->additionalCategoryRepository->pushCriteria(new RequestCriteria($request));
        $additionalCategories = $this->additionalCategoryRepository->all();

        return view('admin.products.additional_categories.index')
            ->with('additionalCategories', $additionalCategories);
    }

    /**
     * Show the form for creating a new AdditionalCategory.
     *
     * @return Response
     */
    public function create()
    {
        $languages = LanguageController::getLanguageAll()->pluck('name', 'id');
        $statuses = LanguageController::getLanguageStatuses()->pluck('code', 'id');
        return view('admin.products.additional_categories.create', compact(['languages', 'statuses']));
    }

    /**
     * Store a newly created AdditionalCategory in storage.
     *
     * @param CreateAdditionalCategoryRequest $request
     *
     * @return Response
     */
    public function store(CreateAdditionalCategoryRequest $request)
    {
        $input = $request->all();
        $input['slug'] = str_slug($request->name, '-');

        $additionalCategory = $this->additionalCategoryRepository->create($input);
        $additionalCategory->additionalCategoryTranslations()->create($input);

        Flash::success('Additional Category saved successfully.');

        return redirect(route('admin.additionalCategories.index'));
    }

    /**
     * Display the specified AdditionalCategory.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $additionalCategory = $this->additionalCategoryRepository->findWithoutFail($id);

        if (empty($additionalCategory)) {
            Flash::error('Additional Category not found');

            return redirect(route('admin.additionalCategories.index'));
        }

        return view('admin.products.additional_categories.show')->with('additionalCategory', $additionalCategory);
    }

    /**
     * Show the form for editing the specified AdditionalCategory.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $additionalCategory = $this->additionalCategoryRepository->findWithoutFail($id);

        if (empty($additionalCategory)) {
            Flash::error('Additional Category not found');

            return redirect(route('admin.additionalCategories.index'));
        }

        $languages = LanguageController::getLanguageAll()->pluck('name', 'id');
        $statuses = LanguageController::getLanguageStatuses()->pluck('code', 'id');

        return view('admin.products.additional_categories.edit', compact([
            'languages', 'statuses', 'additionalCategory'
        ]));
    }

    /**
     * Update the specified AdditionalCategory in storage.
     *
     * @param  int              $id
     * @param UpdateAdditionalCategoryRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAdditionalCategoryRequest $request)
    {
        $additionalCategory = $this->additionalCategoryRepository->findWithoutFail($id);

        if (empty($additionalCategory)) {
            Flash::error('Additional Category not found');

            return redirect(route('admin.additionalCategories.index'));
        }

        $additionalCategory = $this->additionalCategoryRepository->update($request->all(), $id);
        unset($request['_token']);unset($request['_method']);unset($request['status_id']);
        $additionalCategory->additionalCategoryTranslations()->update($request->all(), $additionalCategory->id);

        Flash::success('Additional Category updated successfully.');

        return redirect(route('admin.additionalCategories.index'));
    }

    /**
     * Remove the specified AdditionalCategory from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $additionalCategory = $this->additionalCategoryRepository->findWithoutFail($id);

        if (empty($additionalCategory)) {
            Flash::error('Additional Category not found');

            return redirect(route('admin.additionalCategories.index'));
        }

        $this->additionalCategoryRepository->delete($id);

        Flash::success('Additional Category deleted successfully.');

        return redirect(route('admin.additionalCategories.index'));
    }
}
