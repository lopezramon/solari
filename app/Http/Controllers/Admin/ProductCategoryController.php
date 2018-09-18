<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\AppBaseController;
use App\Http\Controllers\LanguageController;
use App\Http\Requests\Admin\CreateProductCategoryRequest;
use App\Http\Requests\Admin\UpdateProductCategoryRequest;
use App\Repositories\Admin\ProductCategoryRepository;
use Flash;
use Illuminate\Http\Request;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class ProductCategoryController extends AppBaseController
{
    /** @var  ProductCategoryRepository */
    private $productCategoryRepository;

    public function __construct(ProductCategoryRepository $productCategoryRepo)
    {
        $this->productCategoryRepository = $productCategoryRepo;
    }

    /**
     * Display a listing of the ProductCategory.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->productCategoryRepository->pushCriteria(new RequestCriteria($request));
        $productCategories = $this->productCategoryRepository->getCustomized();

        return view('admin.products.product_categories.index')
            ->with('productCategories', $productCategories);
    }

    /**
     * Show the form for creating a new ProductCategory.
     *
     * @return Response
     */
    public function create()
    {
        $languages = LanguageController::getLanguageAll()->pluck('name', 'id');
        $statuses = LanguageController::getLanguageStatuses()->pluck('code', 'id');
        return view('admin.products.product_categories.create', compact(['languages', 'statuses']));
    }

    /**
     * Store a newly created ProductCategory in storage.
     *
     * @param CreateProductCategoryRequest $request
     *
     * @return Response
     */
    public function store(CreateProductCategoryRequest $request)
    {
        $input = $request->all();
        $input['slug'] = str_slug($request->name, '-');

        $productCategory = $this->productCategoryRepository->create($input);
        $productCategory->productCategoryTranslations()->create($input);

        Flash::success('Product Category saved successfully.');

        return redirect(route('admin.productCategories.index'));
    }

    /**
     * Display the specified ProductCategory.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $productCategory = $this->productCategoryRepository->findWithoutFail($id);

        if (empty($productCategory)) {
            Flash::error('Product Category not found');

            return redirect(route('admin.productCategories.index'));
        }

        return view('admin.products.product_categories.show')->with('productCategory', $productCategory);
    }

    /**
     * Show the form for editing the specified ProductCategory.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $productCategory = $this->productCategoryRepository->findWithoutFail($id);

        if (empty($productCategory)) {
            Flash::error('Product Category not found');

            return redirect(route('admin.productCategories.index'));
        }
        $languages = LanguageController::getLanguageAll()->pluck('name', 'id');
        $statuses = LanguageController::getLanguageStatuses()->pluck('code', 'id');

        return view('admin.products.product_categories.edit', compact(['languages', 'statuses','productCategory']));
    }

    /**
     * Update the specified ProductCategory in storage.
     *
     * @param  int              $id
     * @param UpdateProductCategoryRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateProductCategoryRequest $request)
    {
        $productCategory = $this->productCategoryRepository->findWithoutFail($id);

        if (empty($productCategory)) {
            Flash::error('Product Category not found');

            return redirect(route('admin.productCategories.index'));
        }

        $productCategory = $this->productCategoryRepository->update($request->all(), $id);
        unset($request['_token']);unset($request['_method']);unset($request['status_id']);
        $productCategory->productCategoryTranslations()->update($request->all(), $productCategory->id);

        Flash::success('Product Category updated successfully.');

        return redirect(route('admin.productCategories.index'));
    }

    /**
     * Remove the specified ProductCategory from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $productCategory = $this->productCategoryRepository->findWithoutFail($id);

        if (empty($productCategory)) {
            Flash::error('Product Category not found');

            return redirect(route('admin.productCategories.index'));
        }

        $this->productCategoryRepository->delete($id);

        Flash::success('Product Category deleted successfully.');

        return redirect(route('admin.productCategories.index'));
    }
}
