<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Requests\API\Admin\CreateServiceCategoryAPIRequest;
use App\Http\Requests\API\Admin\UpdateServiceCategoryAPIRequest;
use App\Models\Admin\ServiceCategory;
use App\Repositories\Admin\ServiceCategoryRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class ServiceCategoryController
 * @package App\Http\Controllers\API\Admin
 */

class ServiceCategoryAPIController extends AppBaseController
{
    /** @var  ServiceCategoryRepository */
    private $serviceCategoryRepository;

    public function __construct(ServiceCategoryRepository $serviceCategoryRepo)
    {
        $this->serviceCategoryRepository = $serviceCategoryRepo;
    }

    /**
     * Display a listing of the ServiceCategory.
     * GET|HEAD /serviceCategories
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->serviceCategoryRepository->pushCriteria(new RequestCriteria($request));
        $this->serviceCategoryRepository->pushCriteria(new LimitOffsetCriteria($request));
        $serviceCategories = $this->serviceCategoryRepository->all();

        return $this->sendResponse($serviceCategories->toArray(), 'Service Categories retrieved successfully');
    }

    /**
     * Store a newly created ServiceCategory in storage.
     * POST /serviceCategories
     *
     * @param CreateServiceCategoryAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateServiceCategoryAPIRequest $request)
    {
        $input = $request->all();

        $serviceCategories = $this->serviceCategoryRepository->create($input);

        return $this->sendResponse($serviceCategories->toArray(), 'Service Category saved successfully');
    }

    /**
     * Display the specified ServiceCategory.
     * GET|HEAD /serviceCategories/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var ServiceCategory $serviceCategory */
        $serviceCategory = $this->serviceCategoryRepository->findWithoutFail($id);

        if (empty($serviceCategory)) {
            return $this->sendError('Service Category not found');
        }

        return $this->sendResponse($serviceCategory->toArray(), 'Service Category retrieved successfully');
    }

    /**
     * Update the specified ServiceCategory in storage.
     * PUT/PATCH /serviceCategories/{id}
     *
     * @param  int $id
     * @param UpdateServiceCategoryAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateServiceCategoryAPIRequest $request)
    {
        $input = $request->all();

        /** @var ServiceCategory $serviceCategory */
        $serviceCategory = $this->serviceCategoryRepository->findWithoutFail($id);

        if (empty($serviceCategory)) {
            return $this->sendError('Service Category not found');
        }

        $serviceCategory = $this->serviceCategoryRepository->update($input, $id);

        return $this->sendResponse($serviceCategory->toArray(), 'ServiceCategory updated successfully');
    }

    /**
     * Remove the specified ServiceCategory from storage.
     * DELETE /serviceCategories/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var ServiceCategory $serviceCategory */
        $serviceCategory = $this->serviceCategoryRepository->findWithoutFail($id);

        if (empty($serviceCategory)) {
            return $this->sendError('Service Category not found');
        }

        $serviceCategory->delete();

        return $this->sendResponse($id, 'Service Category deleted successfully');
    }
}
