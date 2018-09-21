<?php

namespace App\Repositories\Admin;

use App\Models\Admin\FrontSection;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class FrontSectionRepository
 * @package App\Repositories\Admin
 * @version August 28, 2018, 11:03 pm CEST
 *
 * @method FrontSection findWithoutFail($id, $columns = ['*'])
 * @method FrontSection find($id, $columns = ['*'])
 * @method FrontSection first($columns = ['*'])
*/
class FrontSectionRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'code',
        'name'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return FrontSection::class;
    }
}
