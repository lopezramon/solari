<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\CreateServiceCategoryRequest;
use App\Http\Requests\Admin\UpdateServiceCategoryRequest;
use App\Repositories\Admin\ServiceCategoryRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class ServiceCategoryController extends AppBaseController
{
    /** @var  ServiceCategoryRepository */
    private $serviceCategoryRepository;

    public function __construct(ServiceCategoryRepository $serviceCategoryRepo)
    {
        $this->serviceCategoryRepository = $serviceCategoryRepo;
    }

    /**
     * Display a listing of the ServiceCategory.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->serviceCategoryRepository->pushCriteria(new RequestCriteria($request));
        $serviceCategories = $this->serviceCategoryRepository->all();

        return view('admin.services.service_categories.index')
            ->with('serviceCategories', $serviceCategories);
    }

    /**
     * Show the form for creating a new ServiceCategory.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.services.service_categories.create');
    }

    /**
     * Store a newly created ServiceCategory in storage.
     *
     * @param CreateServiceCategoryRequest $request
     *
     * @return Response
     */
    public function store(CreateServiceCategoryRequest $request)
    {
        $input = $request->all();

        $serviceCategory = $this->serviceCategoryRepository->create($input);

        Flash::success('Service Category saved successfully.');

        return redirect(route('admin.serviceCategories.index'));
    }

    /**
     * Display the specified ServiceCategory.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $serviceCategory = $this->serviceCategoryRepository->findWithoutFail($id);

        if (empty($serviceCategory)) {
            Flash::error('Service Category not found');

            return redirect(route('admin.serviceCategories.index'));
        }

        return view('admin.services.service_categories.show')->with('serviceCategory', $serviceCategory);
    }

    /**
     * Show the form for editing the specified ServiceCategory.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $serviceCategory = $this->serviceCategoryRepository->findWithoutFail($id);

        if (empty($serviceCategory)) {
            Flash::error('Service Category not found');

            return redirect(route('admin.serviceCategories.index'));
        }

        return view('admin.services.service_categories.edit')->with('serviceCategory', $serviceCategory);
    }

    /**
     * Update the specified ServiceCategory in storage.
     *
     * @param  int              $id
     * @param UpdateServiceCategoryRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateServiceCategoryRequest $request)
    {
        $serviceCategory = $this->serviceCategoryRepository->findWithoutFail($id);

        if (empty($serviceCategory)) {
            Flash::error('Service Category not found');

            return redirect(route('admin.serviceCategories.index'));
        }

        $serviceCategory = $this->serviceCategoryRepository->update($request->all(), $id);

        Flash::success('Service Category updated successfully.');

        return redirect(route('admin.serviceCategories.index'));
    }

    /**
     * Remove the specified ServiceCategory from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $serviceCategory = $this->serviceCategoryRepository->findWithoutFail($id);

        if (empty($serviceCategory)) {
            Flash::error('Service Category not found');

            return redirect(route('admin.serviceCategories.index'));
        }

        $this->serviceCategoryRepository->delete($id);

        Flash::success('Service Category deleted successfully.');

        return redirect(route('admin.serviceCategories.index'));
    }
}
