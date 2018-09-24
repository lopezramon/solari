<?php

namespace App\Repositories\Admin;

use App\Models\Admin\Booking;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class BookingRepository
 * @package App\Repositories\Admin
 * @version August 28, 2018, 11:03 pm CEST
 *
 * @method Booking findWithoutFail($id, $columns = ['*'])
 * @method Booking find($id, $columns = ['*'])
 * @method Booking first($columns = ['*'])
*/
class BookingRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'code',
        'user_id',
        'checkin_date',
        'checkout_date',
        'subtotal',
        'iva',
        'total',
        'comment',
        'status_id'
    ];

    /**
     * @var array
     */
    protected $customDefaultColumns = [
        'id',
        'code',
        'user_id',
        'checkin_date',
        'checkout_date',
        'subtotal',
        'iva',
        'total',
        'comment',
        'status_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Booking::class;
    }

    /**
     * Generate code with the given id.
     */
    public function generateCode( $id )
    {
        return str_pad($id, 4, '0', STR_PAD_LEFT);
    }

    /**
     * Retrieve customized data of repository.
     *
     * @param array $columns
     * @param array $dates
     *
     * @return array
     */
    public function getCustomized( $columns = null )
    {
        $columns = $columns ?? $this->customDefaultColumns;

        $dataAll = $this->all($columns);

        // SI VIENEN DATES
        /*$data = $dataAll->transform(function($room, $key) use($dates) {

            // ASIGNO EL PRICE CORRESPONDIENTE SEGUN LA(S)
            // TEMPORADA(S) EN LA(S) QUE SE ENCUENTRE EL RANGO DEL REQUEST
            $ivaAndPrice    = $this->getCurrentIvaAndPrice($room, $dates);
            $room->price    = $ivaAndPrice['price'];
            $room->iva      = $ivaAndPrice['iva'];

            return $room;
        });*/
        $data = $dataAll;

        // helper personalizado para eliminar el model translation (ultimo index de cada elemento de la coleccion)
        $array = $this->clearUnusedColumns($data->toArray());

        return $array;
    }

    /**
     * Find customized data of repository.
     *
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
     * Get the relations.
     */
    /*public function getBookingWithRelations( $booking )
    {
        // $finalBooking = (object)[];

        // // DATOS DEL BOOKING
        // $finalBooking->id               = $booking->id;
        // $finalBooking->code             = $booking->code;
        // $finalBooking->subtotal         = $booking->subtotal;
        // $finalBooking->iva              = $booking->iva;
        // $finalBooking->total            = $booking->total;
        // $finalBooking->comment          = $booking->comment;

        // FECHA Y ESTATUS
        $booking->date               = $booking->created_at->format('l d/m/Y');
        $booking->status             = $booking->status->statusTranslation()->name;

        // DATOS DEL USUARIO QUE REALIZA EL BOOKING
        // $finalBooking->formulario             = (object)[];
        // $finalBooking->formulario->email      = $booking->form_email;
        // $finalBooking->formulario->name       = $booking->form_name;
        // $finalBooking->formulario->lastName   = $booking->form_lastname;
        // $finalBooking->formulario->phone      = $booking->form_phone;

        // datos de las rooms del booking (bookingDetails)
        // $booking->rooms = $this->getBookingDetails($booking);

        // ID DEL USUARIO (O NULL)
        // $finalBooking->user_id    = $booking->user_id;

        return $booking;
    }*/

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
            // $column_index2 = count($selectedIndex)-2; // PENDIENTE con este valor, depende de cada modelo
            // $column_index3 = count($selectedIndex)-3; // PENDIENTE con este valor, depende de cada modelo
            // $column_index4 = count($selectedIndex)-4; // PENDIENTE con este valor, depende de cada modelo
            delete_col($array, $column_index);
            // delete_col($array, $column_index2);
            // delete_col($array, $column_index3);
            // delete_col($array, $column_index4);


            // valido si el array es asociativo o no
            if ( isset($array['room']) ) {
                $array = $array['room'];
            }
        }

        return $array;
    }
}
