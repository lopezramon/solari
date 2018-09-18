<?php

namespace App\Repositories\Admin;

use App\Models\Admin\Seo;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class SeoRepository
 * @package App\Repositories\Admin
 * @version August 28, 2018, 11:03 pm CEST
 *
 * @method Seo findWithoutFail($id, $columns = ['*'])
 * @method Seo find($id, $columns = ['*'])
 * @method Seo first($columns = ['*'])
*/
class SeoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'row_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Seo::class;
    }
}
