<?php

namespace App\Repositories\Admin;

use App\Models\Admin\Activity;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class ActivityRepository
 * @package App\Repositories\Admin
 * @version August 28, 2018, 11:02 pm CEST
 *
 * @method Activity findWithoutFail($id, $columns = ['*'])
 * @method Activity find($id, $columns = ['*'])
 * @method Activity first($columns = ['*'])
*/
class ActivityRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'slug',
        'price',
        'activity_category_id',
        'status_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Activity::class;
    }
}
