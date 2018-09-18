<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\AppBaseController;
use App\Http\Controllers\LanguageController;
use App\Http\Requests\Admin\CreateProductSubcategoryRequest;
use App\Http\Requests\Admin\UpdateProductSubcategoryRequest;
use App\Repositories\Admin\ProductSubcategoryRepository;
use Flash;
use Illuminate\Http\Request;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class ProductSubcategoryController extends AppBaseController
{
    /** @var  ProductSubcategoryRepository */
    private $productSubcategoryRepository;

    public function __construct(ProductSubcategoryRepository $productSubcategoryRepo)
    {
        $this->productSubcategoryRepository = $productSubcategoryRepo;
    }

    /**
     * Display a listing of the ProductSubcategory.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->productSubcategoryRepository->pushCriteria(new RequestCriteria($request));
        $productSubcategories = $this->productSubcategoryRepository->all();

        return view('admin.products.product_subcategories.index')
            ->with('productSubcategories', $productSubcategories);
    }

    /**
     * Show the form for creating a new ProductSubcategory.
     *
     * @return Response
     */
    public function create()
    {
        $productSubcategories = $this->productSubcategoryRepository->first();
        $productCategory = $productSubcategories->productCategory->all()->pluck('name', 'id');
        $languages = LanguageController::getLanguageAll()->pluck('name', 'id');
        $statuses = LanguageController::getLanguageStatuses()->pluck('code', 'id');
        return view('admin.products.product_subcategories.create', compact([
            'languages', 'statuses', 'productCategory'
        ]));
    }

    /**
     * Store a newly created ProductSubcategory in storage.
     *
     * @param CreateProductSubcategoryRequest $request
     *
     * @return Response
     */
    public function store(CreateProductSubcategoryRequest $request)
    {
        $input = $request->all();
        $input['slug'] = str_slug($request->name, '-');

        $productSubcategory = $this->productSubcategoryRepository->create($input);
        $productSubcategory->productSubcategoryTranslations()->create($input);

        Flash::success('Product Subcategory saved successfully.');

        return redirect(route('admin.productSubcategories.index'));
    }

    /**
     * Display the specified ProductSubcategory.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $productSubcategory = $this->productSubcategoryRepository->findWithoutFail($id);

        if (empty($productSubcategory)) {
            Flash::error('Product Subcategory not found');

            return redirect(route('admin.productSubcategories.index'));
        }

        return view('admin.products.product_subcategories.show')->with('productSubcategory', $productSubcategory);
    }

    /**
     * Show the form for editing the specified ProductSubcategory.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $productSubcategory = $this->productSubcategoryRepository->findWithoutFail($id);

        if (empty($productSubcategory)) {
            Flash::error('Product Subcategory not found');

            return redirect(route('admin.productSubcategories.index'));
        }

        $productCategory = $productSubcategory->productCategory->all()->pluck('name', 'id');
        $languages = LanguageController::getLanguageAll()->pluck('name', 'id');
        $statuses = LanguageController::getLanguageStatuses()->pluck('code', 'id');

        return view('admin.products.product_subcategories.edit', compact([
            'languages', 'statuses', 'productCategory', 'productSubcategory'
        ]));
    }

    /**
     * Update the specified ProductSubcategory in storage.
     *
     * @param  int              $id
     * @param UpdateProductSubcategoryRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateProductSubcategoryRequest $request)
    {
        $productSubcategory = $this->productSubcategoryRepository->findWithoutFail($id);

        if (empty($productSubcategory)) {
            Flash::error('Product Subcategory not found');

            return redirect(route('admin.productSubcategories.index'));
        }

        $productSubcategory = $this->productSubcategoryRepository->update($request->all(), $id);
        unset($request['_token']);unset($request['_method']);unset($request['status_id']);unset($request['product_category_id']);
        $productSubcategory->productSubcategoryTranslations()->update($request->all(), $productSubcategory->id);

        Flash::success('Product Subcategory updated successfully.');

        return redirect(route('admin.productSubcategories.index'));
    }

    /**
     * Remove the specified ProductSubcategory from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $productSubcategory = $this->productSubcategoryRepository->findWithoutFail($id);

        if (empty($productSubcategory)) {
            Flash::error('Product Subcategory not found');

            return redirect(route('admin.productSubcategories.index'));
        }

        $this->productSubcategoryRepository->delete($id);

        Flash::success('Product Subcategory deleted successfully.');

        return redirect(route('admin.productSubcategories.index'));
    }
}
