<?php

namespace App\Repositories\Admin;

use App\Models\Admin\ActivityTranslation;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class ActivityTranslationRepository
 * @package App\Repositories\Admin
 * @version August 28, 2018, 11:02 pm CEST
 *
 * @method ActivityTranslation findWithoutFail($id, $columns = ['*'])
 * @method ActivityTranslation find($id, $columns = ['*'])
 * @method ActivityTranslation first($columns = ['*'])
*/
class ActivityTranslationRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'activity_id',
        'language_id',
        'title',
        'subtitle',
        'description'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return ActivityTranslation::class;
    }
}
