<?php

namespace App\Repositories\Admin;

use App\Models\Admin\LockedRoom;
use Carbon\Carbon;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class LockedRoomRepository
 * @package App\Repositories\Admin
 * @version October 30, 2018, 11:11 pm CET
 *
 * @method LockedRoom findWithoutFail($id, $columns = ['*'])
 * @method LockedRoom find($id, $columns = ['*'])
 * @method LockedRoom first($columns = ['*'])
*/
class LockedRoomRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'room_id',
        'locked_at',
        'checkin_date',
        'checkout_date'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return LockedRoom::class;
    }

    /**
     * Lock the specified Room in the given range (checkin_date, checkout_date).
     *
     * @param int       $room_id
     * @param string    $checkin_date
     * @param string    $checkout_date
     *
     * @return App\Models\Admin\LockedRoom
     */
    public function lockRoom( $room_id, $checkin_date, $checkout_date )
    {
        $data = [
            'room_id'       => $room_id,
            'checkin_date'  => $checkin_date,
            'checkout_date' => $checkout_date,
            'locked_at'     => Carbon::now()->format('Y-m-d H:i:s')
        ];

        $lockedRoom = $this->create($data);

        return $lockedRoom;
    }

    /*public function findUnavailableLockedRoomRoomsInRange( $checkin, $checkout, $slack = 3 )
    {
        $checkin_request    = Carbon::createFromFormat('Y-m-d H', $checkin . ' 0');
        $checkout_request   = Carbon::createFromFormat('Y-m-d H', $checkout . ' 0');

        // holgura que se tendra en la busqueda contra los booking ya realizados.
        $start_range    = Carbon::createFromFormat('Y-m-d H', $checkin . ' 0')->subMonths($slack);
        $end_range      = Carbon::createFromFormat('Y-m-d H', $checkout . ' 0')->addMonths($slack);

        // filtros para obtener un rango de busqueda mas centrado (mas o menos 3 <holgura default> meses el rango indicado por el usuario)
        $fiveMinutesAgo = Carbon::now()->subMinutes(5); #PENDIENTE que este valor (3) sea administrable
        $lockedRooms = $this->findWhere([
            ['checkin_date',    '>', $start_range],
            ['checkout_date',   '<', $end_range],

            ['locked_at',       '>', $fiveMinutesAgo] // se buscan solo las rooms cuyo locked_at sea mayor a hace cinco minutos
        ]);

        $filteredLockedRooms = $lockedRooms->filter(function($lockedRoo) use($checkin_request, $checkout_request) {
            // Check if overlap (Cases 1, 2 and 3)
            if ( $checkin_request->between($lockedRoo->checkin_date, $lockedRoo->checkout_date) ||
                    $checkout_request->between($lockedRoo->checkin_date, $lockedRoo->checkout_date) ) {
                return true;
            }

            // Check if overlap (Case 4)
            if ( $lockedRoo->checkin_date->between($checkin_request, $checkout_request) &&
                    $lockedRoo->checkout_date->between($checkin_request, $checkout_request) ) {
                return true;
            }

            return false;
        });

        $unavailableRoomsByLockedRoom = [];
        foreach ($filteredLockedRooms->toArray() as $item) {
            $unavailableRoomsByLockedRoom[] = $item['room']['id'];
        }

        return array_unique( $unavailableRoomsByLockedRoom );
    }*/
}
