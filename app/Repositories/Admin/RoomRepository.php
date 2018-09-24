<?php

namespace App\Repositories\Admin;

use App\Models\Admin\Room;
use Carbon\Carbon;
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
    public function getCustomized($columns = null, $dates = null)
    {
        // dd($dates);
        $columns = $columns ?? $this->customDefaultColumns;

        $dataAll = $this->all($columns);

        // SI VIENEN DATES
        $data = $dataAll->transform(function($room, $key) use($dates) {
            $roomTransformed = $room->toArray();

            // ASIGNO EL PRICE CORRESPONDIENTE SEGUN LA(S)
            // TEMPORADA(S) EN LA(S) QUE SE ENCUENTRE EL RANGO DEL REQUEST
            $ivaAndPrice = $this->getCurrentIvaAndPrice($room, $dates);
            $roomTransformed['price']    = $ivaAndPrice['price'];
            // $roomTransformed['iva']      = $ivaAndPrice['iva'];

            return $roomTransformed;
        });

        // helper personalizado para eliminar el model translation (ultimo index de cada elemento de la coleccion)
        $array = $this->clearUnusedColumns($data->toArray());
        // $array = $data->toArray();

        return $array;
    }

    /**
     * Retrieve the total price for the room.
     *
     * @param Room $room
     * @param array $dates
     *
     * @return float $price
     */
    public function getCurrentIvaAndPrice($room, $dates)
    {
        $price = 0; // entero para guardar el precio de la habitacion segun el rango
        $iva = 0;   // entero para guardar el iva de la habitacion segun el rango
        $isOneSeason  = false; // flag para saber si el rango esta en una temporada
        $isTwoSeasons = false; // flag para saber si el rango esta en dos temporadas

        // recorro cada una de las temporadas de la habitacion
        foreach ($room->roomSeasons->sortBy('start_date') as $key => $season) {

            // OBTENGO LOS VALORES DEL RANGO A BUSCAR (con Carbon)
            $checkin_request = Carbon::createFromFormat('Y-m-d H', $dates['checkin'].' 0');
            $checkout_request = Carbon::createFromFormat('Y-m-d H', $dates['checkout'].' 0');

            // dd([$checkin_request, $checkout_request]);

            // dd($season->start_date);
            // dd($checkin_request);
            // dd($season->start_date->lessThanOrEqualTo($checkin_request));
            // dd($season->end_date);
            // dd($checkout_request);
            // dd($season->end_date->greaterThanOrEqualTo($checkout_request));
            // dd($season->end_date->lessThan($checkout_request));

            // SI ENTRA EN ESTE IF: EL RANGO DE CONSULTA SE ENCUENTRA EN UNA SOLA TEMPORADA
            if ( $season->start_date->lessThanOrEqualTo($checkin_request) &&
                $season->end_date->greaterThanOrEqualTo($checkout_request) ) {

                // asigno la cantidad de dias a reservar y el precio
                $days   = $checkin_request->diffInDays($checkout_request) + 1;
                $price  = $days * $season->price;
                $iva    = $price * $season->iva;

                // levanto el flag de que ya estoy en una temporada
                $isOneSeason = true;
                break;
            }

            // SI ENTRA EN ESTE IF: EL RANGO DE CONSULTA SE ENCUENTRA EN DOS O MAS TEMPORADAS
            else if ( $season->start_date->lessThanOrEqualTo($checkin_request) &&
                $season->end_date->lessThan($checkout_request) &&
                $checkin_request->between($season->start_date, $season->end_date) ) {

                // asigno la cantidad de dias a reservar y el precio
                $days   = $checkin_request->diffInDays($season->end_date) + 1;
                $price  = $days * $season->price;
                $iva    = $price * $season->iva;

                // levanto el flag de que el rango sobrepasa la temporada actual
                $isTwoSeasons = true;
                // dd($price);
                // break;
            }

            // valido si el rango sobrepasa la temporada actual
            if ( $isTwoSeasons ) {

                // CAPTURO LA SEASON DONDE TERMINA EL RANGO
                if ( $checkout_request->between($season->start_date, $season->end_date) ) {

                    // asigno la cantidad de dias a reservar y el precio PARA ESTA TEMPORADA
                    $days2  = $season->start_date->diffInDays($checkout_request) + 1;
                    $price2 = $days2 * $season->price;
                    $iva2   = $price2 * $season->iva;

                    // SUMO LOS DIAS Y PRECIO DE ESTA TEMPORADA A LOS VALORES DE LA TEMPORADA ANTERIOR
                    $price  += $price2;
                    $iva    += $iva2;
                    $days   += $days2;
                }
                // dd('c');
            }
            // dd('s');
        }

        return [
            'price' => number_format($price, 2, '.', ''),
            'iva'   => number_format($iva, 2, '.', '')
        ];
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

        // helper personalizado para eliminar el model translation (ultimo index de cada elemento de la coleccion)
        // dd($data->toArray());
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
}
