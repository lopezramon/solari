<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Requests\API\Admin\CreateBrandAPIRequest;
use App\Http\Requests\API\Admin\UpdateBrandAPIRequest;
use App\Models\Admin\Brand;
use App\Repositories\Admin\BrandRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class BrandController
 * @package App\Http\Controllers\API\Admin
 */

class BrandAPIController extends AppBaseController
{
    /** @var  BrandRepository */
    private $brandRepository;

    public function __construct(BrandRepository $brandRepo)
    {
        $this->brandRepository = $brandRepo;
    }

    /**
     * Display a listing of the Brand.
     * GET|HEAD /brands
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->brandRepository->pushCriteria(new RequestCriteria($request));
        $this->brandRepository->pushCriteria(new LimitOffsetCriteria($request));
        $brands = $this->brandRepository->all();

        return $this->sendResponse($brands->toArray(), 'Brands retrieved successfully');
    }

    /**
     * Store a newly created Brand in storage.
     * POST /brands
     *
     * @param CreateBrandAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateBrandAPIRequest $request)
    {
        $input = $request->all();

        $brands = $this->brandRepository->create($input);

        return $this->sendResponse($brands->toArray(), 'Brand saved successfully');
    }

    /**
     * Display the specified Brand.
     * GET|HEAD /brands/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Brand $brand */
        $brand = $this->brandRepository->findWithoutFail($id);

        if (empty($brand)) {
            return $this->sendError('Brand not found');
        }

        return $this->sendResponse($brand->toArray(), 'Brand retrieved successfully');
    }

    /**
     * Update the specified Brand in storage.
     * PUT/PATCH /brands/{id}
     *
     * @param  int $id
     * @param UpdateBrandAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateBrandAPIRequest $request)
    {
        $input = $request->all();

        /** @var Brand $brand */
        $brand = $this->brandRepository->findWithoutFail($id);

        if (empty($brand)) {
            return $this->sendError('Brand not found');
        }

        $brand = $this->brandRepository->update($input, $id);

        return $this->sendResponse($brand->toArray(), 'Brand updated successfully');
    }

    /**
     * Remove the specified Brand from storage.
     * DELETE /brands/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Brand $brand */
        $brand = $this->brandRepository->findWithoutFail($id);

        if (empty($brand)) {
            return $this->sendError('Brand not found');
        }

        $brand->delete();

        return $this->sendResponse($id, 'Brand deleted successfully');
    }
}
