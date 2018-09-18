<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Requests\API\Admin\CreateProductFeatureAPIRequest;
use App\Http\Requests\API\Admin\UpdateProductFeatureAPIRequest;
use App\Models\Admin\ProductFeature;
use App\Repositories\Admin\ProductFeatureRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class ProductFeatureController
 * @package App\Http\Controllers\API\Admin
 */

class ProductFeatureAPIController extends AppBaseController
{
    /** @var  ProductFeatureRepository */
    private $productFeatureRepository;

    public function __construct(ProductFeatureRepository $productFeatureRepo)
    {
        $this->productFeatureRepository = $productFeatureRepo;
    }

    /**
     * Display a listing of the ProductFeature.
     * GET|HEAD /productFeatures
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->productFeatureRepository->pushCriteria(new RequestCriteria($request));
        $this->productFeatureRepository->pushCriteria(new LimitOffsetCriteria($request));
        $productFeatures = $this->productFeatureRepository->all();

        return $this->sendResponse($productFeatures->toArray(), 'Product Features retrieved successfully');
    }

    /**
     * Store a newly created ProductFeature in storage.
     * POST /productFeatures
     *
     * @param CreateProductFeatureAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateProductFeatureAPIRequest $request)
    {
        $input = $request->all();

        $productFeatures = $this->productFeatureRepository->create($input);

        return $this->sendResponse($productFeatures->toArray(), 'Product Feature saved successfully');
    }

    /**
     * Display the specified ProductFeature.
     * GET|HEAD /productFeatures/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var ProductFeature $productFeature */
        $productFeature = $this->productFeatureRepository->findWithoutFail($id);

        if (empty($productFeature)) {
            return $this->sendError('Product Feature not found');
        }

        return $this->sendResponse($productFeature->toArray(), 'Product Feature retrieved successfully');
    }

    /**
     * Update the specified ProductFeature in storage.
     * PUT/PATCH /productFeatures/{id}
     *
     * @param  int $id
     * @param UpdateProductFeatureAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateProductFeatureAPIRequest $request)
    {
        $input = $request->all();

        /** @var ProductFeature $productFeature */
        $productFeature = $this->productFeatureRepository->findWithoutFail($id);

        if (empty($productFeature)) {
            return $this->sendError('Product Feature not found');
        }

        $productFeature = $this->productFeatureRepository->update($input, $id);

        return $this->sendResponse($productFeature->toArray(), 'ProductFeature updated successfully');
    }

    /**
     * Remove the specified ProductFeature from storage.
     * DELETE /productFeatures/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var ProductFeature $productFeature */
        $productFeature = $this->productFeatureRepository->findWithoutFail($id);

        if (empty($productFeature)) {
            return $this->sendError('Product Feature not found');
        }

        $productFeature->delete();

        return $this->sendResponse($id, 'Product Feature deleted successfully');
    }
}
