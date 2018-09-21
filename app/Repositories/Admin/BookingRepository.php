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
        'code',
        'user_id',
        'checkin_date',
        'checkout_date',
        'subtotal',
        'iva',
        'total',
        'comment',
        'status_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Booking::class;
    }

    /**
     * Generate code with the given id.
     */
    public function generateCode( $id )
    {
        return str_pad($id, 4, '0', STR_PAD_LEFT);
    }
}
