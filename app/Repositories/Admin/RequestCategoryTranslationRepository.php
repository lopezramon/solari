<?php

namespace App\Repositories\Admin;

use App\Models\Admin\RequestCategoryTranslation;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class RequestCategoryTranslationRepository
 * @package App\Repositories\Admin
 * @version September 13, 2018, 5:57 pm CEST
 *
 * @method RequestCategoryTranslation findWithoutFail($id, $columns = ['*'])
 * @method RequestCategoryTranslation find($id, $columns = ['*'])
 * @method RequestCategoryTranslation first($columns = ['*'])
*/
class RequestCategoryTranslationRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'request_category_id',
        'language_id',
        'name',
        'description'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return RequestCategoryTranslation::class;
    }
}
