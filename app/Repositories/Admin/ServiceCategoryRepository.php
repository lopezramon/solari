<?php

namespace App\Repositories\Admin;

use App\Models\Admin\ServiceCategory;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class ServiceCategoryRepository
 * @package App\Repositories\Admin
 * @version August 28, 2018, 11:03 pm CEST
 *
 * @method ServiceCategory findWithoutFail($id, $columns = ['*'])
 * @method ServiceCategory find($id, $columns = ['*'])
 * @method ServiceCategory first($columns = ['*'])
*/
class ServiceCategoryRepository extends BaseRepository
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
        return ServiceCategory::class;
    }
}
