<?php

namespace App\Repositories\Admin;

use App\Models\Admin\TagTranslation;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class TagTranslationRepository
 * @package App\Repositories\Admin
 * @version August 28, 2018, 11:03 pm CEST
 *
 * @method TagTranslation findWithoutFail($id, $columns = ['*'])
 * @method TagTranslation find($id, $columns = ['*'])
 * @method TagTranslation first($columns = ['*'])
*/
class TagTranslationRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'tag',
        'value',
        'front_section_id',
        'language_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return TagTranslation::class;
    }
}
