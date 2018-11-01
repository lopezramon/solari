<?php

namespace App\Repositories\Admin;

use App\Models\Admin\BookingDetail;
use Carbon\Carbon;
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
        'persons_quantity',

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

    /**
     * Get available rooms in given checkin and checkout dates.
     *
     * @param string $checkin
     * @param string $checkout
     *
     * @return
     */
    public function findAvailableRoomsInRange( $checkin, $checkout )
    {
        $checkin_request    = Carbon::createFromFormat('Y-m-d H', $checkin . ' 0');
        $checkout_request   = Carbon::createFromFormat('Y-m-d H', $checkout . ' 0');

        $start_range    = $checkin_request->subMonths(3);
        $end_range      = $checkout_request->addMonths(3);

        // filtros para obtener un rango de busqueda mas centrado (mas o menos 3 meses el rango indicado por el usuario)
        $where = [
            ['checkin_date',  '>=', $start_range],
            ['checkout_date', '<=', $end_range]
        ];
        $bookingDetails = $this->findWhere($where);

        dd($checkin_request);
        dd($bookingDetails);

        $filteredBookingDetails = $bookingDetails->filter(function($bookingDeta) use($checkin, $checkout) {

            if ( $this->checkIfOverlap() ) {
                # code...
            }

            dd($bookingDeta->checkout_date);
            dd($checkin);

            return true;
        });

        dd($filteredBookingDetails);
    }
}
