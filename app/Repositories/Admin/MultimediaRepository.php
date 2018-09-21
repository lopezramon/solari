<?php

namespace App\Repositories\Admin;

use App\Models\Admin\Multimedia;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class MultimediaRepository
 * @package App\Repositories\Admin
 * @version August 28, 2018, 11:03 pm CEST
 *
 * @method Multimedia findWithoutFail($id, $columns = ['*'])
 * @method Multimedia find($id, $columns = ['*'])
 * @method Multimedia first($columns = ['*'])
*/
class MultimediaRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'slug',
        'description',
        'width',
        'height',
        'size',
        'path'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Multimedia::class;
    }
}
