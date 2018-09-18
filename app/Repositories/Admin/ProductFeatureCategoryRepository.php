<?php

namespace App\Repositories\Admin;

use App\Models\Admin\ProductFeatureCategory;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class ProductFeatureCategoryRepository
 * @package App\Repositories\Admin
 * @version September 6, 2018, 9:03 pm CEST
 *
 * @method ProductFeatureCategory findWithoutFail($id, $columns = ['*'])
 * @method ProductFeatureCategory find($id, $columns = ['*'])
 * @method ProductFeatureCategory first($columns = ['*'])
*/
class ProductFeatureCategoryRepository extends BaseRepository
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
        return ProductFeatureCategory::class;
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
