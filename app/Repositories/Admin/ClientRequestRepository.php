<?php

namespace App\Repositories\Admin;

use App\Models\Admin\ClientRequest;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class ClientRequestRepository
 * @package App\Repositories\Admin
 * @version August 28, 2018, 11:03 pm CEST
 *
 * @method ClientRequest findWithoutFail($id, $columns = ['*'])
 * @method ClientRequest find($id, $columns = ['*'])
 * @method ClientRequest first($columns = ['*'])
*/
class ClientRequestRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'checkin_date',
        'checkout_date',
        'persons_amount',
        'user_id',
        'no_register_user_name',
        'no_register_user_email',
        'no_register_user_phone'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return ClientRequest::class;
    }
}
