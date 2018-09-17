<?php

namespace App\Repositories\Admin;

use App\Models\Admin\ProductSubcategory;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class ProductSubcategoryRepository
 * @package App\Repositories\Admin
 * @version August 28, 2018, 11:02 pm CEST
 *
 * @method ProductSubcategory findWithoutFail($id, $columns = ['*'])
 * @method ProductSubcategory find($id, $columns = ['*'])
 * @method ProductSubcategory first($columns = ['*'])
*/
class ProductSubcategoryRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'code',
        'presentation',
        'product_category_id',
        'additional_category_id',
        'image',
        'status_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return ProductSubcategory::class;
    }

    /**
     * Retrieve customized data of repository.
     *
     * @param array $columns
     *
     * @return array
     */
    public function getCustomized($columns = ['id', 'product_category_id', 'image', 'status_id'])
    {
        $data = $this->all($columns);

        // helper personalizado para eliminar el model translation (ultimo index de cada elemento de la coleccion)
        $array        = $data->toArray();
        $column_index = count($array[0])-1; // PENDIENTE con este valor, depende de cada modelo
        delete_col($array, $column_index);

        return $array;
    }
}
