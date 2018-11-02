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
     * Case 1:
     * |---- Date Range A ----|                   _
     * _                   |---- Date Range B ----|
     *
     *
     * Case 2:
     * _                   |---- Date Range A ----|
     * |---- Date Range B ----|                   _
     *
     *
     * Case 3:
     * _         |---- Date Range A ----|         _
     * |-------------- Date Range B --------------|
     *
     *
     * Case 4:
     * |-------------- Date Range A --------------|
     * _         |---- Date Range B ----|         _
     *
     *
     * Case 5: ( SUCCESSFUL )
     * _                           |---- Date Range A ----|                           _
     * |---- Date Range B ----|                                |---- Date Range B ----|
     *
     *
     * @param string    $checkin
     * @param string    $checkout
     * @param int       $slack Indica la holgura que se tendra en la busqueda contra los booking ya realizados.
     *
     * @return
     */
    public function findUnavailableBookingDetailRoomsInRange( $checkin, $checkout, $slack = 3 )
    {
        $checkin_request    = Carbon::createFromFormat('Y-m-d H', $checkin . ' 0');
        $checkout_request   = Carbon::createFromFormat('Y-m-d H', $checkout . ' 0');

        // holgura que se tendra en la busqueda contra los booking ya realizados.
        $start_range    = Carbon::createFromFormat('Y-m-d H', $checkin . ' 0')->subMonths($slack);
        $end_range      = Carbon::createFromFormat('Y-m-d H', $checkout . ' 0')->addMonths($slack);

        // filtros para obtener un rango de busqueda mas centrado (mas o menos 3 <holgura default> meses el rango indicado por el usuario)
        $bookingDetails = $this->findWhere([
            ['checkin_date',  '>', $start_range],
            ['checkout_date', '<', $end_range]
        ]);

        $filteredBookingDetails = $bookingDetails->filter(function($bookingDeta) use($checkin_request, $checkout_request) {
            // Check if overlap (Cases 1, 2 and 3)
            if ( $checkin_request->between($bookingDeta->checkin_date, $bookingDeta->checkout_date) ||
                    $checkout_request->between($bookingDeta->checkin_date, $bookingDeta->checkout_date) ) {
                return true;
            }

            // Check if overlap (Case 4)
            if ( $bookingDeta->checkin_date->between($checkin_request, $checkout_request) &&
                    $bookingDeta->checkout_date->between($checkin_request, $checkout_request) ) {
                return true;
            }

            return false;
        });

        $unavailableRoomsByBookingDetail = [];
        foreach ($filteredBookingDetails->toArray() as $item) {
            $unavailableRoomsByBookingDetail[] = $item['room']['id'];
        }

        return array_unique( $unavailableRoomsByBookingDetail );
    }
}
