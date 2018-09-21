<?php

namespace App\Repositories\Admin;

use App\Models\Admin\OrderDetailAdditional;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class OrderDetailAdditionalRepository
 * @package App\Repositories\Admin
 * @version August 28, 2018, 11:03 pm CEST
 *
 * @method OrderDetailAdditional findWithoutFail($id, $columns = ['*'])
 * @method OrderDetailAdditional find($id, $columns = ['*'])
 * @method OrderDetailAdditional first($columns = ['*'])
*/
class OrderDetailAdditionalRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'order_detail_id',
        'additional_id',
        'additional_quantity'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return OrderDetailAdditional::class;
    }
}
