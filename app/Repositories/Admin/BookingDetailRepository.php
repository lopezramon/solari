<?php

namespace App\Repositories\Admin;

use App\Models\Admin\BookingDetail;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class BookingDetailRepository
 * @package App\Repositories\Admin
 * @version August 28, 2018, 11:03 pm CEST
 *
 * @method BookingDetail findWithoutFail($id, $columns = ['*'])
 * @method BookingDetail find($id, $columns = ['*'])
 * @method BookingDetail first($columns = ['*'])
*/
class BookingDetailRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'booking_id',
        'row_id',
        'adult_quantity',
        'form_data_id',
        'payment_method_id',
        'iva_item',
        'total_item'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return BookingDetail::class;
    }
}
