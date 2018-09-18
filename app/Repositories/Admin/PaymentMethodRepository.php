<?php

namespace App\Repositories\Admin;

use App\Models\Admin\PaymentMethod;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class PaymentMethodRepository
 * @package App\Repositories\Admin
 * @version August 28, 2018, 11:03 pm CEST
 *
 * @method PaymentMethod findWithoutFail($id, $columns = ['*'])
 * @method PaymentMethod find($id, $columns = ['*'])
 * @method PaymentMethod first($columns = ['*'])
*/
class PaymentMethodRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'code',
        'name'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return PaymentMethod::class;
    }
}
