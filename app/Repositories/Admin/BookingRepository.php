<?php

namespace App\Repositories\Admin;

use App\Models\Admin\Booking;
use App\Models\Admin\Room;
use App\User;
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

        'responsable_name',
        'responsable_email',
        'responsable_phone',
        'responsable_identification',

        'status_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Booking::class;
    }

    public function createCustomized( $data )
    {
        // montos
        $total  = 0;
        $iva    = 0;

        // Save Booking
        $booking = $this->setBookingModel( $data );

        foreach ($data['datos_reserva'] as $key => $roomItem) {

            // Save BookingDetail
            $bookingDetail = $this->setBookingDetailModel($roomItem, $booking);

            // Save FormData
            $formData = $this->setFormDataModel( $roomItem, $bookingDetail );

            // montos para el BookingDetail
            $total  += $bookingDetail->total_item;
            $iva    += $bookingDetail->iva_item;
        }

        // Update Booking (para guardar los montos y generar codigo)
        $bookingData = [];
        $bookingData['subtotal']    = $total - $iva;
        $bookingData['iva']         = $iva;
        $bookingData['total']       = $total;
        $bookingData['code']        = $this->generateCode($booking->id);
        $booking = $this->update($bookingData, $booking->id);

        return $booking;
    }

    /**
     * Set and store the booking.
     *
     * @param array $data
     *
     * @return Booking
     */
    private function setBookingModel( $data )
    {
        $booking                    = [];

        // RELACION CON MODELO USER
        $user                       = User::find($data['user_id']);
        $booking['user_id']         = $user->id ?? null;

        // DATOS DE LA ORDEN
        $booking['checkin_date']    = $data['cart']['checkin'];
        $booking['checkout_date']   = $data['cart']['checkout'];
        $booking['comment']         = $data['comentario'];

        // DATOS DEL RESPONSABLE
        $booking['responsable_name']            = $data['cart']['responsable']['name'];
        $booking['responsable_email']           = $data['cart']['responsable']['email'];
        $booking['responsable_phone']           = $data['cart']['responsable']['phone'];
        $booking['responsable_identification']  = $data['cart']['responsable']['identidad'];

        return $this->create($booking);
    }

    /**
     * Set and store the booking detail.
     *
     * @param object    $roomItem
     * @param Order     $booking
     *
     * @return BookingDetail
     */
    private function setBookingDetailModel( $roomItem, $booking )
    {
        $roomId = $roomItem['idroom'];
        $room = Room::find($roomId);

        // booking datail
        $bookingDetail                      = [];
        $bookingDetail['booking_id']        = $booking->id;
        $bookingDetail['row_id']            = $room->row->id;
        $bookingDetail['adult_quantity']    = $roomItem['numero'];

        // montos
        $dates = [
            'checkin'   => $booking->checkin_date->toDateString(),
            'checkout'  => $booking->checkout_date->toDateString()
        ];
        $ivaAndPrice = $room->getCurrentIvaAndPrice($room, $dates);
        $bookingDetail['total_item']        = $ivaAndPrice['price'];
        $bookingDetail['iva_item']          = $ivaAndPrice['iva'];

        return $booking->bookingDetails()->create($bookingDetail);
    }

    /**
     * Set and store the form data for the given booking detail.
     *
     * @param object    $roomItem
     *
     * @return FormData
     */
    private function setFormDataModel( $roomItem, $bookingDetail )
    {
        $formData           = [];
        $formData['name']   = $roomItem['name'];
        $formData['email']  = $roomItem['email'];

        $formDataModel = $bookingDetail->formInfo()->create($formData);

        $bookingDetail->update(['form_data_id' => $formDataModel->id]);

        return $formDataModel;
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
    public function findCustomized( $id, $columns = null )
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
