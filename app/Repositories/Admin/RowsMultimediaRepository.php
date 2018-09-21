<?php

namespace App\Repositories\Admin;

use App\Models\Admin\RowsMultimedia;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class RowsMultimediaRepository
 * @package App\Repositories\Admin
 * @version August 28, 2018, 11:03 pm CEST
 *
 * @method RowsMultimedia findWithoutFail($id, $columns = ['*'])
 * @method RowsMultimedia find($id, $columns = ['*'])
 * @method RowsMultimedia first($columns = ['*'])
*/
class RowsMultimediaRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'row_id',
        'multimedia_id',
        'status_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return RowsMultimedia::class;
    }
}
