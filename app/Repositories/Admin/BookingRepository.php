<?php

namespace App\Repositories\Admin;

use App\Models\Admin\Booking;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class BookingRepository
 * @package App\Repositories\Admin
 * @version August 28, 2018, 11:03 pm CEST
 *
 * @method Booking findWithoutFail($id, $columns = ['*'])
 * @method Booking find($id, $columns = ['*'])
 * @method Booking first($columns = ['*'])
*/
class BookingRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'subtotal',
        'tax',
        'total',
        'user_id',
        'no_register_user_name',
        'no_register_user_email',
        'no_register_user_phone',
        'status_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Booking::class;
    }
}
