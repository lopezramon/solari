<?php

namespace App\Models\Admin;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class ProductSubcategory
 * @package App\Models\Admin
 * @version August 28, 2018, 11:02 pm CEST
 *
 * @property \App\Models\Admin\AdditionalCategory additionalCategory
 * @property \App\Models\Admin\ProductCategory productCategory
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
 * @property \Illuminate\Database\Eloquent\Collection ProductSubcategoryTranslation
 * @property \Illuminate\Database\Eloquent\Collection productTranslations
 * @property \Illuminate\Database\Eloquent\Collection Product
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
 * @property integer presentation
 * @property integer product_category_id
 * @property integer additional_category_id
 * @property string image
 * @property integer status_id
 */
class ProductSubcategory extends Model
{
    use SoftDeletes;

    public $table = 'product_subcategories';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'code',
        'presentation',
        'product_category_id',
        'additional_category_id',
        'image',
        'status_id'
    ];

    protected $appends = ['name', 'description'];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'code' => 'string',
        'presentation' => 'integer',
        'product_category_id' => 'integer',
        'additional_category_id' => 'integer',
        'image' => 'string',
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
    public function productCategory()
    {
        return $this->belongsTo(\App\Models\Admin\ProductCategory::class);
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
    public function productSubcategoryTranslations()
    {
        return $this->hasMany(\App\Models\Admin\ProductSubcategoryTranslation::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function products()
    {
        return $this->hasMany(\App\Models\Admin\Product::class);
    }

    /**
     * Return the ProductCategoryTranslation in current languague.
     *
     * @return ProductCategoryTranslation
     **/
    public function productSubcategoryTranslation()
    {
        $language = Language::where('code', \App::getLocale())->first();
        return $this->productSubcategoryTranslations->filter(function($productSubcategoryTranslation) use($language){
            return $productSubcategoryTranslation->language_id == $language->id;
        })->first();
    }

    /**
     * Get the name in the given translation (Accessor).
     *
     * @return string
     */
    public function getNameAttribute()
    {
        return $this->productSubcategoryTranslation()->name;
    }

    /**
     * Get the description in the given translation (Accessor).
     *
     * @return string
     */
    public function getDescriptionAttribute()
    {
        return $this->productSubcategoryTranslation()->description;
    }
}
