<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Requests\API\Admin\CreateBlogCategoryAPIRequest;
use App\Http\Requests\API\Admin\UpdateBlogCategoryAPIRequest;
use App\Models\Admin\BlogCategory;
use App\Repositories\Admin\BlogCategoryRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class BlogCategoryController
 * @package App\Http\Controllers\API\Admin
 */

class BlogCategoryAPIController extends AppBaseController
{
    /** @var  BlogCategoryRepository */
    private $blogCategoryRepository;

    public function __construct(BlogCategoryRepository $blogCategoryRepo)
    {
        $this->blogCategoryRepository = $blogCategoryRepo;
    }

    /**
     * Display a listing of the BlogCategory.
     * GET|HEAD /blogCategories
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->blogCategoryRepository->pushCriteria(new RequestCriteria($request));
        $this->blogCategoryRepository->pushCriteria(new LimitOffsetCriteria($request));
        $blogCategories = $this->blogCategoryRepository->all();

        return $this->sendResponse($blogCategories->toArray(), 'Blog Categories retrieved successfully');
    }

    /**
     * Store a newly created BlogCategory in storage.
     * POST /blogCategories
     *
     * @param CreateBlogCategoryAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateBlogCategoryAPIRequest $request)
    {
        $input = $request->all();

        $blogCategories = $this->blogCategoryRepository->create($input);

        return $this->sendResponse($blogCategories->toArray(), 'Blog Category saved successfully');
    }

    /**
     * Display the specified BlogCategory.
     * GET|HEAD /blogCategories/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var BlogCategory $blogCategory */
        $blogCategory = $this->blogCategoryRepository->findWithoutFail($id);

        if (empty($blogCategory)) {
            return $this->sendError('Blog Category not found');
        }

        return $this->sendResponse($blogCategory->toArray(), 'Blog Category retrieved successfully');
    }

    /**
     * Update the specified BlogCategory in storage.
     * PUT/PATCH /blogCategories/{id}
     *
     * @param  int $id
     * @param UpdateBlogCategoryAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateBlogCategoryAPIRequest $request)
    {
        $input = $request->all();

        /** @var BlogCategory $blogCategory */
        $blogCategory = $this->blogCategoryRepository->findWithoutFail($id);

        if (empty($blogCategory)) {
            return $this->sendError('Blog Category not found');
        }

        $blogCategory = $this->blogCategoryRepository->update($input, $id);

        return $this->sendResponse($blogCategory->toArray(), 'BlogCategory updated successfully');
    }

    /**
     * Remove the specified BlogCategory from storage.
     * DELETE /blogCategories/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var BlogCategory $blogCategory */
        $blogCategory = $this->blogCategoryRepository->findWithoutFail($id);

        if (empty($blogCategory)) {
            return $this->sendError('Blog Category not found');
        }

        $blogCategory->delete();

        return $this->sendResponse($id, 'Blog Category deleted successfully');
    }
}
