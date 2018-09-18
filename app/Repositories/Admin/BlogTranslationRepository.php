<?php

namespace App\Repositories\Admin;

use App\Models\Admin\BlogTranslation;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class BlogTranslationRepository
 * @package App\Repositories\Admin
 * @version August 28, 2018, 11:02 pm CEST
 *
 * @method BlogTranslation findWithoutFail($id, $columns = ['*'])
 * @method BlogTranslation find($id, $columns = ['*'])
 * @method BlogTranslation first($columns = ['*'])
*/
class BlogTranslationRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'blog_id',
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
        return BlogTranslation::class;
    }
}
