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
     * @param array $where
     * @param array $ids
     *
     * @return array
     */
    public function getCustomized($columns = null, $dates = null)
    {
        $columns = $columns ?? $this->customDefaultColumns;

        $dataAll = $this->all($columns);

        // SI VIENEN DATES
        $data = $dataAll->transform(function($room, $key) use($dates) {

            $price = 0; // entero para guardar el precio de la habitacion segun el rango
            $two_seasons = false; // flag para saber si el rango esta en dos temporadas

            // recorro cada una de las temporadas de la habitacion
            foreach ($room->roomSeasons->sortBy('start_date') as $key => $season) {

                // OBTENGO LOS VALORES DEL RANGO A BUSCAR (con Carbon)
                $checkin_request = Carbon::createFromFormat('Y-m-d H', $dates[0][2].' 0');
                $checkout_request = Carbon::createFromFormat('Y-m-d H', $dates[1][2].' 0');

                // SI ENTRA EN ESTE IF: EL RANGO DE CONSULTA SE ENCUENTRA EN UNA SOLA TEMPORADA
                if ( $season->start_date->lessThanOrEqualTo($checkin_request) &&
                    $season->end_date->greaterThanOrEqualTo($checkout_request) ) {

                    /*print_r([
                        'first',
                        $season->id
                    ]);*/

                    $days = $checkin_request->diffInDays($checkout_request) + 1;
                    $price = $days * $season->price;
                }

                // SI ENTRA EN ESTE IF: EL RANGO DE CONSULTA SE ENCUENTRA EN DOS O MAS TEMPORADAS
                else if ( $season->start_date->lessThanOrEqualTo($checkin_request) &&
                    $season->end_date->lessThan($checkout_request) ) {


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


                    $days   = $checkin_request->diffInDays($season->end_date) + 1;
                    $price  = $days * $season->price;


                // levanto el flag de que ya estoy en una temporada
                $isOneSeason = true;
                // dd('a');
                // break;
            }

            // SI ENTRA EN ESTE IF: EL RANGO DE CONSULTA SE ENCUENTRA EN DOS O MAS TEMPORADAS
            else if ( /*$isOneSeason &&*/
                $season->start_date->lessThanOrEqualTo($checkin_request) &&
                $season->end_date->lessThan($checkout_request) ) {


                    // CAPTURO LA SEASON DONDE TERMINA EL RANGO
                    if ( $checkout_request->between($season->start_date, $season->end_date) ) {
                        $days2  = $season->start_date->diffInDays($checkout_request) + 1;
                        $price2 = $days2 * $season->price;

                // levanto el flag de que el rango sobrepasa la temporada actual
                $isTwoSeasons = true;
                // dd('b');

            }

            // print '**';
            // print_r($price);
            // exit('**boom');

            // ASIGNO EL PRICE RESULTANTE
            $room->price = number_format($price, 2);

            return $room;
        });


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
