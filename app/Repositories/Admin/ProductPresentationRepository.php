<?php

namespace App\Repositories\Admin;

use App\Models\Admin\ProductPresentation;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class ProductPresentationRepository
 * @package App\Repositories\Admin
 * @version August 28, 2018, 11:03 pm CEST
 *
 * @method ProductPresentation findWithoutFail($id, $columns = ['*'])
 * @method ProductPresentation find($id, $columns = ['*'])
 * @method ProductPresentation first($columns = ['*'])
*/
class ProductPresentationRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'status_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return ProductPresentation::class;
    }
}
