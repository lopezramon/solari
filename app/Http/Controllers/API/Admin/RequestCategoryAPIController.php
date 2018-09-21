<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Requests\API\Admin\CreateRequestCategoryAPIRequest;
use App\Http\Requests\API\Admin\UpdateRequestCategoryAPIRequest;
use App\Models\Admin\RequestCategory;
use App\Repositories\Admin\RequestCategoryRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class RequestCategoryController
 * @package App\Http\Controllers\API\Admin
 */

class RequestCategoryAPIController extends AppBaseController
{
    /** @var  RequestCategoryRepository */
    private $requestCategoryRepository;

    public function __construct(RequestCategoryRepository $requestCategoryRepo)
    {
        $this->requestCategoryRepository = $requestCategoryRepo;
    }

    /**
     * Display a listing of the RequestCategory.
     * GET|HEAD /requestCategories
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->requestCategoryRepository->pushCriteria(new RequestCriteria($request));
        $this->requestCategoryRepository->pushCriteria(new LimitOffsetCriteria($request));
        $requestCategories = $this->requestCategoryRepository->getCustomized();

        return $this->sendResponse($requestCategories, 'Request Categories retrieved successfully');
    }

    /**
     * Store a newly created RequestCategory in storage.
     * POST /requestCategories
     *
     * @param CreateRequestCategoryAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateRequestCategoryAPIRequest $request)
    {
        $input = $request->all();

        $requestCategories = $this->requestCategoryRepository->create($input);

        return $this->sendResponse($requestCategories->toArray(), 'Request Category saved successfully');
    }

    /**
     * Display the specified RequestCategory.
     * GET|HEAD /requestCategories/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var RequestCategory $requestCategory */
        $requestCategory = $this->requestCategoryRepository->findWithoutFail($id);

        if (empty($requestCategory)) {
            return $this->sendError('Request Category not found');
        }

        return $this->sendResponse($requestCategory->toArray(), 'Request Category retrieved successfully');
    }

    /**
     * Update the specified RequestCategory in storage.
     * PUT/PATCH /requestCategories/{id}
     *
     * @param  int $id
     * @param UpdateRequestCategoryAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateRequestCategoryAPIRequest $request)
    {
        $input = $request->all();

        /** @var RequestCategory $requestCategory */
        $requestCategory = $this->requestCategoryRepository->findWithoutFail($id);

        if (empty($requestCategory)) {
            return $this->sendError('Request Category not found');
        }

        $requestCategory = $this->requestCategoryRepository->update($input, $id);

        return $this->sendResponse($requestCategory->toArray(), 'RequestCategory updated successfully');
    }

    /**
     * Remove the specified RequestCategory from storage.
     * DELETE /requestCategories/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var RequestCategory $requestCategory */
        $requestCategory = $this->requestCategoryRepository->findWithoutFail($id);

        if (empty($requestCategory)) {
            return $this->sendError('Request Category not found');
        }

        $requestCategory->delete();

        return $this->sendResponse($id, 'Request Category deleted successfully');
    }
}
