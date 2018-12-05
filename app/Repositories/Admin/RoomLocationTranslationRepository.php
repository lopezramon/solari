<?php

namespace App\Repositories\Admin;

use App\Models\Admin\RoomLocationTranslation;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class RoomLocationTranslationRepository
 * @package App\Repositories\Admin
 * @version December 4, 2018, 7:23 pm CET
 *
 * @method RoomLocationTranslation findWithoutFail($id, $columns = ['*'])
 * @method RoomLocationTranslation find($id, $columns = ['*'])
 * @method RoomLocationTranslation first($columns = ['*'])
*/
class RoomLocationTranslationRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'room_location_id',
        'language_id',
        'name',
        'description'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return RoomLocationTranslation::class;
    }
}
