<?php

namespace App\Repositories\Admin;

use App\Models\Admin\RoomLocation;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class RoomLocationRepository
 * @package App\Repositories\Admin
 * @version December 4, 2018, 7:24 pm CET
 *
 * @method RoomLocation findWithoutFail($id, $columns = ['*'])
 * @method RoomLocation find($id, $columns = ['*'])
 * @method RoomLocation first($columns = ['*'])
*/
class RoomLocationRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'code',
        'status_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return RoomLocation::class;
    }
}
