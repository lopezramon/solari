<?php

namespace App\Repositories\Admin;

use App\Models\Admin\ProductPresentationProduct;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class ProductPresentationProductRepository
 * @package App\Repositories\Admin
 * @version August 28, 2018, 11:03 pm CEST
 *
 * @method ProductPresentationProduct findWithoutFail($id, $columns = ['*'])
 * @method ProductPresentationProduct find($id, $columns = ['*'])
 * @method ProductPresentationProduct first($columns = ['*'])
*/
class ProductPresentationProductRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'product_presentation_id',
        'product_id',
        'code',
        'slug',
        'price',
        'tax',
        'product_quantity',
        'for_delivery',
        'max_quantity_of_sale',
        'min_quantity_of_sale'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return ProductPresentationProduct::class;
    }

    /**
     * Retrieve customized data of repository.
     *
     * @param array $columns
     *
     * @return array
     */
    public function getCustomized($columns = null, $where = null)
    {
        $columns = $columns ?? ['id', 'price', 'iva', 'delivery', 'suggestion', 'product_id'];

        if ( $where == null ) {
            $data = $this->all($columns);
        }
        else{
            $data = $this->findWhere($where, $columns);
        }


        // helper personalizado para eliminar el model translation (ultimo index de cada elemento de la coleccion)
        $array = $data->toArray();

        foreach ($array as $key => $value) {
            $array[$key]['id'] = $value['product_id'];
        }

        if ( !empty($array) ) {
            $column_index = count($array[count($array)-1])-1; // PENDIENTE con este valor, depende de cada modelo
            // $column_index2 = count($array[count($array)-1])-2; // PENDIENTE con este valor, depende de cada modelo
            // $column_index3 = count($array[count($array)-1])-3; // PENDIENTE con este valor, depende de cada modelo
            delete_col($array, $column_index);
            // delete_col($array, $column_index2);
            // delete_col($array, $column_index3);
        }

        return $array;
    }
}
