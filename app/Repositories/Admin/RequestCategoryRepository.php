<?php

namespace App\Repositories\Admin;

use App\Models\Admin\RequestCategory;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class RequestCategoryRepository
 * @package App\Repositories\Admin
 * @version September 13, 2018, 5:57 pm CEST
 *
 * @method RequestCategory findWithoutFail($id, $columns = ['*'])
 * @method RequestCategory find($id, $columns = ['*'])
 * @method RequestCategory first($columns = ['*'])
*/
class RequestCategoryRepository extends BaseRepository
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
        return RequestCategory::class;
    }

        /**
     * Retrieve customized data of repository.
     *
     * @param array $columns
     *
     * @return array
     */
    public function getCustomized($columns = ['id', 'status_id'])
    {
        $data = $this->all($columns);

        // helper personalizado para eliminar el model translation (ultimo index de cada elemento de la coleccion)
        $array        = $data->toArray();
        $column_index = count($array[0])-1; // PENDIENTE con este valor, depende de cada modelo
        $column_index2 = count($array[0])-2; // PENDIENTE con este valor, depende de cada modelo
        delete_col($array, $column_index);
        delete_col($array, $column_index2);

        return $array;
    }
}
