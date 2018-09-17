<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Controllers\AppBaseController;
use App\Http\Requests\API\Admin\CreateProductAPIRequest;
use App\Http\Requests\API\Admin\UpdateProductAPIRequest;
use App\Models\Admin\Product;
use App\Repositories\Admin\AdditionalCategoryRepository;
use App\Repositories\Admin\ProductCategoryRepository;
use App\Repositories\Admin\ProductFeatureCategoryRepository;
use App\Repositories\Admin\ProductPresentationProductRepository;
use App\Repositories\Admin\ProductRepository;
use App\Repositories\Admin\ProductSubcategoryRepository;
use App\Repositories\Admin\ProductTranslationRepository;
use Illuminate\Http\Request;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class ProductController
 * @package App\Http\Controllers\API\Admin
 */

class ProductAPIController extends AppBaseController
{
    /** @var  ProductCategoryRepository */
    private $productCategoryRepository;

    /** @var  ProductSubcategoryRepository */
    private $productSubcategoryRepository;

    /** @var  ProductRepository */
    private $productRepository;

    /** @var  ProductTranslationRepository */
    private $productTranslationRepository;

    /** @var  AdditionalCategoryRepository */
    private $additionalCategoryRepository;

    /** @var  ProductFeatureCategoryRepository */
    private $productFeatureCategoryRepository;

    /** @var  ProductPresentationProductRepository */
    private $productPresentationProductRepository;

    public function __construct(
        ProductCategoryRepository $productCategoryRepo,
        ProductSubcategoryRepository $productSubcategoryRepo,
        ProductRepository $productRepo,
        ProductTranslationRepository $productTranslationRepo,
        AdditionalCategoryRepository $additionalCategoryRepo,
        ProductFeatureCategoryRepository $productFeatureCategoryRepo,
        ProductPresentationProductRepository $productPresentationProductRepo)
    {
        $this->productCategoryRepository            = $productCategoryRepo;
        $this->productSubcategoryRepository         = $productSubcategoryRepo;
        $this->productRepository                    = $productRepo;
        $this->productTranslationRepository         = $productTranslationRepo;
        $this->additionalCategoryRepository         = $additionalCategoryRepo;
        $this->productFeatureCategoryRepository     = $productFeatureCategoryRepo;
        $this->productPresentationProductRepository = $productPresentationProductRepo;
    }

    /**
     * Display a listing of the Product.
     * GET|HEAD /products
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->productRepository->pushCriteria(new RequestCriteria($request));
        $this->productRepository->pushCriteria(new LimitOffsetCriteria($request));
        $products = $this->productRepository->getCustomized();

        return $this->sendResponse(['products' => $products], 'Products retrieved successfully');
    }

    /**
     * Store a newly created Product in storage.
     * POST /products
     *
     * @param CreateProductAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateProductAPIRequest $request)
    {
        $input = $request->all();

        $products = $this->productRepository->create($input);

        return $this->sendResponse($products->toArray(), 'Product saved successfully');
    }

    /**
     * Display the specified Product.
     * GET|HEAD /products/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Product $product */
        $product = $this->productRepository->findWithoutFail($id);

        if (empty($product)) {
            return $this->sendError('Product not found');
        }

