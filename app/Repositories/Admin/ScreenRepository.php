<?php

namespace App\Repositories\Admin;

use App\Models\Admin\Screen;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class ScreenRepository
 * @package App\Repositories\Admin
 * @version August 28, 2018, 11:03 pm CEST
 *
 * @method Screen findWithoutFail($id, $columns = ['*'])
 * @method Screen find($id, $columns = ['*'])
 * @method Screen first($columns = ['*'])
*/
class ScreenRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'code',
        'name',
        'status_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Screen::class;
    }
}
