<?php

namespace App\Repositories\Admin;

use App\Models\Admin\SeoTranslation;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class SeoTranslationRepository
 * @package App\Repositories\Admin
 * @version August 28, 2018, 11:03 pm CEST
 *
 * @method SeoTranslation findWithoutFail($id, $columns = ['*'])
 * @method SeoTranslation find($id, $columns = ['*'])
 * @method SeoTranslation first($columns = ['*'])
*/
class SeoTranslationRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'tag',
        'value',
        'seo_id',
        'language_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return SeoTranslation::class;
    }
}
