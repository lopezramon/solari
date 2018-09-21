<?php

namespace App\Models\Admin;

use App\Models\Admin\Language;
use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Product
 * @package App\Models\Admin
 * @version August 28, 2018, 11:02 pm CEST
 *
 * @property \App\Models\Admin\AdditionalCategory additionalCategory
 * @property \App\Models\Admin\Brand brand
 * @property \App\Models\Admin\Status status
 * @property \App\Models\Admin\ProductSubcategory productSubcategory
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
 * @property \Illuminate\Database\Eloquent\Collection orders
 * @property \Illuminate\Database\Eloquent\Collection permissionRole
 * @property \Illuminate\Database\Eloquent\Collection permissionUser
 * @property \Illuminate\Database\Eloquent\Collection productCategoryTranslations
 * @property \Illuminate\Database\Eloquent\Collection productPresentationTranslations
 * @property \Illuminate\Database\Eloquent\Collection ProductPresentationsProduct
 * @property \Illuminate\Database\Eloquent\Collection productSubcategoryTranslations
 * @property \Illuminate\Database\Eloquent\Collection ProductTranslation
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
 * @property string slug
 * @property float price
 * @property float iva
 * @property integer for_delivery
 * @property integer max_additionals
 * @property integer brand_id
 * @property integer product_subcategory_id
 * @property integer product_feature_id
 * @property integer additional_category_id
 * @property integer status_id
 */
class Product extends Model
{
    use SoftDeletes;

    public $table = 'products';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'code',
        'slug',
        'price',
        'iva',
        'for_delivery',
        'max_additionals',
        'brand_id',
        'product_subcategory_id',
        'product_feature_id',
        'additional_category_id',
        'status_id'
    ];

    protected $appends = ['name', 'description', 'product_subcategory_name', 'presentations'];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'code' => 'string',
        'slug' => 'string',
        'price' => 'float',
        'iva' => 'float',
        'for_delivery' => 'integer',
        'max_additionals' => 'integer',
        'brand_id' => 'integer',
        'product_subcategory_id' => 'integer',
        'product_feature_id' => 'integer',
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
    public function productFeatureCategory()
    {
        return $this->belongsTo(\App\Models\Admin\ProductFeatureCategory::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function brand()
    {
        return $this->belongsTo(\App\Models\Admin\Brand::class);
    }

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
    public function productSubcategory()
    {
        return $this->belongsTo(\App\Models\Admin\ProductSubcategory::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function orderDetails()
    {
        return $this->hasMany(\App\Models\Admin\OrderDetail::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function productPresentationsProducts()
    {
        return $this->hasMany(\App\Models\Admin\ProductPresentationProduct::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function productTranslations()
    {
        return $this->hasMany(\App\Models\Admin\ProductTranslation::class);
    }

    /**
     * Return the ProductCategoryTranslation in current languague.
     *
     * @return ProductCategoryTranslation
     **/
    public function productTranslation()
    {
        $language = Language::where('code', \App::getLocale())->first();
        return $this->productTranslations->filter(function($productTranslation) use($language){
            return $productTranslation->language_id == $language->id;
        })->first();
    }

    /**
     * Get the name in the given translation (Accessor).
     *
     * @return string
     */
    public function getNameAttribute()
    {
        return $this->productTranslation()->name;
    }

    /**
     * Get the description in the given translation (Accessor).
     *
     * @return string
     */
    public function getDescriptionAttribute()
    {
        return $this->productTranslation()->description;
    }

    /**
     * Get the subcategory name of the product.
     *
     * @return string
     */
    public function getProductSubcategoryNameAttribute()
    {
        return $this->productSubcategory->productSubcategoryTranslation()->name;
    }

    /**
     * Get the presentations of the product.
     *
     * @return collect
     */
    public function getPresentationsAttribute()
    {
        $presentations = [];

        foreach ($this->productPresentationsProducts as $key => $productPresentationsProduct) {
            $presentations[$key] = (object)[];

            $presentations[$key]->id            = $productPresentationsProduct->id;
            $presentations[$key]->name          = $productPresentationsProduct->productPresentation->productPresentationTranslation()->name;
            $presentations[$key]->price         = $productPresentationsProduct->price;
            $presentations[$key]->delivery      = $productPresentationsProduct->delivery;
            $presentations[$key]->suggestion    = $productPresentationsProduct->suggestion;
        }

        return $presentations;
    }
}
