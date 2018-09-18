<?php

namespace App\Repositories\Admin;

use App\Models\Admin\AdditionalTranslation;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class AdditionalTranslationRepository
 * @package App\Repositories\Admin
 * @version August 28, 2018, 11:03 pm CEST
 *
 * @method AdditionalTranslation findWithoutFail($id, $columns = ['*'])
 * @method AdditionalTranslation find($id, $columns = ['*'])
 * @method AdditionalTranslation first($columns = ['*'])
*/
class AdditionalTranslationRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'additional_id',
        'language_id',
        'name',
        'description'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return AdditionalTranslation::class;
    }
}
