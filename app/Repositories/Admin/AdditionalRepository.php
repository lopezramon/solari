<?php

namespace App\Repositories\Admin;

use App\Models\Admin\Additional;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class AdditionalRepository
 * @package App\Repositories\Admin
 * @version August 28, 2018, 11:03 pm CEST
 *
 * @method Additional findWithoutFail($id, $columns = ['*'])
 * @method Additional find($id, $columns = ['*'])
 * @method Additional first($columns = ['*'])
*/
class AdditionalRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'price',
        'tax',
        'code',
        'additional_category_id',
        'status_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Additional::class;
    }
}
