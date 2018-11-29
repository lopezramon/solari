<?php

namespace App\Repositories\Admin;

use App\Models\Admin\Room;
use Carbon\Carbon;
use Carbon\CarbonImmutable;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class RoomRepository
 * @package App\Repositories\Admin
 * @version August 28, 2018, 11:03 pm CEST
 *
 * @method Room findWithoutFail($id, $columns = ['*'])
 * @method Room find($id, $columns = ['*'])
 * @method Room first($columns = ['*'])
*/
class RoomRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'slug',
        'room_category_id',
        'status_id'
    ];

    /**
     * @var array
     */
    protected $customDefaultColumns = [
        'id',
        'image',
        // 'room_category_id',
        // 'status_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Room::class;
    }

    /**
     * Retrieve customized data of repository.
     *
     * @param array $columns
     * @param array $dates
     *
     * @return array
     */
    public function getCustomized($columns = null, $dates = null, $unavailableRooms = [])
    {
        $columns = $columns ?? $this->customDefaultColumns;

        // $dataAll = $this->all($columns);
        $dataAll = $this->findWhereNotIn( 'id', $unavailableRooms, $columns );

        // CALCULAR PRECIO SEGUN TEMPORADA
        $data = $dataAll->transform(function($room, $key) use($dates) {
            $roomTransformed = $room->toArray();

            // ASIGNO EL PRICE CORRESPONDIENTE SEGUN LA(S)
            // TEMPORADA(S) EN LA(S) QUE SE ENCUENTRE EL RANGO DEL REQUEST
            $ivaAndPrice = $this->model->getCurrentIvaAndPrice($room, $dates);
            $roomTransformed['price']    = $ivaAndPrice['price'];
            // $roomTransformed['iva']      = $ivaAndPrice['iva'];

            return $roomTransformed;
        });

        // helper personalizado para eliminar el model translation (ultimo index de cada elemento de la coleccion)
        $array = $this->clearUnusedColumns($data->toArray());

        return $array;
    }

    /**
     * Find customized data of repository.
     *
     * @param array $id
     * @param array $columns
     *
     * @return array
     */
    public function findCustomized($id, $columns = null)
    {
        $columns = $columns ?? $this->customDefaultColumns;

        $data = $this->findWithoutFail($id, $columns);

        // helper personalizado para eliminar el model translation (ultimo index de cada elemento de la coleccion)
        $array = $this->clearUnusedColumns($data->toArray());

        return $array;
    }

    /**
     * Clear unnecesary columns in collection or objet model.
     *
     * @param array(Collection)|array|(Model) $array
     *
     * @return array
     */
    private function clearUnusedColumns( $array )
    {
        if ( !empty($array) ) {

            // valido si el array es asociativo o no
            if ( isset($array[count($array)-1]) ) {
                $selectedIndex = $array[count($array)-1];
            }
            else {
                $selectedIndex = $array;
                $array = ['room' => $array];
            }

            $column_index  = count($selectedIndex)-1; // PENDIENTE con este valor, depende de cada modelo
            $column_index2 = count($selectedIndex)-2; // PENDIENTE con este valor, depende de cada modelo
            $column_index3 = count($selectedIndex)-3; // PENDIENTE con este valor, depende de cada modelo
            $column_index4 = count($selectedIndex)-4; // PENDIENTE con este valor, depende de cada modelo
            delete_col($array, $column_index);
            delete_col($array, $column_index2);
            delete_col($array, $column_index3);
            delete_col($array, $column_index4);


            // valido si el array es asociativo o no
            if ( isset($array['room']) ) {
                $array = $array['room'];
            }
        }

        return $array;
    }

    /**
     * Applies the given where conditions to the model WITH OR OPERATOR.
     *
     * @param array $where
     * @return void
     */
    protected function applyConditions(array $where)
    {
        foreach ($where as $field => $value) {
            if (is_array($value)) {
                list($field, $condition, $val) = $value;
                $this->model = $this->model->orWhere($field, $condition, $val);
            } else {
                $this->model = $this->model->where($field, '=', $value);
            }
        }
    }
}
