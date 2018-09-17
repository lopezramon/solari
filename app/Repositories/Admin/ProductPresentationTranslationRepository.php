<?php

namespace App\Repositories\Admin;

use App\Models\Admin\ProductPresentationTranslation;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class ProductPresentationTranslationRepository
 * @package App\Repositories\Admin
 * @version August 28, 2018, 11:03 pm CEST
 *
 * @method ProductPresentationTranslation findWithoutFail($id, $columns = ['*'])
 * @method ProductPresentationTranslation find($id, $columns = ['*'])
 * @method ProductPresentationTranslation first($columns = ['*'])
*/
class ProductPresentationTranslationRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'product_presentation_id',
        'language_id',
        'name',
        'description'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return ProductPresentationTranslation::class;
    }
}
