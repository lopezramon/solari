<?php

namespace App\Repositories\Admin;

use App\Models\Admin\LockedRoom;
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
}
