<?php

namespace App\Repositories\Admin;

use App\Models\Admin\PermissionUser;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class PermissionUserRepository
 * @package App\Repositories\Admin
 * @version August 28, 2018, 11:03 pm CEST
 *
 * @method PermissionUser findWithoutFail($id, $columns = ['*'])
 * @method PermissionUser find($id, $columns = ['*'])
 * @method PermissionUser first($columns = ['*'])
*/
class PermissionUserRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'permission_id',
        'user_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return PermissionUser::class;
    }
}
