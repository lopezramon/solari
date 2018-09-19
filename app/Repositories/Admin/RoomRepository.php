<?php

namespace App\Repositories\Admin;

use App\Models\Admin\Room;
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
     * @param array $where
     * @param array $ids
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
        $array = $this->clearUnusedColumns($data->toArray());

        return $array;
    }

    /**
     * Find customized data of repository.
     *
     * @param array $columns
     * @param array $where
     * @param array $ids
     *
     * @return array
     */
    public function findCustomized($id, $columns = null)
    {
        $columns = $columns ?? $this->customDefaultColumns;

        $data = $this->findWithoutFail($id, $columns);

        // dd($data->toArray());

        // helper personalizado para eliminar el model translation (ultimo index de cada elemento de la coleccion)
        // $array = $data->toArray();
        $array = $this->clearUnusedColumns($data->toArray());

        return $array;
    }

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

        // dd($array);

        return $array;
    }
}
