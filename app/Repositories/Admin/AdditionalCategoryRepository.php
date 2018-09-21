<?php

namespace App\Repositories\Admin;

use App\Models\Admin\AdditionalCategory;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class AdditionalCategoryRepository
 * @package App\Repositories\Admin
 * @version August 28, 2018, 11:03 pm CEST
 *
 * @method AdditionalCategory findWithoutFail($id, $columns = ['*'])
 * @method AdditionalCategory find($id, $columns = ['*'])
 * @method AdditionalCategory first($columns = ['*'])
*/
class AdditionalCategoryRepository extends BaseRepository
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
        return AdditionalCategory::class;
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
