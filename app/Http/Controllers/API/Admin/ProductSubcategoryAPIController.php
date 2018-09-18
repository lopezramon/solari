<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Requests\API\Admin\CreateProductSubcategoryAPIRequest;
use App\Http\Requests\API\Admin\UpdateProductSubcategoryAPIRequest;
use App\Models\Admin\ProductSubcategory;
use App\Repositories\Admin\ProductSubcategoryRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class ProductSubcategoryController
 * @package App\Http\Controllers\API\Admin
 */

class ProductSubcategoryAPIController extends AppBaseController
{
    /** @var  ProductSubcategoryRepository */
    private $productSubcategoryRepository;

    public function __construct(ProductSubcategoryRepository $productSubcategoryRepo)
    {
        $this->productSubcategoryRepository = $productSubcategoryRepo;
    }

    /**
     * Display a listing of the ProductSubcategory.
     * GET|HEAD /productSubcategories
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->productSubcategoryRepository->pushCriteria(new RequestCriteria($request));
        $this->productSubcategoryRepository->pushCriteria(new LimitOffsetCriteria($request));
        $productSubcategories = $this->productSubcategoryRepository->getCustomized();

        return $this->sendResponse(['product_subcategories' => $productSubcategories], 'Product Subcategories retrieved successfully');
    }

    /**
     * Store a newly created ProductSubcategory in storage.
     * POST /productSubcategories
     *
     * @param CreateProductSubcategoryAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateProductSubcategoryAPIRequest $request)
    {
        $input = $request->all();

        $productSubcategories = $this->productSubcategoryRepository->create($input);

        return $this->sendResponse($productSubcategories->toArray(), 'Product Subcategory saved successfully');
    }

    /**
     * Display the specified ProductSubcategory.
     * GET|HEAD /productSubcategories/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var ProductSubcategory $productSubcategory */
        $productSubcategory = $this->productSubcategoryRepository->findWithoutFail($id);

        if (empty($productSubcategory)) {
            return $this->sendError('Product Subcategory not found');
        }

        return $this->sendResponse($productSubcategory->toArray(), 'Product Subcategory retrieved successfully');
    }

    /**
     * Update the specified ProductSubcategory in storage.
     * PUT/PATCH /productSubcategories/{id}
     *
     * @param  int $id
     * @param UpdateProductSubcategoryAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateProductSubcategoryAPIRequest $request)
    {
        $input = $request->all();

        /** @var ProductSubcategory $productSubcategory */
        $productSubcategory = $this->productSubcategoryRepository->findWithoutFail($id);

        if (empty($productSubcategory)) {
            return $this->sendError('Product Subcategory not found');
        }

        $productSubcategory = $this->productSubcategoryRepository->update($input, $id);

        return $this->sendResponse($productSubcategory->toArray(), 'ProductSubcategory updated successfully');
    }

    /**
     * Remove the specified ProductSubcategory from storage.
     * DELETE /productSubcategories/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var ProductSubcategory $productSubcategory */
        $productSubcategory = $this->productSubcategoryRepository->findWithoutFail($id);

        if (empty($productSubcategory)) {
            return $this->sendError('Product Subcategory not found');
        }

        $productSubcategory->delete();

        return $this->sendResponse($id, 'Product Subcategory deleted successfully');
    }
}
