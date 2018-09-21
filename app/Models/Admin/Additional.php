<?php

namespace App\Models\Admin;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Additional
 * @package App\Models\Admin
 * @version August 28, 2018, 11:03 pm CEST
 *
 * @property \App\Models\Admin\AdditionalCategory additionalCategory
 * @property \App\Models\Admin\Status status
 * @property \Illuminate\Database\Eloquent\Collection activities
 * @property \Illuminate\Database\Eloquent\Collection activityCategoryTranslations
 * @property \Illuminate\Database\Eloquent\Collection activityTranslations
 * @property \Illuminate\Database\Eloquent\Collection additionalCategoryTranslations
 * @property \Illuminate\Database\Eloquent\Collection AdditionalTranslation
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
 * @property float price
 * @property float iva
 * @property string code
 * @property integer additional_category_id
 * @property integer status_id
 */
class Additional extends Model
{
    use SoftDeletes;

    public $table = 'additionals';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'price',
        'iva',
        'code',
        'additional_category_id',
        'status_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'price' => 'float',
        'iva' => 'float',
        'code' => 'string',
        'additional_category_id' => 'integer',
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
    public function additionalCategory()
    {
        return $this->belongsTo(\App\Models\Admin\AdditionalCategory::class);
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
    public function additionalTranslations()
    {
        return $this->hasMany(\App\Models\Admin\AdditionalTranslation::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function orderDetailsAdditionals()
    {
        return $this->hasMany(\App\Models\Admin\OrderDetailsAdditional::class);
    }

    /**
     * Return the AdditionalTranslation in current languague.
     *
     * @return AdditionalTranslation
     **/
    public function additionalTranslation()
    {
        $language = Language::where('code', \App::getLocale())->first();
        return $this->additionalTranslations->filter(function($additionalTranslation) use($language){
            return $additionalTranslation->language_id == $language->id;
        })->first();
    }
}
