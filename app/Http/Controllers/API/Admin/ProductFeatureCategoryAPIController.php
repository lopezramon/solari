<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Requests\API\Admin\CreateProductFeatureCategoryAPIRequest;
use App\Http\Requests\API\Admin\UpdateProductFeatureCategoryAPIRequest;
use App\Models\Admin\ProductFeatureCategory;
use App\Repositories\Admin\ProductFeatureCategoryRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class ProductFeatureCategoryController
 * @package App\Http\Controllers\API\Admin
 */

class ProductFeatureCategoryAPIController extends AppBaseController
{
    /** @var  ProductFeatureCategoryRepository */
    private $productFeatureCategoryRepository;

    public function __construct(ProductFeatureCategoryRepository $productFeatureCategoryRepo)
    {
        $this->productFeatureCategoryRepository = $productFeatureCategoryRepo;
    }

    /**
     * Display a listing of the ProductFeatureCategory.
     * GET|HEAD /productFeatureCategories
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->productFeatureCategoryRepository->pushCriteria(new RequestCriteria($request));
        $this->productFeatureCategoryRepository->pushCriteria(new LimitOffsetCriteria($request));
        $productFeatureCategories = $this->productFeatureCategoryRepository->getCustomized();

        return $this->sendResponse($productFeatureCategories, 'Product Feature Categories retrieved successfully');
    }

    /**
     * Store a newly created ProductFeatureCategory in storage.
     * POST /productFeatureCategories
     *
     * @param CreateProductFeatureCategoryAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateProductFeatureCategoryAPIRequest $request)
    {
        $input = $request->all();

        $productFeatureCategories = $this->productFeatureCategoryRepository->create($input);

        return $this->sendResponse($productFeatureCategories->toArray(), 'Product Feature Category saved successfully');
    }

    /**
     * Display the specified ProductFeatureCategory.
     * GET|HEAD /productFeatureCategories/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var ProductFeatureCategory $productFeatureCategory */
        $productFeatureCategory = $this->productFeatureCategoryRepository->findWithoutFail($id);

        if (empty($productFeatureCategory)) {
            return $this->sendError('Product Feature Category not found');
        }

        return $this->sendResponse($productFeatureCategory->toArray(), 'Product Feature Category retrieved successfully');
    }

    /**
     * Update the specified ProductFeatureCategory in storage.
     * PUT/PATCH /productFeatureCategories/{id}
     *
     * @param  int $id
     * @param UpdateProductFeatureCategoryAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateProductFeatureCategoryAPIRequest $request)
    {
        $input = $request->all();

        /** @var ProductFeatureCategory $productFeatureCategory */
        $productFeatureCategory = $this->productFeatureCategoryRepository->findWithoutFail($id);

        if (empty($productFeatureCategory)) {
            return $this->sendError('Product Feature Category not found');
        }

        $productFeatureCategory = $this->productFeatureCategoryRepository->update($input, $id);

        return $this->sendResponse($productFeatureCategory->toArray(), 'ProductFeatureCategory updated successfully');
    }

    /**
     * Remove the specified ProductFeatureCategory from storage.
     * DELETE /productFeatureCategories/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var ProductFeatureCategory $productFeatureCategory */
        $productFeatureCategory = $this->productFeatureCategoryRepository->findWithoutFail($id);

        if (empty($productFeatureCategory)) {
            return $this->sendError('Product Feature Category not found');
        }

        $productFeatureCategory->delete();

        return $this->sendResponse($id, 'Product Feature Category deleted successfully');
    }
}
