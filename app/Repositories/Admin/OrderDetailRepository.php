<?php

namespace App\Repositories\Admin;

use App\Models\Admin\OrderDetail;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class OrderDetailRepository
 * @package App\Repositories\Admin
 * @version August 28, 2018, 11:03 pm CEST
 *
 * @method OrderDetail findWithoutFail($id, $columns = ['*'])
 * @method OrderDetail find($id, $columns = ['*'])
 * @method OrderDetail first($columns = ['*'])
*/
class OrderDetailRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'order_id',
        'product_presentation_product_id',
        'product_feature_id',
        'quantity',
        'comment',
        'total_item'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return OrderDetail::class;
    }
}
