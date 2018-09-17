<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\AppBaseController;
use App\Http\Controllers\LanguageController;
use App\Http\Requests\Admin\CreateProductFeatureCategoryRequest;
use App\Http\Requests\Admin\UpdateProductFeatureCategoryRequest;
use App\Repositories\Admin\ProductFeatureCategoryRepository;
use Flash;
use Illuminate\Http\Request;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class ProductFeatureCategoryController extends AppBaseController
{
    /** @var  ProductFeatureCategoryRepository */
    private $productFeatureCategoryRepository;

    public function __construct(ProductFeatureCategoryRepository $productFeatureCategoryRepo)
    {
        $this->productFeatureCategoryRepository = $productFeatureCategoryRepo;
    }

    /**
     * Display a listing of the ProductFeatureCategory.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->productFeatureCategoryRepository->pushCriteria(new RequestCriteria($request));
        $productFeatureCategories = $this->productFeatureCategoryRepository->all();

        return view('admin.products.product_feature_categories.index')
            ->with('productFeatureCategories', $productFeatureCategories);
    }

    /**
     * Show the form for creating a new ProductFeatureCategory.
     *
     * @return Response
     */
    public function create()
    {
        $languages = LanguageController::getLanguageAll()->pluck('name', 'id');
        $statuses = LanguageController::getLanguageStatuses()->pluck('code', 'id');
        return view('admin.products.product_feature_categories.create', compact(['languages', 'statuses']));
    }

    /**
     * Store a newly created ProductFeatureCategory in storage.
     *
     * @param CreateProductFeatureCategoryRequest $request
     *
     * @return Response
     */
    public function store(CreateProductFeatureCategoryRequest $request)
    {
        $input = $request->all();

        $productFeatureCategory = $this->productFeatureCategoryRepository->create($input);
        $productFeatureCategory->productFeatureCategoryTranslations()->create($input);

        Flash::success('Product Feature Category saved successfully.');

        return redirect(route('admin.productFeatureCategories.index'));
    }

    /**
     * Display the specified ProductFeatureCategory.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $productFeatureCategory = $this->productFeatureCategoryRepository->findWithoutFail($id);

        if (empty($productFeatureCategory)) {
            Flash::error('Product Feature Category not found');

            return redirect(route('admin.productFeatureCategories.index'));
        }

        return view('admin.products.product_feature_categories.show')->with('productFeatureCategory', $productFeatureCategory);
    }

    /**
     * Show the form for editing the specified ProductFeatureCategory.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $productFeatureCategory = $this->productFeatureCategoryRepository->findWithoutFail($id);

        if (empty($productFeatureCategory)) {
            Flash::error('Product Feature Category not found');

            return redirect(route('admin.productFeatureCategories.index'));
        }
        $languages = LanguageController::getLanguageAll()->pluck('name', 'id');
        $statuses = LanguageController::getLanguageStatuses()->pluck('code', 'id');

        return view('admin.products.product_feature_categories.edit', compact([
            'languages', 'statuses', 'productFeatureCategory'
        ]));
    }

    /**
     * Update the specified ProductFeatureCategory in storage.
     *
     * @param  int              $id
     * @param UpdateProductFeatureCategoryRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateProductFeatureCategoryRequest $request)
    {
        $productFeatureCategory = $this->productFeatureCategoryRepository->findWithoutFail($id);

        if (empty($productFeatureCategory)) {
            Flash::error('Product Feature Category not found');

            return redirect(route('admin.productFeatureCategories.index'));
        }

        $productFeatureCategory = $this->productFeatureCategoryRepository->update($request->all(), $id);
        unset($request['_token']);unset($request['_method']);unset($request['status_id']);
        $productFeatureCategory->productFeatureCategoryTranslations()->update($request->all(), $productFeatureCategory->id);

        Flash::success('Product Feature Category updated successfully.');

        return redirect(route('admin.productFeatureCategories.index'));
    }

    /**
     * Remove the specified ProductFeatureCategory from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $productFeatureCategory = $this->productFeatureCategoryRepository->findWithoutFail($id);

        if (empty($productFeatureCategory)) {
            Flash::error('Product Feature Category not found');

            return redirect(route('admin.productFeatureCategories.index'));
        }

        $this->productFeatureCategoryRepository->delete($id);

        Flash::success('Product Feature Category deleted successfully.');

        return redirect(route('admin.productFeatureCategories.index'));
    }
}
