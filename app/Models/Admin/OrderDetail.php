<?php

namespace App\Models\Admin;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class OrderDetail
 * @package App\Models\Admin
 * @version August 28, 2018, 11:03 pm CEST
 *
 * @property \App\Models\Admin\Order order
 * @property \App\Models\Admin\Product product
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
 * @property \Illuminate\Database\Eloquent\Collection OrderDetailsAdditional
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
 * @property integer order_id
 * @property integer product_presentation_product_id
 * @property integer product_presentation_product_id
 * @property integer product_quantity
 * @property string comment
 */
class OrderDetail extends Model
{
    use SoftDeletes;

    public $table = 'order_details';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'order_id',
        'product_presentation_product_id',
        'product_feature_id',
        'product_quantity',
        'comment',
        'total_item',
        'iva_item'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'order_id' => 'integer',
        'product_presentation_product_id' => 'integer',
        'product_feature_id' => 'integer',
        'product_quantity' => 'integer',
        'comment' => 'string'
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
    public function order()
    {
        return $this->belongsTo(\App\Models\Admin\Order::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function productPresentationProduct()
    {
        return $this->belongsTo(\App\Models\Admin\ProductPresentationProduct::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function productFeature()
    {
        return $this->belongsTo(\App\Models\Admin\ProductFeature::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function orderDetailAdditionals()
    {
        return $this->hasMany(\App\Models\Admin\OrderDetailAdditional::class);
    }
}
