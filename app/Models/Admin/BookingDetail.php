<?php

namespace App\Models\Admin;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class BookingDetail
 * @package App\Models\Admin
 * @version August 28, 2018, 11:03 pm CEST
 *
 * @property \App\Models\Admin\Booking booking
 * @property \App\Models\Admin\PaymentMethod paymentMethod
 * @property \App\Models\Admin\Row row
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
 * @property date checkin_date
 * @property date checkout_date
 * @property integer persons_amount
 * @property integer booking_id
 * @property integer row_id
 * @property integer payment_method_id
 */
class BookingDetail extends Model
{
    use SoftDeletes;

    public $table = 'booking_details';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'booking_id',
        'row_id',
        'adult_quantity',
        'form_data_id',
        'payment_method_id',
        'iva_item',
        'total_item'
    ];

    protected $appends = [
        'room',
        'form_data'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'booking_id' => 'integer',
        'row_id' => 'integer',
        'adult_quantity' => 'integer',
        'form_data_id' => 'integer',
        'payment_method_id' => 'integer',
        'iva_item' => 'float',
        'total_item' => 'float'
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
    public function booking()
    {
        return $this->belongsTo(\App\Models\Admin\Booking::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function paymentMethod()
    {
        return $this->belongsTo(\App\Models\Admin\PaymentMethod::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function row()
    {
        return $this->belongsTo(\App\Models\Admin\Row::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function formInfo()
    {
        // dd($this->belongsTo(\App\Models\Admin\FormData::class));
        return $this->belongsTo(\App\Models\Admin\FormData::class, 'form_data_id');
    }

    /**
     * Get the Room of the BookingDetail.
     *
     * @return array
     */
    public function getRoomAttribute()
    {
        $room           = $this->row->rowable->select('id', 'image')->first()->toArray();
        $column_index   = count($room)-1;
        $column_index2  = count($room)-2;
        $column_index3  = count($room)-3;
        $column_index4  = count($room)-4;
        $array_temp     = ['room' => $room];
        delete_col($array_temp, $column_index);
        delete_col($array_temp, $column_index2);
        delete_col($array_temp, $column_index3);
        delete_col($array_temp, $column_index4);
        $room           = $array_temp['room'];

        return $room;
    }

    /**
     * Get the FormData of the BookingDetail.
     *
     * @return array
     */
    public function getFormDataAttribute()
    {
        return $this->formInfo;
    }

    /**
     * ACCESSOR iva_item.
     *
     * @return string
     */
    public function getIvaItemAttribute($iva_item)
    {
        return number_format($iva_item, 2, '.', '');
    }

    /**
     * ACCESSOR total_item.
     *
     * @return string
     */
    public function getTotalItemAttribute($total_item)
    {
        return number_format($total_item, 2, '.', '');
    }
}
