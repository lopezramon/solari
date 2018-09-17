<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\AppBaseController;
use App\Http\Controllers\LanguageController;
use App\Http\Requests\Admin\CreateProductPresentationRequest;
use App\Http\Requests\Admin\UpdateProductPresentationRequest;
use App\Repositories\Admin\ProductPresentationRepository;
use Flash;
use Illuminate\Http\Request;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class ProductPresentationController extends AppBaseController
{
    /** @var  ProductPresentationRepository */
    private $productPresentationRepository;

    public function __construct(ProductPresentationRepository $productPresentationRepo)
    {
        $this->productPresentationRepository = $productPresentationRepo;
    }

    /**
     * Display a listing of the ProductPresentation.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->productPresentationRepository->pushCriteria(new RequestCriteria($request));
        $productPresentations = $this->productPresentationRepository->all();

        return view('admin.products.product_presentations.index')
            ->with('productPresentations', $productPresentations);
    }

    /**
     * Show the form for creating a new ProductPresentation.
     *
     * @return Response
     */
    public function create()
    {
        $languages = LanguageController::getLanguageAll()->pluck('name', 'id');
        $statuses = LanguageController::getLanguageStatuses()->pluck('code', 'id');
        return view('admin.products.product_presentations.create', compact(['languages', 'statuses']));
    }

    /**
     * Store a newly created ProductPresentation in storage.
     *
     * @param CreateProductPresentationRequest $request
     *
     * @return Response
     */
    public function store(CreateProductPresentationRequest $request)
    {
        $input = $request->all();
        $input['slug'] = str_slug($request->name, '-');

        $productPresentation = $this->productPresentationRepository->create($input);
        $productPresentation->productPresentationTranslations()->create($input);

        Flash::success('Product Presentation saved successfully.');

        return redirect(route('admin.productPresentations.index'));
    }

    /**
     * Display the specified ProductPresentation.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $productPresentation = $this->productPresentationRepository->findWithoutFail($id);

        if (empty($productPresentation)) {
            Flash::error('Product Presentation not found');

            return redirect(route('admin.productPresentations.index'));
        }

        return view('admin.products.product_presentations.show')->with('productPresentation', $productPresentation);
    }

    /**
     * Show the form for editing the specified ProductPresentation.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $productPresentation = $this->productPresentationRepository->findWithoutFail($id);

        if (empty($productPresentation)) {
            Flash::error('Product Presentation not found');

            return redirect(route('admin.productPresentations.index'));
        }

        $languages = LanguageController::getLanguageAll()->pluck('name', 'id');
        $statuses = LanguageController::getLanguageStatuses()->pluck('code', 'id');

        return view('admin.products.product_presentations.edit', compact([
            'languages', 'statuses', 'productPresentation'
        ]));
    }

    /**
     * Update the specified ProductPresentation in storage.
     *
     * @param  int              $id
     * @param UpdateProductPresentationRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateProductPresentationRequest $request)
    {
        $productPresentation = $this->productPresentationRepository->findWithoutFail($id);

        if (empty($productPresentation)) {
            Flash::error('Product Presentation not found');

            return redirect(route('admin.productPresentations.index'));
        }


        $productPresentation = $this->productPresentationRepository->update($request->all(), $id);
        unset($request['_token']);unset($request['_method']);unset($request['status_id']);
        $productPresentation->productPresentationTranslations()->update($request->all(), $productPresentation->id);

        Flash::success('Product Presentation updated successfully.');

        return redirect(route('admin.productPresentations.index'));
    }

    /**
     * Remove the specified ProductPresentation from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $productPresentation = $this->productPresentationRepository->findWithoutFail($id);

        if (empty($productPresentation)) {
            Flash::error('Product Presentation not found');

            return redirect(route('admin.productPresentations.index'));
        }

        $this->productPresentationRepository->delete($id);

        Flash::success('Product Presentation deleted successfully.');

        return redirect(route('admin.productPresentations.index'));
    }
}
