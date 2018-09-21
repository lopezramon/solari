<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Requests\API\Admin\CreateAdditionalCategoryAPIRequest;
use App\Http\Requests\API\Admin\UpdateAdditionalCategoryAPIRequest;
use App\Models\Admin\AdditionalCategory;
use App\Repositories\Admin\AdditionalCategoryRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class AdditionalCategoryController
 * @package App\Http\Controllers\API\Admin
 */

class AdditionalCategoryAPIController extends AppBaseController
{
    /** @var  AdditionalCategoryRepository */
    private $additionalCategoryRepository;

    public function __construct(AdditionalCategoryRepository $additionalCategoryRepo)
    {
        $this->additionalCategoryRepository = $additionalCategoryRepo;
    }

    /**
     * Display a listing of the AdditionalCategory.
     * GET|HEAD /additionalCategories
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->additionalCategoryRepository->pushCriteria(new RequestCriteria($request));
        $this->additionalCategoryRepository->pushCriteria(new LimitOffsetCriteria($request));
        $additionalCategories = $this->additionalCategoryRepository->getCustomized();

        return $this->sendResponse(['additional_categories' => $additionalCategories], 'Additional Categories retrieved successfully');
    }

    /**
     * Store a newly created AdditionalCategory in storage.
     * POST /additionalCategories
     *
     * @param CreateAdditionalCategoryAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateAdditionalCategoryAPIRequest $request)
    {
        $input = $request->all();

        $additionalCategories = $this->additionalCategoryRepository->create($input);

        return $this->sendResponse($additionalCategories->toArray(), 'Additional Category saved successfully');
    }

    /**
     * Display the specified AdditionalCategory.
     * GET|HEAD /additionalCategories/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var AdditionalCategory $additionalCategory */
        $additionalCategory = $this->additionalCategoryRepository->findWithoutFail($id);

        if (empty($additionalCategory)) {
            return $this->sendError('Additional Category not found');
        }

        return $this->sendResponse($additionalCategory->toArray(), 'Additional Category retrieved successfully');
    }

    /**
     * Update the specified AdditionalCategory in storage.
     * PUT/PATCH /additionalCategories/{id}
     *
     * @param  int $id
     * @param UpdateAdditionalCategoryAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAdditionalCategoryAPIRequest $request)
    {
        $input = $request->all();

        /** @var AdditionalCategory $additionalCategory */
        $additionalCategory = $this->additionalCategoryRepository->findWithoutFail($id);

        if (empty($additionalCategory)) {
            return $this->sendError('Additional Category not found');
        }

        $additionalCategory = $this->additionalCategoryRepository->update($input, $id);

        return $this->sendResponse($additionalCategory->toArray(), 'AdditionalCategory updated successfully');
    }

    /**
     * Remove the specified AdditionalCategory from storage.
     * DELETE /additionalCategories/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var AdditionalCategory $additionalCategory */
        $additionalCategory = $this->additionalCategoryRepository->findWithoutFail($id);

        if (empty($additionalCategory)) {
            return $this->sendError('Additional Category not found');
        }

        $additionalCategory->delete();

        return $this->sendResponse($id, 'Additional Category deleted successfully');
    }
}
