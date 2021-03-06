<?php

namespace App\Models\Admin;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Service
 * @package App\Models\Admin
 * @version August 28, 2018, 11:03 pm CEST
 *
 * @property \App\Models\Admin\ServiceCategory serviceCategory
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
 * @property \Illuminate\Database\Eloquent\Collection roomSeasons
 * @property \Illuminate\Database\Eloquent\Collection roomTranslations
 * @property \Illuminate\Database\Eloquent\Collection rooms
 * @property \Illuminate\Database\Eloquent\Collection RoomsService
 * @property \Illuminate\Database\Eloquent\Collection screensFrontSections
 * @property \Illuminate\Database\Eloquent\Collection seoTranslations
 * @property \Illuminate\Database\Eloquent\Collection serviceCategoryTranslations
 * @property \Illuminate\Database\Eloquent\Collection ServiceTranslation
 * @property \Illuminate\Database\Eloquent\Collection statusTranslations
 * @property \Illuminate\Database\Eloquent\Collection tagTranslations
 * @property \Illuminate\Database\Eloquent\Collection userAddresses
 * @property float price
 * @property float tax
 * @property integer service_category_id
 * @property integer status_id
 */
class Service extends Model
{
    use SoftDeletes;

    public $table = 'services';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'price',
        'tax',
        'service_category_id',
        'status_id'
    ];

    protected $appends = [
        'name',
        'description'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'price' => 'float',
        'tax' => 'float',
        'service_category_id' => 'integer',
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
    public function serviceCategory()
    {
        return $this->belongsTo(\App\Models\Admin\ServiceCategory::class);
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
    public function roomsServices()
    {
        return $this->hasMany(\App\Models\Admin\RoomsService::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function serviceTranslations()
    {
        return $this->hasMany(\App\Models\Admin\ServiceTranslation::class);
    }

    /**
     * Return the ServiceTranslation in current languague.
     *
     * @return ServiceTranslation
     **/
    public function serviceTranslation()
    {
        $language = Language::where('code', \App::getLocale())->first();

        $trans = $this->serviceTranslations()->where( 'language_id', $language->id )->first();;

        return $trans;
    }

    /**
     * Get the name in the given translation (Accessor).
     *
     * @return string
     */
    public function getNameAttribute()
    {
        return $this->serviceTranslation()->name;
    }

    /**
     * Get the description in the given translation (Accessor).
     *
     * @return string
     */
    public function getDescriptionAttribute()
    {
        return $this->serviceTranslation()->description;
    }

}
