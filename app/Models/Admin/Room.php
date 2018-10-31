<?php

namespace App\Models\Admin;

use Carbon\Carbon;
use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Room
 * @package App\Models\Admin
 * @version August 28, 2018, 11:03 pm CEST
 *
 * @property \App\Models\Admin\RoomCategory roomCategory
 * @property \App\Models\Admin\Status status
 * @property \Illuminate\Database\Eloquent\Collection activities
 * @property \Illuminate\Database\Eloquent\Collection activityCategoryTranslations
 * @property \Illuminate\Database\Eloquent\Collection activityTranslations
 * @property \Illuminate\Database\Eloquent\Collection additionalCategoryTranslations
 * @property \Illuminate\Database\Eloquent\Collection additionalTranslations
 * @property \Illuminate\Database\Eloquent\Collection additionals
 * @property \Illuminate\Database\Eloquent\Collection blogCategoryTranslations
 * @property \Illuminate\Database\Eloquent\Collection blogComments
 * @property \Illuminate\Database\Eloquent\Collection blogTranslations
 * @property \Illuminate\Database\Eloquent\Collection bookings
 * @property \Illuminate\Database\Eloquent\Collection brandTranslations
 * @property \Illuminate\Database\Eloquent\Collection eventCategoryTranslations
 * @property \Illuminate\Database\Eloquent\Collection eventTranslations
 * @property \Illuminate\Database\Eloquent\Collection events
 * @property \Illuminate\Database\Eloquent\Collection orderDetailsAdditionals
 * @property \Illuminate\Database\Eloquent\Collection orders
 * @property \Illuminate\Database\Eloquent\Collection permissionRole
 * @property \Illuminate\Database\Eloquent\Collection permissionUser
 * @property \Illuminate\Database\Eloquent\Collection productCategoryTranslations
 * @property \Illuminate\Database\Eloquent\Collection productPresentationTranslations
 * @property \Illuminate\Database\Eloquent\Collection productPresentationsProducts
 * @property \Illuminate\Database\Eloquent\Collection productSubcategoryTranslations
 * @property \Illuminate\Database\Eloquent\Collection productTranslations
 * @property \Illuminate\Database\Eloquent\Collection roleUser
 * @property \Illuminate\Database\Eloquent\Collection roomCategoryTranslations
 * @property \Illuminate\Database\Eloquent\Collection roomSeasonTranslations
 * @property \Illuminate\Database\Eloquent\Collection RoomSeason
 * @property \Illuminate\Database\Eloquent\Collection RoomTranslation
 * @property \Illuminate\Database\Eloquent\Collection RoomsService
 * @property \Illuminate\Database\Eloquent\Collection screensFrontSections
 * @property \Illuminate\Database\Eloquent\Collection seoTranslations
 * @property \Illuminate\Database\Eloquent\Collection serviceCategoryTranslations
 * @property \Illuminate\Database\Eloquent\Collection serviceTranslations
 * @property \Illuminate\Database\Eloquent\Collection services
 * @property \Illuminate\Database\Eloquent\Collection statusTranslations
 * @property \Illuminate\Database\Eloquent\Collection tagTranslations
 * @property \Illuminate\Database\Eloquent\Collection userAddresses
 * @property string slug
 * @property integer room_category_id
 * @property integer status_id
 */
class Room extends Model
{
    use SoftDeletes;

    public $table = 'rooms';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'slug',
        'room_category_id',
        'status_id'
    ];

    protected $appends = [
        'name',
        'subtitle1',
        'subtitle2',
        'description',
        'price',
        'services',
        'galery'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'slug' => 'string',
        'room_category_id' => 'integer',
        'status_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [

    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function roomCategory()
    {
        return $this->belongsTo(\App\Models\Admin\RoomCategory::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function status()
    {
        return $this->belongsTo(\App\Models\Admin\Status::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function roomSeasons()
    {
        return $this->hasMany(\App\Models\Admin\RoomSeason::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function roomTranslations()
    {
        return $this->hasMany(\App\Models\Admin\RoomTranslation::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function roomsServices()
    {
        return $this->hasMany(\App\Models\Admin\RoomsService::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphOne
     */
    public function row()
    {
        return $this->morphOne('App\Models\Admin\Row', 'rowable');
    }

    /**
     * Return the RoomTranslation in current languague.
     *
     * @return RoomTranslation
     **/
    public function roomTranslation()
    {
        $language = Language::where('code', \App::getLocale())->first();
        return $this->roomTranslations->filter(function($roomTranslation) use($language){
            if ( $roomTranslation->language_id == $language->id && $roomTranslation->room_id == $this->id ) {
                return true;
            }
            else {
                return false;
            }
        })->first();
    }

    /**
     * Get the name in the given translation (Accessor).
     *
     * @return string
     */
    public function getNameAttribute()
    {
        return $this->roomTranslation()->name;
    }

    /**
     * Get the subtitle1 in the given translation (Accessor).
     *
     * @return string
     */
    public function getSubtitle1Attribute()
    {
        return $this->roomTranslation()->subtitle1;
    }

    /**
     * Get the subtitle2 in the given translation (Accessor).
     *
     * @return string
     */
    public function getSubtitle2Attribute()
    {
        return $this->roomTranslation()->subtitle2;
    }

    /**
     * Get the description in the given translation (Accessor).
     *
     * @return string
     */
    public function getDescriptionAttribute()
    {
        return $this->roomTranslation()->description;
    }

    /**
     * Get the price in the current season.
     *
     * @return string
     */
    public function getPriceAttribute()
    {
        $dt = Carbon::now();

        $currentRoomSeason = $this->roomSeasons->filter(function($roomSeason)use($dt){

            // si la fecha de inicio de temporada es menor o igual a hoy
            // y si la fecha de fin de temporada es mayor o igual a hoy
            if ( $roomSeason->start_date->lessThanOrEqualTo($dt) &&
                 $roomSeason->end_date->greaterThanOrEqualTo($dt) ) {

                // entonces devuelvo el registro de esa temporada
                return true;
            }
        });

        return number_format($currentRoomSeason->first()->price, 2, '.', '');
    }

    /**
     * Get the services of the room.
     *
     * @return array
     */
    public function getServicesAttribute()
    {
        return $this->roomsServices->transform(function($serv, $key){
            $service        = (object)[];
            $service->id    = $serv->id;
            $service->name  = $serv->service->serviceTranslation()->name;
            return $service;
        });
    }

    /**
     * Get the galery of the room.
     *
     * @return array
     */
    public function getGaleryAttribute()
    {
        return $this->row->rowsMultimedia->transform(function($multim, $key){
            $image = (object)[];
            $image->id      = $multim->id;
            $image->image   = $multim->multimedia->name;
            $image->title   = $multim->multimedia->description;
            return $image;
        });
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
            }
        }

        return [
            'price' => number_format($price, 2, '.', ''),
            'iva'   => number_format($iva, 2, '.', '')
        ];
    }
}
