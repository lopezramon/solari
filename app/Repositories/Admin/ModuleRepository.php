<?php

namespace App\Repositories\Admin;

use App\Models\Admin\Module;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class ModuleRepository
 * @package App\Repositories\Admin
 * @version August 28, 2018, 11:03 pm CEST
 *
 * @method Module findWithoutFail($id, $columns = ['*'])
 * @method Module find($id, $columns = ['*'])
 * @method Module first($columns = ['*'])
*/
class ModuleRepository extends BaseRepository
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
        return Module::class;
    }
}
