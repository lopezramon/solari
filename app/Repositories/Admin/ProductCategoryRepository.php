<?php

namespace App\Repositories\Admin;

use App\Models\Admin\ProductCategory;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class ProductCategoryRepository
 * @package App\Repositories\Admin
 * @version August 28, 2018, 11:02 pm CEST
 *
 * @method ProductCategory findWithoutFail($id, $columns = ['*'])
 * @method ProductCategory find($id, $columns = ['*'])
 * @method ProductCategory first($columns = ['*'])
*/
class ProductCategoryRepository extends BaseRepository
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
        return ProductCategory::class;
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
