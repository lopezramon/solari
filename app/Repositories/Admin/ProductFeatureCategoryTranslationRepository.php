<?php

namespace App\Repositories\Admin;

use App\Models\Admin\ProductFeatureCategoryTranslation;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class ProductFeatureCategoryTranslationRepository
 * @package App\Repositories\Admin
 * @version September 6, 2018, 9:03 pm CEST
 *
 * @method ProductFeatureCategoryTranslation findWithoutFail($id, $columns = ['*'])
 * @method ProductFeatureCategoryTranslation find($id, $columns = ['*'])
 * @method ProductFeatureCategoryTranslation first($columns = ['*'])
*/
class ProductFeatureCategoryTranslationRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'product_feature_category_id',
        'language_id',
        'name',
        'description'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return ProductFeatureCategoryTranslation::class;
    }
}
