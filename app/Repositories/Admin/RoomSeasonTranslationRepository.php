<?php

namespace App\Repositories\Admin;

use App\Models\Admin\RoomSeasonTranslation;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class RoomSeasonTranslationRepository
 * @package App\Repositories\Admin
 * @version August 28, 2018, 11:03 pm CEST
 *
 * @method RoomSeasonTranslation findWithoutFail($id, $columns = ['*'])
 * @method RoomSeasonTranslation find($id, $columns = ['*'])
 * @method RoomSeasonTranslation first($columns = ['*'])
*/
class RoomSeasonTranslationRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'room_season_id',
        'language_id',
        'name',
        'description'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return RoomSeasonTranslation::class;
    }
}
