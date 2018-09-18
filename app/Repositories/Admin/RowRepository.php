<?php

namespace App\Repositories\Admin;

use App\Models\Admin\Row;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class RowRepository
 * @package App\Repositories\Admin
 * @version August 28, 2018, 11:03 pm CEST
 *
 * @method Row findWithoutFail($id, $columns = ['*'])
 * @method Row find($id, $columns = ['*'])
 * @method Row first($columns = ['*'])
*/
class RowRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'rowable_type',
        'rowable_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Row::class;
    }
}