        return $this->sendResponse($product->toArray(), 'Product retrieved successfully');
    }

    /**
     * Update the specified Product in storage.
     * PUT/PATCH /products/{id}
     *
     * @param  int $id
     * @param UpdateProductAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateProductAPIRequest $request)
    {
        $input = $request->all();

        /** @var Product $product */
        $product = $this->productRepository->findWithoutFail($id);

        if (empty($product)) {
            return $this->sendError('Product not found');
        }

        $product = $this->productRepository->update($input, $id);

        return $this->sendResponse($product->toArray(), 'Product updated successfully');
    }

    /**
     * Remove the specified Product from storage.
     * DELETE /products/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Product $product */
        $product = $this->productRepository->findWithoutFail($id);

        if (empty($product)) {
            return $this->sendError('Product not found');
        }

        $product->delete();

        return $this->sendResponse($id, 'Product deleted successfully');
    }

    /**
     * Display a listing of the ProductCategory, ProductSubcategory, Product, AdditionalCategory, FeatureProduct.
     * GET|HEAD /catalog
     *
     * @param Request $request
     * @return Response
     */
    public function catalog(Request $request)
    {
        $product_categories     = $this->productCategoryRepository->getCustomized();
        $product_subcategories  = $this->productSubcategoryRepository->getCustomized();
        $products               = $this->productRepository->getCustomized();
        $additional_categories  = $this->additionalCategoryRepository->getCustomized();

        $array = [
            'product_categories'    => $product_categories,
            'product_subcategories' => $product_subcategories,
            'products'              => $products,
            'additional_categories' => $additional_categories
        ];

        return $this->sendResponse(['catalog' => $array], 'Products retrieved successfully');
    }

    /**
     * Display a listing of the Product, AdditionalCategory, FeatureProduct.
     * GET|HEAD /products_general
     *
     * @param Request   $request
     * @param int|null  $product_subcategory_id
     * @return Response
     */
    public function productsGeneral(Request $request, $product_subcategory_id = null)
    {
        $where = ($product_subcategory_id!=null) ? ['product_subcategory_id' => $product_subcategory_id] : null;

        $array = $this->getGenerals($where);

        return $this->sendResponse(['catalog' => $array], 'Products retrieved successfully');
    }

    /**
     * Search on Product by a given word.
     * GET|HEAD /products_search
     *
     * @param Request $request
     * @param string  $word
     * @return Response
     */
    public function productsSearch(Request $request, $word)
    {
        // busco los productTranslations donde coincida la palabra buscada (name y description)
        $productTranslations = $this->productTranslationRepository->findWhere([
            ['name', 'like', '%'.$word.'%'],
            ['description', 'like', '%'.$word.'%']
        ]);

        // obtengo los id de los productos coincidentes
        $productsId = array_column($productTranslations->toArray(), 'id');

        // paso los id al metodo getGenerals
        $array = $this->getGenerals(null, $productsId);

        return $this->sendResponse(['catalog' => $array], 'Products retrieved successfully');
    }

    /**
     * Retrive the general data (Product, AdditionalCategory, FeatureProduct).
     * and applies the given conditions ($where).
     *
     * @param array $where
     * @return array
     */
    private function getGenerals( $where, $productsId = null )
    {
        $products                   = $this->productRepository->getCustomized(null, $where, $productsId);
        $additional_categories      = $this->additionalCategoryRepository->getCustomized();
        $product_feature_categories = $this->productFeatureCategoryRepository->getCustomized();

        return [
            'products'                      => $products,
            'additional_categories'         => $additional_categories,
            'product_feature_categories'    => $product_feature_categories
        ];
    }

    /**
     * Display a listing of the ProductPresentationProduct that are suggestions.
     * GET|HEAD /suggestions
     *
     * @param Request $request
     * @return Response
     */
    public function suggestions(Request $request)
    {
        $productPresentationProducts = $this->productPresentationProductRepository->getCustomized(null, ['suggestion' => true]);
        // $products                       = $this->productRepository->getCustomized();

        // $the_product = [];
        // foreach ($productPresentationProducts as $key => $presentation) {
        //     $the_product[] = $productPresentationProducts[$key]['the_product'] = (array) $presentation['the_product'];
        // }
        // dd($the_product);


        // if ( !empty($productPresentationProducts) ) {
        //     $column_index = count($productPresentationProducts[count($productPresentationProducts)-1])-1; // PENDIENTE con este valor, depende de cada modelo
        //     // $column_index2 = count($productPresentationProducts[count($productPresentationProducts)-1])-2; // PENDIENTE con este valor, depende de cada modelo
        //     // $column_index3 = count($productPresentationProducts[count($productPresentationProducts)-1])-3; // PENDIENTE con este valor, depende de cada modelo
        //     delete_col($productPresentationProducts, $column_index);
        //     // delete_col($productPresentationProducts, $column_index2);
        //     // delete_col($productPresentationProducts, $column_index3);
        // }

        // foreach ($the_product as $keyJ => $productItem) {
        //     if ($keyJ == 'id'
        //      || $keyJ == 'image'
        //      || $keyJ == 'product_subcategory_id'
        //      || $keyJ == 'additional_category_id'
        //      || $keyJ == 'product_feature_category_id'
        //      || $keyJ == 'status_id') {
        //         $productPresentationProducts[$key][$keyJ] = $productItem;
        //     }
        // }
        // var_dump($productPresentationProducts);
        // exit();

        // test
        // $test = array_walk(array, funcname)

        $array = [
            'suggestions'   => $productPresentationProducts/*,
            'products'      => $products,
            'test'          => $test*/
        ];

        return $this->sendResponse($array, 'Products retrieved successfully');
    }
}
