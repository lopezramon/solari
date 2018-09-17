<?php

namespace App\Repositories\Admin;

use App\Models\Admin\StatusTranslation;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class StatusTranslationRepository
 * @package App\Repositories\Admin
 * @version August 28, 2018, 11:03 pm CEST
 *
 * @method StatusTranslation findWithoutFail($id, $columns = ['*'])
 * @method StatusTranslation find($id, $columns = ['*'])
 * @method StatusTranslation first($columns = ['*'])
*/
class StatusTranslationRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'status_id',
        'language_id',
        'name',
        'description'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return StatusTranslation::class;
    }
}
