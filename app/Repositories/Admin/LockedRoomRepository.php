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
}
