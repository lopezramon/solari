<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Requests\API\Admin\CreateBlogAPIRequest;
use App\Http\Requests\API\Admin\UpdateBlogAPIRequest;
use App\Models\Admin\Blog;
use App\Repositories\Admin\BlogRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class BlogController
 * @package App\Http\Controllers\API\Admin
 */

class BlogAPIController extends AppBaseController
{
    /** @var  BlogRepository */
    private $blogRepository;

    public function __construct(BlogRepository $blogRepo)
    {
        $this->blogRepository = $blogRepo;
    }

    /**
     * Display a listing of the Blog.
     * GET|HEAD /blogs
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->blogRepository->pushCriteria(new RequestCriteria($request));
        $this->blogRepository->pushCriteria(new LimitOffsetCriteria($request));
        $blogs = $this->blogRepository->all();

        return $this->sendResponse($blogs->toArray(), 'Blogs retrieved successfully');
    }

    /**
     * Store a newly created Blog in storage.
     * POST /blogs
     *
     * @param CreateBlogAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateBlogAPIRequest $request)
    {
        $input = $request->all();

        $blogs = $this->blogRepository->create($input);

        return $this->sendResponse($blogs->toArray(), 'Blog saved successfully');
    }

    /**
     * Display the specified Blog.
     * GET|HEAD /blogs/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Blog $blog */
        $blog = $this->blogRepository->findWithoutFail($id);

        if (empty($blog)) {
            return $this->sendError('Blog not found');
        }

        return $this->sendResponse($blog->toArray(), 'Blog retrieved successfully');
    }

    /**
     * Update the specified Blog in storage.
     * PUT/PATCH /blogs/{id}
     *
     * @param  int $id
     * @param UpdateBlogAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateBlogAPIRequest $request)
    {
        $input = $request->all();

        /** @var Blog $blog */
        $blog = $this->blogRepository->findWithoutFail($id);

        if (empty($blog)) {
            return $this->sendError('Blog not found');
        }

        $blog = $this->blogRepository->update($input, $id);

        return $this->sendResponse($blog->toArray(), 'Blog updated successfully');
    }

    /**
     * Remove the specified Blog from storage.
     * DELETE /blogs/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Blog $blog */
        $blog = $this->blogRepository->findWithoutFail($id);

        if (empty($blog)) {
            return $this->sendError('Blog not found');
        }

        $blog->delete();

        return $this->sendResponse($id, 'Blog deleted successfully');
    }
}
