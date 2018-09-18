<?php

namespace App\Repositories\Admin;

use App\Models\Admin\ProductFeatureTranslation;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class ProductFeatureTranslationRepository
 * @package App\Repositories\Admin
 * @version September 6, 2018, 9:03 pm CEST
 *
 * @method ProductFeatureTranslation findWithoutFail($id, $columns = ['*'])
 * @method ProductFeatureTranslation find($id, $columns = ['*'])
 * @method ProductFeatureTranslation first($columns = ['*'])
*/
class ProductFeatureTranslationRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'product_feature_id',
        'language_id',
        'name',
        'description'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return ProductFeatureTranslation::class;
    }
}
