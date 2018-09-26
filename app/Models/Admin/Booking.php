<?php

namespace App\Models\Admin;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Booking
 * @package App\Models\Admin
 * @version August 28, 2018, 11:03 pm CEST
 *
 * @property \App\Models\Admin\Status status
 * @property \App\Models\Admin\User user
 * @property \Illuminate\Database\Eloquent\Collection activities
 * @property \Illuminate\Database\Eloquent\Collection activityCategoryTranslations
 * @property \Illuminate\Database\Eloquent\Collection activityTranslations
 * @property \Illuminate\Database\Eloquent\Collection additionalCategoryTranslations
 * @property \Illuminate\Database\Eloquent\Collection additionalTranslations
 * @property \Illuminate\Database\Eloquent\Collection additionals
 * @property \Illuminate\Database\Eloquent\Collection blogCategoryTranslations
 * @property \Illuminate\Database\Eloquent\Collection blogComments
 * @property \Illuminate\Database\Eloquent\Collection blogTranslations
 * @property \Illuminate\Database\Eloquent\Collection BookingDetail
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
 * @property \Illuminate\Database\Eloquent\Collection roomSeasons
 * @property \Illuminate\Database\Eloquent\Collection roomTranslations
 * @property \Illuminate\Database\Eloquent\Collection rooms
 * @property \Illuminate\Database\Eloquent\Collection roomsServices
 * @property \Illuminate\Database\Eloquent\Collection screensFrontSections
 * @property \Illuminate\Database\Eloquent\Collection seoTranslations
 * @property \Illuminate\Database\Eloquent\Collection serviceCategoryTranslations
 * @property \Illuminate\Database\Eloquent\Collection serviceTranslations
 * @property \Illuminate\Database\Eloquent\Collection services
 * @property \Illuminate\Database\Eloquent\Collection statusTranslations
 * @property \Illuminate\Database\Eloquent\Collection tagTranslations
 * @property \Illuminate\Database\Eloquent\Collection userAddresses
 * @property float subtotal
 * @property float iva
 * @property float total
 * @property integer user_id
 * @property string no_register_user_name
 * @property string no_register_user_email
 * @property string no_register_user_phone
 * @property integer status_id
 */
class Booking extends Model
{
    use SoftDeletes;

    public $table = 'bookings';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
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

        'show_to_user',
        'status_id'
    ];

    protected $appends = [
        'rooms',
        'responsable'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'code' => 'string',
        'user_id' => 'integer',

        'checkin_date' => 'date',
        'checkout_date' => 'date',

        'subtotal' => 'float',
        'iva' => 'float',
        'total' => 'float',
        'comment' => 'string',
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
    public function status()
    {
        return $this->belongsTo(\App\Models\Admin\Status::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function user()
    {
        return $this->belongsTo(\App\User::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function bookingDetails()
    {
        return $this->hasMany(\App\Models\Admin\BookingDetail::class);
    }

    /**
     * Get the BookingDetail of the Booking.
     *
     * @return array
     */
    public function getRoomsAttribute()
    {
        return $this->bookingDetails->transform(function($bookingDet, $key){
            return (object)[
                'id'                => $bookingDet->id,
                'adult_quantity'    => $bookingDet->adult_quantity,
                'room'              => $bookingDet->room,
                'form_data'          => $bookingDet->formInfo,
                'iva_item'          => $bookingDet->iva_item,
                'total_item'        => $bookingDet->total_item,
            ];
        });
    }

    /**
     * Get the responsable of the Booking.
     *
     * @return array
     */
    public function getResponsableAttribute()
    {
        return [
            'name'          => $this->responsable_name,
            'email'         => $this->responsable_email,
            'phone'         => $this->responsable_phone,
            'identidad'     => $this->responsable_identification,
        ];
    }

    /**
     * ACCESSOR subtotal.
     *
     * @return string
     */
    public function getSubtotalAttribute($subtotal)
    {
        return number_format($subtotal, 2, '.', '');
    }

    /**
     * ACCESSOR iva.
     *
     * @return string
     */
    public function getIvaAttribute($iva)
    {
        return number_format($iva, 2, '.', '');
    }

    /**
     * ACCESSOR total.
     *
     * @return string
     */
    public function getTotalAttribute($total)
    {
        return number_format($total, 2, '.', '');
    }
}
