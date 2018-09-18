<?php

namespace App\Models\Admin;

use App\Traits\DatesTranslator;
use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Order
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
 * @property \Illuminate\Database\Eloquent\Collection bookings
 * @property \Illuminate\Database\Eloquent\Collection brandTranslations
 * @property \Illuminate\Database\Eloquent\Collection eventCategoryTranslations
 * @property \Illuminate\Database\Eloquent\Collection eventTranslations
 * @property \Illuminate\Database\Eloquent\Collection events
 * @property \Illuminate\Database\Eloquent\Collection OrderDetail
 * @property \Illuminate\Database\Eloquent\Collection orderDetailsAdditionals
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
 * @property string code
 * @property integer user_id
 * @property string user_name
 * @property string user_email
 * @property string user_phone
 * @property string fiscal_code
 * @property string|\Carbon\Carbon delivery_date
 * @property string|\Carbon\Carbon store_date
 * @property date shipping_date
 * @property string shipping_address
 * @property string shipping_state
 * @property string shipping_city
 * @property string shipping_zip
 * @property string shipping_lat
 * @property string shipping_lng
 * @property string invoice_name
 * @property string invoice_fiscal_code
 * @property string invoice_sede_fiscal
 * @property string invoice_address
 * @property string invoice_city
 * @property string invoice_state
 * @property string invoice_zip
 * @property float total
 * @property float subtotal
 * @property float iva
 * @property smallInteger show_to_user
 * @property integer status_id
 */
class Order extends Model
{
    use SoftDeletes, DatesTranslator;

    public $table = 'orders';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'code',
        'user_id',
        'form_name',
        'form_lastname',
        'form_email',
        'form_phone',
        'fiscal_code',
        'delivery_date',
        'store_date',
        'shipping_date',
        'shipping_address',
        'shipping_state',
        'shipping_city',
        'shipping_zip',
        'shipping_lat',
        'shipping_lng',
        'invoice_name',
        'invoice_fiscal_code',
        'invoice_sede_fiscal',
        'invoice_address',
        'invoice_city',
        'invoice_state',
        'invoice_zip',
        'total',
        'subtotal',
        'iva',
        'show_to_user',
        'status_id'
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
        'user_name' => 'string',
        'user_email' => 'string',
        'user_phone' => 'string',
        'fiscal_code' => 'string',
        'shipping_date' => 'date',
        'shipping_address' => 'string',
        'shipping_state' => 'string',
        'shipping_city' => 'string',
        'shipping_zip' => 'string',
        'shipping_lat' => 'string',
        'shipping_lng' => 'string',
        'invoice_name' => 'string',
        'invoice_fiscal_code' => 'string',
        'invoice_sede_fiscal' => 'string',
        'invoice_address' => 'string',
        'invoice_city' => 'string',
        'invoice_state' => 'string',
        'invoice_zip' => 'string',
        'total' => 'float',
        'subtotal' => 'float',
        'iva' => 'float',
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
        return $this->belongsTo(\App\Models\Admin\User::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function orderDetails()
    {
        return $this->hasMany(\App\Models\Admin\OrderDetail::class);
    }
}
