<?php

namespace App\Models\Admin;

use App\Models\Admin\Language;
use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class RequestCategory
 * @package App\Models\Admin
 * @version September 13, 2018, 5:57 pm CEST
 *
 * @property \App\Models\Admin\Status status
 * @property \Illuminate\Database\Eloquent\Collection activities
 * @property \Illuminate\Database\Eloquent\Collection activityCategoryTranslations
 * @property \Illuminate\Database\Eloquent\Collection activityTranslations
 * @property \Illuminate\Database\Eloquent\Collection additionalCategoryTranslations
 * @property \Illuminate\Database\Eloquent\Collection additionalTranslations
 * @property \Illuminate\Database\Eloquent\Collection additionals
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
 * @property \Illuminate\Database\Eloquent\Collection productFeatureCategoryTranslations
 * @property \Illuminate\Database\Eloquent\Collection productFeatureTranslations
 * @property \Illuminate\Database\Eloquent\Collection productFeatures
 * @property \Illuminate\Database\Eloquent\Collection productPresentationTranslations
 * @property \Illuminate\Database\Eloquent\Collection productPresentationsProducts
 * @property \Illuminate\Database\Eloquent\Collection productSubcategories
 * @property \Illuminate\Database\Eloquent\Collection productSubcategoryTranslations
 * @property \Illuminate\Database\Eloquent\Collection productTranslations
 * @property \Illuminate\Database\Eloquent\Collection RequestCategoryTranslation
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
 * @property integer status_id
 */
class RequestCategory extends Model
{
    use SoftDeletes;

    public $table = 'request_categories';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'code',
        'status_id'
    ];

    protected $appends = [
        'name',
        'description',
        'status_name'

    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'code' => 'string',
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
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function requestCategoryTranslations()
    {
        return $this->hasMany(\App\Models\Admin\RequestCategoryTranslation::class);
    }

    /**
     * Return the ProductCategoryTranslation in current languague.
     *
     * @return ProductCategoryTranslation
     **/
    public function requestCategoryTranslation()
    {
        $language = Language::where('code', \App::getLocale())->first();
        return $this->requestCategoryTranslations->filter(function($requestCategoryTranslation) use($language){
            return $requestCategoryTranslation->language_id == $language->id;
        })->first();
    }

    /**
     * Get the name in the given translation (Accessor).
     *
     * @return string
     */
    public function getNameAttribute()
    {
        return isset($this->requestCategoryTranslation()->name) ? $this->requestCategoryTranslation()->name : '';
    }

    /**
     * Get the description in the given translation (Accessor).
     *
     * @return string
     */
    public function getDescriptionAttribute()
    {
        return isset($this->requestCategoryTranslation()->description) ? $this->requestCategoryTranslation()->description : '';
    }

        /**
     * Get the status name of the current model.
     *
     * @return string
     */
    public function getStatusNameAttribute()
    {
        return $this->status->statusTranslation()->name;
    }
}
