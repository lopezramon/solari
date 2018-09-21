<?php

namespace App\Repositories\Admin;

use App\Models\Admin\AdditionalCategoryTranslation;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class AdditionalCategoryTranslationRepository
 * @package App\Repositories\Admin
 * @version August 28, 2018, 11:03 pm CEST
 *
 * @method AdditionalCategoryTranslation findWithoutFail($id, $columns = ['*'])
 * @method AdditionalCategoryTranslation find($id, $columns = ['*'])
 * @method AdditionalCategoryTranslation first($columns = ['*'])
*/
class AdditionalCategoryTranslationRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'additional_category_id',
        'language_id',
        'name',
        'description'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return AdditionalCategoryTranslation::class;
    }
}
