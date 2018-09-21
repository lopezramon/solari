<?php

namespace App\Repositories\Admin;

use App\Models\Admin\FormData;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class FormDataRepository
 * @package App\Repositories\Admin
 * @version September 20, 2018, 10:35 pm CEST
 *
 * @method FormData findWithoutFail($id, $columns = ['*'])
 * @method FormData find($id, $columns = ['*'])
 * @method FormData first($columns = ['*'])
*/
class FormDataRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'email',
        'name',
        'lastname',
        'phone'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return FormData::class;
    }
}
