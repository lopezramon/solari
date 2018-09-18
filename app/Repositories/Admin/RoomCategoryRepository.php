<?php

namespace App\Repositories\Admin;

use App\Models\Admin\RoomCategory;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class RoomCategoryRepository
 * @package App\Repositories\Admin
 * @version August 28, 2018, 11:03 pm CEST
 *
 * @method RoomCategory findWithoutFail($id, $columns = ['*'])
 * @method RoomCategory find($id, $columns = ['*'])
 * @method RoomCategory first($columns = ['*'])
*/
class RoomCategoryRepository extends BaseRepository
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
        return RoomCategory::class;
    }
}
