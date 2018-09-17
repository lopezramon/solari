<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\AppBaseController;
use App\Http\Controllers\LanguageController;
use App\Http\Requests\Admin\CreateProductFeatureRequest;
use App\Http\Requests\Admin\UpdateProductFeatureRequest;
use App\Repositories\Admin\ProductFeatureRepository;
use Flash;
use Illuminate\Http\Request;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class ProductFeatureController extends AppBaseController
{
    /** @var  ProductFeatureRepository */
    private $productFeatureRepository;

    public function __construct(ProductFeatureRepository $productFeatureRepo)
    {
        $this->productFeatureRepository = $productFeatureRepo;
    }

    /**
     * Display a listing of the ProductFeature.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->productFeatureRepository->pushCriteria(new RequestCriteria($request));
        $productFeatures = $this->productFeatureRepository->all();

        return view('admin.products.product_features.index')
            ->with('productFeatures', $productFeatures);
    }

    /**
     * Show the form for creating a new ProductFeature.
     *
     * @return Response
     */
    public function create()
    {
        $productFeatures = $this->productFeatureRepository->first();
        $productFeatureCategory = $productFeatures->productFeatureCategory->all()->pluck('name', 'id');
        $languages = LanguageController::getLanguageAll()->pluck('name', 'id');
        $statuses = LanguageController::getLanguageStatuses()->pluck('code', 'id');
        return view('admin.products.product_features.create', compact([
            'languages', 'statuses', 'productFeatureCategory'
        ]));
    }

    /**
     * Store a newly created ProductFeature in storage.
     *
     * @param CreateProductFeatureRequest $request
     *
     * @return Response
     */
    public function store(CreateProductFeatureRequest $request)
    {
        $input = $request->all();
        $input['slug'] = str_slug($request->name, '-');

        $productFeature = $this->productFeatureRepository->create($input);
        $productFeature->productFeatureTranslations()->create($input);

        Flash::success('Product Feature saved successfully.');

        return redirect(route('admin.productFeatures.index'));
    }

    /**
     * Display the specified ProductFeature.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $productFeature = $this->productFeatureRepository->findWithoutFail($id);

        if (empty($productFeature)) {
            Flash::error('Product Feature not found');

            return redirect(route('admin.productFeatures.index'));
        }

        return view('admin.products.product_features.show')->with('productFeature', $productFeature);
    }

    /**
     * Show the form for editing the specified ProductFeature.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $productFeature = $this->productFeatureRepository->findWithoutFail($id);

        if (empty($productFeature)) {
            Flash::error('Product Feature not found');

            return redirect(route('admin.productFeatures.index'));
        }

        $productFeatureCategory = $productFeature->productFeatureCategory->all()->pluck('name', 'id');
        $languages = LanguageController::getLanguageAll()->pluck('name', 'id');
        $statuses = LanguageController::getLanguageStatuses()->pluck('code', 'id');

        return view('admin.products.product_features.edit', compact([
            'languages', 'statuses', 'productFeatureCategory', 'productFeature'
        ]));
    }

    /**
     * Update the specified ProductFeature in storage.
     *
     * @param  int              $id
     * @param UpdateProductFeatureRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateProductFeatureRequest $request)
    {
        $productFeature = $this->productFeatureRepository->findWithoutFail($id);

        if (empty($productFeature)) {
            Flash::error('Product Feature not found');

            return redirect(route('admin.productFeatures.index'));
        }

        $productFeature = $this->productFeatureRepository->update($request->all(), $id);
        unset($request['_token']);unset($request['_method']);unset($request['status_id']);unset($request['product_feature_category_id']);
        $productFeature->productFeatureTranslations()->update($request->all(), $productFeature->id);

        Flash::success('Product Feature updated successfully.');

        return redirect(route('admin.productFeatures.index'));
    }

    /**
     * Remove the specified ProductFeature from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $productFeature = $this->productFeatureRepository->findWithoutFail($id);

        if (empty($productFeature)) {
            Flash::error('Product Feature not found');

            return redirect(route('admin.productFeatures.index'));
        }

        $this->productFeatureRepository->delete($id);

        Flash::success('Product Feature deleted successfully.');

        return redirect(route('admin.productFeatures.index'));
    }
}
