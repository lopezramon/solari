<?php

namespace App\Repositories\Admin;

use App\Models\Admin\ScreenFrontSection;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class ScreenFrontSectionRepository
 * @package App\Repositories\Admin
 * @version August 28, 2018, 11:03 pm CEST
 *
 * @method ScreenFrontSection findWithoutFail($id, $columns = ['*'])
 * @method ScreenFrontSection find($id, $columns = ['*'])
 * @method ScreenFrontSection first($columns = ['*'])
*/
class ScreenFrontSectionRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'screen_id',
        'front_section_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return ScreenFrontSection::class;
    }
}
