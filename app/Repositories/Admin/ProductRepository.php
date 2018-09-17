<?php

namespace App\Repositories\Admin;

use App\Models\Admin\Product;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class ProductRepository
 * @package App\Repositories\Admin
 * @version August 28, 2018, 11:02 pm CEST
 *
 * @method Product findWithoutFail($id, $columns = ['*'])
 * @method Product find($id, $columns = ['*'])
 * @method Product first($columns = ['*'])
*/
class ProductRepository extends BaseRepository
{
    protected $customDefaultColumns = [
        'id',
        'image',
        'max_additionals',
        'brand_id',
        'product_subcategory_id',
        'product_feature_category_id',
        'additional_category_id',
        'status_id'
    ];

    /**
     * @var array
     */
    protected $fieldSearchable = [
        'code',
        'slug',
        'price',
        'tax',
        'for_delivery',
        'max_additionals',
        'brand_id',
        'subcategory_id',
        'additional_category_id',
        'status_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Product::class;
    }

    /**
     * Retrieve customized data of repository.
     *
     * @param array $columns
     *
     * @return array
     */
    public function getCustomized($columns = null, $where = null, $ids = null)
    {
        $columns = $columns ?? $this->customDefaultColumns;

        // SI VIENEN WHERE
        if ( $where == null ) {
            $data = $this->all($columns);
        }
        else{
            $data = $this->findWhere($where, $columns);
        }

        // SI VIENEN LOS ID
        if ( $ids != null ) {
            $data = $this->findWhereIn('id', $ids);
        }

        // helper personalizado para eliminar el model translation (ultimo index de cada elemento de la coleccion)
        $array = $data->toArray();
        if ( !empty($array) ) {
            $column_index = count($array[count($array)-1])-1; // PENDIENTE con este valor, depende de cada modelo
            $column_index2 = count($array[count($array)-1])-2; // PENDIENTE con este valor, depende de cada modelo
            $column_index3 = count($array[count($array)-1])-3; // PENDIENTE con este valor, depende de cada modelo
            delete_col($array, $column_index);
            delete_col($array, $column_index2);
            delete_col($array, $column_index3);
        }

        return $array;
    }

    /**
     * Retrieve customized data of repository by multiple values in one field.
     *
     * @param       $field
     * @param array $values
     * @param array $columns
     *
     * @return array
     */
    public function findWhereInCustomized($field, array $values, $columns = null)
    {
        $columns = $columns ?? $this->customDefaultColumns;

        $data = $this->findWhereIn($field, $values, $columns);

        // helper personalizado para eliminar el model translation (ultimo index de cada elemento de la coleccion)
        $array = $data->toArray();

        // if ( !empty($array) ) {
        //     $column_index = count($array[count($array)-1])-1; // PENDIENTE con este valor, depende de cada modelo
        //     delete_col($array, $column_index);
        // }

        return $array;
    }
}
