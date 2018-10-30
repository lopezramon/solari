<?php

namespace App\Repositories\Admin;

use App\Models\Admin\DataForm;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class DataFormRepository
 * @package App\Repositories\Admin
 * @version September 20, 2018, 10:35 pm CEST
 *
 * @method DataForm findWithoutFail($id, $columns = ['*'])
 * @method DataForm find($id, $columns = ['*'])
 * @method DataForm first($columns = ['*'])
*/
class DataFormRepository extends BaseRepository
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
        return DataForm::class;
    }
}
