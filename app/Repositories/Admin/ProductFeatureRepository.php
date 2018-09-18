<?php

namespace App\Repositories\Admin;

use App\Models\Admin\ProductFeature;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class ProductFeatureRepository
 * @package App\Repositories\Admin
 * @version September 6, 2018, 9:03 pm CEST
 *
 * @method ProductFeature findWithoutFail($id, $columns = ['*'])
 * @method ProductFeature find($id, $columns = ['*'])
 * @method ProductFeature first($columns = ['*'])
*/
class ProductFeatureRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'code',
        'price',
        'iva',
        'product_feature_category_id',
        'status_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return ProductFeature::class;
    }
}
