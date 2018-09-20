<?php

namespace App\Repositories\Admin;

use App\Models\Admin\EventCategoryTranslation;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class EventCategoryTranslationRepository
 * @package App\Repositories\Admin
 * @version August 28, 2018, 11:03 pm CEST
 *
 * @method EventCategoryTranslation findWithoutFail($id, $columns = ['*'])
 * @method EventCategoryTranslation find($id, $columns = ['*'])
 * @method EventCategoryTranslation first($columns = ['*'])
*/
class EventCategoryTranslationRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'event_category_id',
        'language_id',
        'name',
        'description'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return EventCategoryTranslation::class;
    }
}
