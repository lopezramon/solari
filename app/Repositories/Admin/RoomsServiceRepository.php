<?php

namespace App\Repositories\Admin;

use App\Models\Admin\RoomsService;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class RoomsServiceRepository
 * @package App\Repositories\Admin
 * @version August 28, 2018, 11:03 pm CEST
 *
 * @method RoomsService findWithoutFail($id, $columns = ['*'])
 * @method RoomsService find($id, $columns = ['*'])
 * @method RoomsService first($columns = ['*'])
*/
class RoomsServiceRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'room_id',
        'service_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return RoomsService::class;
    }
}
