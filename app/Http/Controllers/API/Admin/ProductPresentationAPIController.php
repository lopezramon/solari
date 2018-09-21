<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Requests\API\Admin\CreateProductPresentationAPIRequest;
use App\Http\Requests\API\Admin\UpdateProductPresentationAPIRequest;
use App\Models\Admin\ProductPresentation;
use App\Repositories\Admin\ProductPresentationRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class ProductPresentationController
 * @package App\Http\Controllers\API\Admin
 */

class ProductPresentationAPIController extends AppBaseController
{
    /** @var  ProductPresentationRepository */
    private $productPresentationRepository;

    public function __construct(ProductPresentationRepository $productPresentationRepo)
    {
        $this->productPresentationRepository = $productPresentationRepo;
    }

    /**
     * Display a listing of the ProductPresentation.
     * GET|HEAD /productPresentations
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->productPresentationRepository->pushCriteria(new RequestCriteria($request));
        $this->productPresentationRepository->pushCriteria(new LimitOffsetCriteria($request));
        $productPresentations = $this->productPresentationRepository->all();

        return $this->sendResponse($productPresentations->toArray(), 'Product Presentations retrieved successfully');
    }

    /**
     * Store a newly created ProductPresentation in storage.
     * POST /productPresentations
     *
     * @param CreateProductPresentationAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateProductPresentationAPIRequest $request)
    {
        $input = $request->all();

        $productPresentations = $this->productPresentationRepository->create($input);

        return $this->sendResponse($productPresentations->toArray(), 'Product Presentation saved successfully');
    }

    /**
     * Display the specified ProductPresentation.
     * GET|HEAD /productPresentations/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var ProductPresentation $productPresentation */
        $productPresentation = $this->productPresentationRepository->findWithoutFail($id);

        if (empty($productPresentation)) {
            return $this->sendError('Product Presentation not found');
        }

        return $this->sendResponse($productPresentation->toArray(), 'Product Presentation retrieved successfully');
    }

    /**
     * Update the specified ProductPresentation in storage.
     * PUT/PATCH /productPresentations/{id}
     *
     * @param  int $id
     * @param UpdateProductPresentationAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateProductPresentationAPIRequest $request)
    {
        $input = $request->all();

        /** @var ProductPresentation $productPresentation */
        $productPresentation = $this->productPresentationRepository->findWithoutFail($id);

        if (empty($productPresentation)) {
            return $this->sendError('Product Presentation not found');
        }

        $productPresentation = $this->productPresentationRepository->update($input, $id);

        return $this->sendResponse($productPresentation->toArray(), 'ProductPresentation updated successfully');
    }

    /**
     * Remove the specified ProductPresentation from storage.
     * DELETE /productPresentations/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var ProductPresentation $productPresentation */
        $productPresentation = $this->productPresentationRepository->findWithoutFail($id);

        if (empty($productPresentation)) {
            return $this->sendError('Product Presentation not found');
        }

        $productPresentation->delete();

        return $this->sendResponse($id, 'Product Presentation deleted successfully');
    }
}
