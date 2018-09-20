<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Auth::routes();

Route::post('register', 'Auth\RegisterController@register');

Route::middleware(['auth','hasrole:admin'])->group(function () {

	Route::get('/home', 'HomeController@index')->name('home');


	Route::post('/admin/profile/{user}', 'Admin\UserController@updateProfile')->name('admin.profile.update');


	Route::get('/admin/role', 'Admin\UserController@indexRole')->name('admin.role.index')->middleware('hasrole:admin');
	Route::get('/admin/role/create', 'Admin\UserController@createRole')->name('admin.role.create')->middleware('hasrole:admin');
	Route::get('/admin/role/{role}', 'Admin\UserController@showRole')->name('admin.role.show')->middleware('hasrole:admin');
	Route::get('/admin/role/{role}/edit', 'Admin\UserController@index')->name('admin.role.edit')->middleware('hasrole:admin');
	Route::post('/admin/role', 'Admin\UserController@storeRole')->name('admin.role.store')->middleware('hasrole:admin');


	Route::get('/admin/search/user', 'Admin\UserController@getSearchUser')->name('admin.user.get.search')->middleware('hasrole:admin');
	Route::post('/admin/search/user', 'Admin\UserController@searchUser')->name('admin.user.search')->middleware('hasrole:admin');


	Route::get('/admin/delete/user/{user}', 'Admin\UserController@dropOutUser')->name('admin.drop.out.user')->middleware('hasrole:admin');


	Route::get('/admin/permission/to/role/{role}', 'Admin\UserController@permissionToRole')->name('admin.permission.to.role')->middleware('hasrole:admin');
	Route::post('/admin/permission/to/role/{role}', 'Admin\UserController@addPermissionToRole')->name('admin.add.permission.to.role')->middleware('hasrole:admin');
	Route::post('/admin/role/to/user/{user}', 'Admin\UserController@addRoleToUser')->name('admin.role.to.user')->middleware('hasrole:admin');



    // ProductCategory
    Route::get('admin/productCategories', ['as'=> 'admin.productCategories.index', 'uses' => 'Admin\ProductCategoryController@index']);
    Route::get('admin/productCategories/create', ['as'=> 'admin.productCategories.create', 'uses' => 'Admin\ProductCategoryController@create']);
    Route::get('admin/productCategories/{productCategories}', ['as'=> 'admin.productCategories.show', 'uses' => 'Admin\ProductCategoryController@show']);
    Route::get('admin/productCategories/{productCategories}/edit', ['as'=> 'admin.productCategories.edit', 'uses' => 'Admin\ProductCategoryController@edit']);
	    
	    Route::post('admin/productCategories', ['as'=> 'admin.productCategories.store', 'uses' => 'Admin\ProductCategoryController@store']);
	    Route::put('admin/productCategories/{productCategories}', ['as'=> 'admin.productCategories.update', 'uses' => 'Admin\ProductCategoryController@update']);
	    Route::patch('admin/productCategories/{productCategories}', ['as'=> 'admin.productCategories.update', 'uses' => 'Admin\ProductCategoryController@update']);
	    Route::delete('admin/productCategories/{productCategories}', ['as'=> 'admin.productCategories.destroy', 'uses' => 'Admin\ProductCategoryController@destroy']);


    // ProductSubcategory
    Route::get('admin/productSubcategories', ['as'=> 'admin.productSubcategories.index', 'uses' => 'Admin\ProductSubcategoryController@index']);
    Route::get('admin/productSubcategories/create', ['as'=> 'admin.productSubcategories.create', 'uses' => 'Admin\ProductSubcategoryController@create']);
    Route::get('admin/productSubcategories/{productSubcategories}', ['as'=> 'admin.productSubcategories.show', 'uses' => 'Admin\ProductSubcategoryController@show']);
    Route::get('admin/productSubcategories/{productSubcategories}/edit', ['as'=> 'admin.productSubcategories.edit', 'uses' => 'Admin\ProductSubcategoryController@edit']);
    
	    Route::post('admin/productSubcategories', ['as'=> 'admin.productSubcategories.store', 'uses' => 'Admin\ProductSubcategoryController@store']);
	    Route::patch('admin/productSubcategories/{productSubcategories}', ['as'=> 'admin.productSubcategories.update', 'uses' => 'Admin\ProductSubcategoryController@update']);
    	Route::delete('admin/productSubcategories/{productSubcategories}', ['as'=> 'admin.productSubcategories.destroy', 'uses' => 'Admin\ProductSubcategoryController@destroy']);


    // Additional Categories
	Route::get('admin/additionalCategories', ['as'=> 'admin.additionalCategories.index', 'uses' => 'Admin\AdditionalCategoryController@index']);
	Route::get('admin/additionalCategories/create', ['as'=> 'admin.additionalCategories.create', 'uses' => 'Admin\AdditionalCategoryController@create']);
	Route::get('admin/additionalCategories/{additionalCategories}', ['as'=> 'admin.additionalCategories.show', 'uses' => 'Admin\AdditionalCategoryController@show']);
	Route::get('admin/additionalCategories/{additionalCategories}/edit', ['as'=> 'admin.additionalCategories.edit', 'uses' => 'Admin\AdditionalCategoryController@edit']);
		
		Route::post('admin/additionalCategories', ['as'=> 'admin.additionalCategories.store', 'uses' => 'Admin\AdditionalCategoryController@store']);
		Route::put('admin/additionalCategories/{additionalCategories}', ['as'=> 'admin.additionalCategories.update', 'uses' => 'Admin\AdditionalCategoryController@update']);
		Route::patch('admin/additionalCategories/{additionalCategories}', ['as'=> 'admin.additionalCategories.update', 'uses' => 'Admin\AdditionalCategoryController@update']);
		Route::delete('admin/additionalCategories/{additionalCategories}', ['as'=> 'admin.additionalCategories.destroy', 'uses' => 'Admin\AdditionalCategoryController@destroy']);


    // ProductFeatureCategories
	Route::get('admin/productFeatureCategories', ['as'=> 'admin.productFeatureCategories.index', 'uses' => 'Admin\ProductFeatureCategoryController@index']);
	Route::get('admin/productFeatureCategories/create', ['as'=> 'admin.productFeatureCategories.create', 'uses' => 'Admin\ProductFeatureCategoryController@create']);
	Route::get('admin/productFeatureCategories/{productFeatureCategories}', ['as'=> 'admin.productFeatureCategories.show', 'uses' => 'Admin\ProductFeatureCategoryController@show']);
	Route::get('admin/productFeatureCategories/{productFeatureCategories}/edit', ['as'=> 'admin.productFeatureCategories.edit', 'uses' => 'Admin\ProductFeatureCategoryController@edit']);

		Route::post('admin/productFeatureCategories', ['as'=> 'admin.productFeatureCategories.store', 'uses' => 'Admin\ProductFeatureCategoryController@store']);
		Route::put('admin/productFeatureCategories/{productFeatureCategories}', ['as'=> 'admin.productFeatureCategories.update', 'uses' => 'Admin\ProductFeatureCategoryController@update']);
		Route::patch('admin/productFeatureCategories/{productFeatureCategories}', ['as'=> 'admin.productFeatureCategories.update', 'uses' => 'Admin\ProductFeatureCategoryController@update']);
		Route::delete('admin/productFeatureCategories/{productFeatureCategories}', ['as'=> 'admin.productFeatureCategories.destroy', 'uses' => 'Admin\ProductFeatureCategoryController@destroy']);


    // ProductFeature
	Route::get('admin/productFeatures', ['as'=> 'admin.productFeatures.index', 'uses' => 'Admin\ProductFeatureController@index']);
	Route::get('admin/productFeatures/create', ['as'=> 'admin.productFeatures.create', 'uses' => 'Admin\ProductFeatureController@create']);
	Route::get('admin/productFeatures/{productFeatures}', ['as'=> 'admin.productFeatures.show', 'uses' => 'Admin\ProductFeatureController@show']);
	Route::get('admin/productFeatures/{productFeatures}/edit', ['as'=> 'admin.productFeatures.edit', 'uses' => 'Admin\ProductFeatureController@edit']);
		
		Route::post('admin/productFeatures', ['as'=> 'admin.productFeatures.store', 'uses' => 'Admin\ProductFeatureController@store']);
		Route::put('admin/productFeatures/{productFeatures}', ['as'=> 'admin.productFeatures.update', 'uses' => 'Admin\ProductFeatureController@update']);
		Route::patch('admin/productFeatures/{productFeatures}', ['as'=> 'admin.productFeatures.update', 'uses' => 'Admin\ProductFeatureController@update']);
		Route::delete('admin/productFeatures/{productFeatures}', ['as'=> 'admin.productFeatures.destroy', 'uses' => 'Admin\ProductFeatureController@destroy']);


    // Product Presentations
	Route::get('admin/productPresentations', ['as'=> 'admin.productPresentations.index', 'uses' => 'Admin\ProductPresentationController@index']);
	Route::get('admin/productPresentations/create', ['as'=> 'admin.productPresentations.create', 'uses' => 'Admin\ProductPresentationController@create']);
	Route::get('admin/productPresentations/{productPresentations}', ['as'=> 'admin.productPresentations.show', 'uses' => 'Admin\ProductPresentationController@show']);
	Route::get('admin/productPresentations/{productPresentations}/edit', ['as'=> 'admin.productPresentations.edit', 'uses' => 'Admin\ProductPresentationController@edit']);
		
		Route::post('admin/productPresentations', ['as'=> 'admin.productPresentations.store', 'uses' => 'Admin\ProductPresentationController@store']);
		Route::put('admin/productPresentations/{productPresentations}', ['as'=> 'admin.productPresentations.update', 'uses' => 'Admin\ProductPresentationController@update']);
		Route::patch('admin/productPresentations/{productPresentations}', ['as'=> 'admin.productPresentations.update', 'uses' => 'Admin\ProductPresentationController@update']);
		Route::delete('admin/productPresentations/{productPresentations}', ['as'=> 'admin.productPresentations.destroy', 'uses' => 'Admin\ProductPresentationController@destroy']);


	// Product
	Route::get('admin/products', ['as'=> 'admin.products.index', 'uses' => 'Admin\ProductController@index']);
	Route::get('admin/products/create', ['as'=> 'admin.products.create', 'uses' => 'Admin\ProductController@create']);
	Route::get('admin/products/{products}', ['as'=> 'admin.products.show', 'uses' => 'Admin\ProductController@show']);
	Route::get('admin/products/{products}/edit', ['as'=> 'admin.products.edit', 'uses' => 'Admin\ProductController@edit']);
		
		Route::post('admin/products', ['as'=> 'admin.products.store', 'uses' => 'Admin\ProductController@store']);
		Route::put('admin/products/{products}', ['as'=> 'admin.products.update', 'uses' => 'Admin\ProductController@update']);
		Route::patch('admin/products/{products}', ['as'=> 'admin.products.update', 'uses' => 'Admin\ProductController@update']);
		Route::delete('admin/products/{products}', ['as'=> 'admin.products.destroy', 'uses' => 'Admin\ProductController@destroy']);


    // Product Presentations Products
	Route::get('admin/productPresentationProducts', ['as'=> 'admin.productPresentationProducts.index', 'uses' => 'Admin\ProductPresentationProductController@index']);
	Route::get('admin/productPresentationProducts/create', ['as'=> 'admin.productPresentationProducts.create', 'uses' => 'Admin\ProductPresentationProductController@create']);
	Route::get('admin/productPresentationProducts/{productPresentationProducts}', ['as'=> 'admin.productPresentationProducts.show', 'uses' => 'Admin\ProductPresentationProductController@show']);
	Route::get('admin/productPresentationProducts/{productPresentationProducts}/edit', ['as'=> 'admin.productPresentationProducts.edit', 'uses' => 'Admin\ProductPresentationProductController@edit']);

		Route::post('admin/productPresentationProducts', ['as'=> 'admin.productPresentationProducts.store', 'uses' => 'Admin\ProductPresentationProductController@store']);
		Route::put('admin/productPresentationProducts/{productPresentationProducts}', ['as'=> 'admin.productPresentationProducts.update', 'uses' => 'Admin\ProductPresentationProductController@update']);
		Route::patch('admin/productPresentationProducts/{productPresentationProducts}', ['as'=> 'admin.productPresentationProducts.update', 'uses' => 'Admin\ProductPresentationProductController@update']);
		Route::delete('admin/productPresentationProducts/{productPresentationProducts}', ['as'=> 'admin.productPresentationProducts.destroy', 'uses' => 'Admin\ProductPresentationProductController@destroy']);


	// Route::get('admin/blogCategories', ['as'=> 'admin.blogCategories.index', 'uses' => 'Admin\BlogCategoryController@index']);
	// Route::post('admin/blogCategories', ['as'=> 'admin.blogCategories.store', 'uses' => 'Admin\BlogCategoryController@store']);
	// Route::get('admin/blogCategories/create', ['as'=> 'admin.blogCategories.create', 'uses' => 'Admin\BlogCategoryController@create']);
	// Route::put('admin/blogCategories/{blogCategories}', ['as'=> 'admin.blogCategories.update', 'uses' => 'Admin\BlogCategoryController@update']);
	// Route::patch('admin/blogCategories/{blogCategories}', ['as'=> 'admin.blogCategories.update', 'uses' => 'Admin\BlogCategoryController@update']);
	// Route::delete('admin/blogCategories/{blogCategories}', ['as'=> 'admin.blogCategories.destroy', 'uses' => 'Admin\BlogCategoryController@destroy']);
	// Route::get('admin/blogCategories/{blogCategories}', ['as'=> 'admin.blogCategories.show', 'uses' => 'Admin\BlogCategoryController@show']);
	// Route::get('admin/blogCategories/{blogCategories}/edit', ['as'=> 'admin.blogCategories.edit', 'uses' => 'Admin\BlogCategoryController@edit']);


	// Route::get('admin/blogs', ['as'=> 'admin.blogs.index', 'uses' => 'Admin\BlogController@index']);
	// Route::post('admin/blogs', ['as'=> 'admin.blogs.store', 'uses' => 'Admin\BlogController@store']);
	// Route::get('admin/blogs/create', ['as'=> 'admin.blogs.create', 'uses' => 'Admin\BlogController@create']);
	// Route::put('admin/blogs/{blogs}', ['as'=> 'admin.blogs.update', 'uses' => 'Admin\BlogController@update']);
	// Route::patch('admin/blogs/{blogs}', ['as'=> 'admin.blogs.update', 'uses' => 'Admin\BlogController@update']);
	// Route::delete('admin/blogs/{blogs}', ['as'=> 'admin.blogs.destroy', 'uses' => 'Admin\BlogController@destroy']);
	// Route::get('admin/blogs/{blogs}', ['as'=> 'admin.blogs.show', 'uses' => 'Admin\BlogController@show']);
	// Route::get('admin/blogs/{blogs}/edit', ['as'=> 'admin.blogs.edit', 'uses' => 'Admin\BlogController@edit']);


	// Route::get('admin/activityCategories', ['as'=> 'admin.activityCategories.index', 'uses' => 'Admin\ActivityCategoryController@index']);
	// Route::post('admin/activityCategories', ['as'=> 'admin.activityCategories.store', 'uses' => 'Admin\ActivityCategoryController@store']);
	// Route::get('admin/activityCategories/create', ['as'=> 'admin.activityCategories.create', 'uses' => 'Admin\ActivityCategoryController@create']);
	// Route::put('admin/activityCategories/{activityCategories}', ['as'=> 'admin.activityCategories.update', 'uses' => 'Admin\ActivityCategoryController@update']);
	// Route::patch('admin/activityCategories/{activityCategories}', ['as'=> 'admin.activityCategories.update', 'uses' => 'Admin\ActivityCategoryController@update']);
	// Route::delete('admin/activityCategories/{activityCategories}', ['as'=> 'admin.activityCategories.destroy', 'uses' => 'Admin\ActivityCategoryController@destroy']);
	// Route::get('admin/activityCategories/{activityCategories}', ['as'=> 'admin.activityCategories.show', 'uses' => 'Admin\ActivityCategoryController@show']);
	// Route::get('admin/activityCategories/{activityCategories}/edit', ['as'=> 'admin.activityCategories.edit', 'uses' => 'Admin\ActivityCategoryController@edit']);


	// Route::get('admin/activities', ['as'=> 'admin.activities.index', 'uses' => 'Admin\ActivityController@index']);
	// Route::post('admin/activities', ['as'=> 'admin.activities.store', 'uses' => 'Admin\ActivityController@store']);
	// Route::get('admin/activities/create', ['as'=> 'admin.activities.create', 'uses' => 'Admin\ActivityController@create']);
	// Route::put('admin/activities/{activities}', ['as'=> 'admin.activities.update', 'uses' => 'Admin\ActivityController@update']);
	// Route::patch('admin/activities/{activities}', ['as'=> 'admin.activities.update', 'uses' => 'Admin\ActivityController@update']);
	// Route::delete('admin/activities/{activities}', ['as'=> 'admin.activities.destroy', 'uses' => 'Admin\ActivityController@destroy']);
	// Route::get('admin/activities/{activities}', ['as'=> 'admin.activities.show', 'uses' => 'Admin\ActivityController@show']);
	// Route::get('admin/activities/{activities}/edit', ['as'=> 'admin.activities.edit', 'uses' => 'Admin\ActivityController@edit']);


	Route::get('admin/brands', ['as'=> 'admin.brands.index', 'uses' => 'Admin\BrandController@index']);
	Route::post('admin/brands', ['as'=> 'admin.brands.store', 'uses' => 'Admin\BrandController@store']);
	Route::get('admin/brands/create', ['as'=> 'admin.brands.create', 'uses' => 'Admin\BrandController@create']);
	Route::put('admin/brands/{brands}', ['as'=> 'admin.brands.update', 'uses' => 'Admin\BrandController@update']);
	Route::patch('admin/brands/{brands}', ['as'=> 'admin.brands.update', 'uses' => 'Admin\BrandController@update']);
	Route::delete('admin/brands/{brands}', ['as'=> 'admin.brands.destroy', 'uses' => 'Admin\BrandController@destroy']);
	Route::get('admin/brands/{brands}', ['as'=> 'admin.brands.show', 'uses' => 'Admin\BrandController@show']);
	Route::get('admin/brands/{brands}/edit', ['as'=> 'admin.brands.edit', 'uses' => 'Admin\BrandController@edit']);


	Route::get('admin/orders', ['as'=> 'admin.orders.index', 'uses' => 'Admin\OrderController@index']);
	Route::post('admin/orders', ['as'=> 'admin.orders.store', 'uses' => 'Admin\OrderController@store']);
	Route::get('admin/orders/create', ['as'=> 'admin.orders.create', 'uses' => 'Admin\OrderController@create']);
	Route::put('admin/orders/{orders}', ['as'=> 'admin.orders.update', 'uses' => 'Admin\OrderController@update']);
	Route::patch('admin/orders/{orders}', ['as'=> 'admin.orders.update', 'uses' => 'Admin\OrderController@update']);
	Route::delete('admin/orders/{orders}', ['as'=> 'admin.orders.destroy', 'uses' => 'Admin\OrderController@destroy']);
	Route::get('admin/orders/{orders}', ['as'=> 'admin.orders.show', 'uses' => 'Admin\OrderController@show']);
	Route::get('admin/orders/{orders}/edit', ['as'=> 'admin.orders.edit', 'uses' => 'Admin\OrderController@edit']);


	Route::get('admin/orderDetails', ['as'=> 'admin.orderDetails.index', 'uses' => 'Admin\OrderDetailController@index']);
	Route::post('admin/orderDetails', ['as'=> 'admin.orderDetails.store', 'uses' => 'Admin\OrderDetailController@store']);
	Route::get('admin/orderDetails/create', ['as'=> 'admin.orderDetails.create', 'uses' => 'Admin\OrderDetailController@create']);
	Route::put('admin/orderDetails/{orderDetails}', ['as'=> 'admin.orderDetails.update', 'uses' => 'Admin\OrderDetailController@update']);
	Route::patch('admin/orderDetails/{orderDetails}', ['as'=> 'admin.orderDetails.update', 'uses' => 'Admin\OrderDetailController@update']);
	Route::delete('admin/orderDetails/{orderDetails}', ['as'=> 'admin.orderDetails.destroy', 'uses' => 'Admin\OrderDetailController@destroy']);
	Route::get('admin/orderDetails/{orderDetails}', ['as'=> 'admin.orderDetails.show', 'uses' => 'Admin\OrderDetailController@show']);
	Route::get('admin/orderDetails/{orderDetails}/edit', ['as'=> 'admin.orderDetails.edit', 'uses' => 'Admin\OrderDetailController@edit']);


	// Route::get('admin/roomCategories', ['as'=> 'admin.roomCategories.index', 'uses' => 'Admin\RoomCategoryController@index']);
	// Route::post('admin/roomCategories', ['as'=> 'admin.roomCategories.store', 'uses' => 'Admin\RoomCategoryController@store']);
	// Route::get('admin/roomCategories/create', ['as'=> 'admin.roomCategories.create', 'uses' => 'Admin\RoomCategoryController@create']);
	// Route::put('admin/roomCategories/{roomCategories}', ['as'=> 'admin.roomCategories.update', 'uses' => 'Admin\RoomCategoryController@update']);
	// Route::patch('admin/roomCategories/{roomCategories}', ['as'=> 'admin.roomCategories.update', 'uses' => 'Admin\RoomCategoryController@update']);
	// Route::delete('admin/roomCategories/{roomCategories}', ['as'=> 'admin.roomCategories.destroy', 'uses' => 'Admin\RoomCategoryController@destroy']);
	// Route::get('admin/roomCategories/{roomCategories}', ['as'=> 'admin.roomCategories.show', 'uses' => 'Admin\RoomCategoryController@show']);
	// Route::get('admin/roomCategories/{roomCategories}/edit', ['as'=> 'admin.roomCategories.edit', 'uses' => 'Admin\RoomCategoryController@edit']);


	// Route::get('admin/rooms', ['as'=> 'admin.rooms.index', 'uses' => 'Admin\RoomController@index']);
	// Route::post('admin/rooms', ['as'=> 'admin.rooms.store', 'uses' => 'Admin\RoomController@store']);
	// Route::get('admin/rooms/create', ['as'=> 'admin.rooms.create', 'uses' => 'Admin\RoomController@create']);
	// Route::put('admin/rooms/{rooms}', ['as'=> 'admin.rooms.update', 'uses' => 'Admin\RoomController@update']);
	// Route::patch('admin/rooms/{rooms}', ['as'=> 'admin.rooms.update', 'uses' => 'Admin\RoomController@update']);
	// Route::delete('admin/rooms/{rooms}', ['as'=> 'admin.rooms.destroy', 'uses' => 'Admin\RoomController@destroy']);
	// Route::get('admin/rooms/{rooms}', ['as'=> 'admin.rooms.show', 'uses' => 'Admin\RoomController@show']);
	// Route::get('admin/rooms/{rooms}/edit', ['as'=> 'admin.rooms.edit', 'uses' => 'Admin\RoomController@edit']);


	// Route::get('admin/roomSeasons', ['as'=> 'admin.roomSeasons.index', 'uses' => 'Admin\RoomSeasonController@index']);
	// Route::post('admin/roomSeasons', ['as'=> 'admin.roomSeasons.store', 'uses' => 'Admin\RoomSeasonController@store']);
	// Route::get('admin/roomSeasons/create', ['as'=> 'admin.roomSeasons.create', 'uses' => 'Admin\RoomSeasonController@create']);
	// Route::put('admin/roomSeasons/{roomSeasons}', ['as'=> 'admin.roomSeasons.update', 'uses' => 'Admin\RoomSeasonController@update']);
	// Route::patch('admin/roomSeasons/{roomSeasons}', ['as'=> 'admin.roomSeasons.update', 'uses' => 'Admin\RoomSeasonController@update']);
	// Route::delete('admin/roomSeasons/{roomSeasons}', ['as'=> 'admin.roomSeasons.destroy', 'uses' => 'Admin\RoomSeasonController@destroy']);
	// Route::get('admin/roomSeasons/{roomSeasons}', ['as'=> 'admin.roomSeasons.show', 'uses' => 'Admin\RoomSeasonController@show']);
	// Route::get('admin/roomSeasons/{roomSeasons}/edit', ['as'=> 'admin.roomSeasons.edit', 'uses' => 'Admin\RoomSeasonController@edit']);


	// Route::get('admin/serviceCategories', ['as'=> 'admin.serviceCategories.index', 'uses' => 'Admin\ServiceCategoryController@index']);
	// Route::post('admin/serviceCategories', ['as'=> 'admin.serviceCategories.store', 'uses' => 'Admin\ServiceCategoryController@store']);
	// Route::get('admin/serviceCategories/create', ['as'=> 'admin.serviceCategories.create', 'uses' => 'Admin\ServiceCategoryController@create']);
	// Route::put('admin/serviceCategories/{serviceCategories}', ['as'=> 'admin.serviceCategories.update', 'uses' => 'Admin\ServiceCategoryController@update']);
	// Route::patch('admin/serviceCategories/{serviceCategories}', ['as'=> 'admin.serviceCategories.update', 'uses' => 'Admin\ServiceCategoryController@update']);
	// Route::delete('admin/serviceCategories/{serviceCategories}', ['as'=> 'admin.serviceCategories.destroy', 'uses' => 'Admin\ServiceCategoryController@destroy']);
	// Route::get('admin/serviceCategories/{serviceCategories}', ['as'=> 'admin.serviceCategories.show', 'uses' => 'Admin\ServiceCategoryController@show']);
	// Route::get('admin/serviceCategories/{serviceCategories}/edit', ['as'=> 'admin.serviceCategories.edit', 'uses' => 'Admin\ServiceCategoryController@edit']);


	// Route::get('admin/services', ['as'=> 'admin.services.index', 'uses' => 'Admin\ServiceController@index']);
	// Route::post('admin/services', ['as'=> 'admin.services.store', 'uses' => 'Admin\ServiceController@store']);
	// Route::get('admin/services/create', ['as'=> 'admin.services.create', 'uses' => 'Admin\ServiceController@create']);
	// Route::put('admin/services/{services}', ['as'=> 'admin.services.update', 'uses' => 'Admin\ServiceController@update']);
	// Route::patch('admin/services/{services}', ['as'=> 'admin.services.update', 'uses' => 'Admin\ServiceController@update']);
	// Route::delete('admin/services/{services}', ['as'=> 'admin.services.destroy', 'uses' => 'Admin\ServiceController@destroy']);
	// Route::get('admin/services/{services}', ['as'=> 'admin.services.show', 'uses' => 'Admin\ServiceController@show']);
	// Route::get('admin/services/{services}/edit', ['as'=> 'admin.services.edit', 'uses' => 'Admin\ServiceController@edit']);


	// Route::get('admin/eventCategories', ['as'=> 'admin.eventCategories.index', 'uses' => 'Admin\EventCategoryController@index']);
	// Route::post('admin/eventCategories', ['as'=> 'admin.eventCategories.store', 'uses' => 'Admin\EventCategoryController@store']);
	// Route::get('admin/eventCategories/create', ['as'=> 'admin.eventCategories.create', 'uses' => 'Admin\EventCategoryController@create']);
	// Route::put('admin/eventCategories/{eventCategories}', ['as'=> 'admin.eventCategories.update', 'uses' => 'Admin\EventCategoryController@update']);
	// Route::patch('admin/eventCategories/{eventCategories}', ['as'=> 'admin.eventCategories.update', 'uses' => 'Admin\EventCategoryController@update']);
	// Route::delete('admin/eventCategories/{eventCategories}', ['as'=> 'admin.eventCategories.destroy', 'uses' => 'Admin\EventCategoryController@destroy']);
	// Route::get('admin/eventCategories/{eventCategories}', ['as'=> 'admin.eventCategories.show', 'uses' => 'Admin\EventCategoryController@show']);
	// Route::get('admin/eventCategories/{eventCategories}/edit', ['as'=> 'admin.eventCategories.edit', 'uses' => 'Admin\EventCategoryController@edit']);


	// Route::get('admin/bookings', ['as'=> 'admin.bookings.index', 'uses' => 'Admin\BookingController@index']);
	// Route::post('admin/bookings', ['as'=> 'admin.bookings.store', 'uses' => 'Admin\BookingController@store']);
	// Route::get('admin/bookings/create', ['as'=> 'admin.bookings.create', 'uses' => 'Admin\BookingController@create']);
	// Route::put('admin/bookings/{bookings}', ['as'=> 'admin.bookings.update', 'uses' => 'Admin\BookingController@update']);
	// Route::patch('admin/bookings/{bookings}', ['as'=> 'admin.bookings.update', 'uses' => 'Admin\BookingController@update']);
	// Route::delete('admin/bookings/{bookings}', ['as'=> 'admin.bookings.destroy', 'uses' => 'Admin\BookingController@destroy']);
	// Route::get('admin/bookings/{bookings}', ['as'=> 'admin.bookings.show', 'uses' => 'Admin\BookingController@show']);
	// Route::get('admin/bookings/{bookings}/edit', ['as'=> 'admin.bookings.edit', 'uses' => 'Admin\BookingController@edit']);


	// Route::get('admin/bookingDetails', ['as'=> 'admin.bookingDetails.index', 'uses' => 'Admin\BookingDetailController@index']);
	// Route::post('admin/bookingDetails', ['as'=> 'admin.bookingDetails.store', 'uses' => 'Admin\BookingDetailController@store']);
	// Route::get('admin/bookingDetails/create', ['as'=> 'admin.bookingDetails.create', 'uses' => 'Admin\BookingDetailController@create']);
	// Route::put('admin/bookingDetails/{bookingDetails}', ['as'=> 'admin.bookingDetails.update', 'uses' => 'Admin\BookingDetailController@update']);
	// Route::patch('admin/bookingDetails/{bookingDetails}', ['as'=> 'admin.bookingDetails.update', 'uses' => 'Admin\BookingDetailController@update']);
	// Route::delete('admin/bookingDetails/{bookingDetails}', ['as'=> 'admin.bookingDetails.destroy', 'uses' => 'Admin\BookingDetailController@destroy']);
	// Route::get('admin/bookingDetails/{bookingDetails}', ['as'=> 'admin.bookingDetails.show', 'uses' => 'Admin\BookingDetailController@show']);
	// Route::get('admin/bookingDetails/{bookingDetails}/edit', ['as'=> 'admin.bookingDetails.edit', 'uses' => 'Admin\BookingDetailController@edit']);


	Route::get('admin/newsletterUsers', ['as'=> 'admin.newsletterUsers.index', 'uses' => 'Admin\NewsletterUserController@index']);
	Route::post('admin/newsletterUsers', ['as'=> 'admin.newsletterUsers.store', 'uses' => 'Admin\NewsletterUserController@store']);
	Route::get('admin/newsletterUsers/create', ['as'=> 'admin.newsletterUsers.create', 'uses' => 'Admin\NewsletterUserController@create']);
	Route::put('admin/newsletterUsers/{newsletterUsers}', ['as'=> 'admin.newsletterUsers.update', 'uses' => 'Admin\NewsletterUserController@update']);
	Route::patch('admin/newsletterUsers/{newsletterUsers}', ['as'=> 'admin.newsletterUsers.update', 'uses' => 'Admin\NewsletterUserController@update']);
	Route::delete('admin/newsletterUsers/{newsletterUsers}', ['as'=> 'admin.newsletterUsers.destroy', 'uses' => 'Admin\NewsletterUserController@destroy']);
	Route::get('admin/newsletterUsers/{newsletterUsers}', ['as'=> 'admin.newsletterUsers.show', 'uses' => 'Admin\NewsletterUserController@show']);
	Route::get('admin/newsletterUsers/{newsletterUsers}/edit', ['as'=> 'admin.newsletterUsers.edit', 'uses' => 'Admin\NewsletterUserController@edit']);


	Route::get('admin/multimedia', ['as'=> 'admin.multimedia.index', 'uses' => 'Admin\MultimediaController@index']);
	Route::post('admin/multimedia', ['as'=> 'admin.multimedia.store', 'uses' => 'Admin\MultimediaController@store']);
	Route::get('admin/multimedia/create', ['as'=> 'admin.multimedia.create', 'uses' => 'Admin\MultimediaController@create']);
	Route::put('admin/multimedia/{multimedia}', ['as'=> 'admin.multimedia.update', 'uses' => 'Admin\MultimediaController@update']);
	Route::patch('admin/multimedia/{multimedia}', ['as'=> 'admin.multimedia.update', 'uses' => 'Admin\MultimediaController@update']);
	Route::delete('admin/multimedia/{multimedia}', ['as'=> 'admin.multimedia.destroy', 'uses' => 'Admin\MultimediaController@destroy']);
	Route::get('admin/multimedia/{multimedia}', ['as'=> 'admin.multimedia.show', 'uses' => 'Admin\MultimediaController@show']);
	Route::get('admin/multimedia/{multimedia}/edit', ['as'=> 'admin.multimedia.edit', 'uses' => 'Admin\MultimediaController@edit']);


	Route::get('admin/seos', ['as'=> 'admin.seos.index', 'uses' => 'Admin\SeoController@index']);
	Route::post('admin/seos', ['as'=> 'admin.seos.store', 'uses' => 'Admin\SeoController@store']);
	Route::get('admin/seos/create', ['as'=> 'admin.seos.create', 'uses' => 'Admin\SeoController@create']);
	Route::put('admin/seos/{seos}', ['as'=> 'admin.seos.update', 'uses' => 'Admin\SeoController@update']);
	Route::patch('admin/seos/{seos}', ['as'=> 'admin.seos.update', 'uses' => 'Admin\SeoController@update']);
	Route::delete('admin/seos/{seos}', ['as'=> 'admin.seos.destroy', 'uses' => 'Admin\SeoController@destroy']);
	Route::get('admin/seos/{seos}', ['as'=> 'admin.seos.show', 'uses' => 'Admin\SeoController@show']);
	Route::get('admin/seos/{seos}/edit', ['as'=> 'admin.seos.edit', 'uses' => 'Admin\SeoController@edit']);


	Route::get('admin/tagTranslations', ['as'=> 'admin.tagTranslations.index', 'uses' => 'Admin\TagTranslationController@index']);
	Route::post('admin/tagTranslations', ['as'=> 'admin.tagTranslations.store', 'uses' => 'Admin\TagTranslationController@store']);
	Route::get('admin/tagTranslations/create', ['as'=> 'admin.tagTranslations.create', 'uses' => 'Admin\TagTranslationController@create']);
	Route::put('admin/tagTranslations/{tagTranslations}', ['as'=> 'admin.tagTranslations.update', 'uses' => 'Admin\TagTranslationController@update']);
	Route::patch('admin/tagTranslations/{tagTranslations}', ['as'=> 'admin.tagTranslations.update', 'uses' => 'Admin\TagTranslationController@update']);
	Route::delete('admin/tagTranslations/{tagTranslations}', ['as'=> 'admin.tagTranslations.destroy', 'uses' => 'Admin\TagTranslationController@destroy']);
	Route::get('admin/tagTranslations/{tagTranslations}', ['as'=> 'admin.tagTranslations.show', 'uses' => 'Admin\TagTranslationController@show']);
	Route::get('admin/tagTranslations/{tagTranslations}/edit', ['as'=> 'admin.tagTranslations.edit', 'uses' => 'Admin\TagTranslationController@edit']);

    Route::get('admin/tagTranslations/{tagTranslations}/beforeEdit', ['as'=> 'admin.tagTranslations.beforeEdit', 'uses' => 'Admin\TagTranslationController@beforeEdit']);
    Route::patch('admin/tagTranslations/{tagTranslations}', ['as'=> 'admin.tagTranslations.preparedEdit', 'uses' => 'Admin\TagTranslationController@preparedEdit']);

    Route::name('admin.modal_galery.galery.saveGalery')->post('/modal_galery/galery/{id}/saveGalery', 'Admin\MultimediaController@saveGalery');


    Route::get('admin/clientRequests', ['as'=> 'admin.clientRequests.index', 'uses' => 'Admin\ClientRequestController@index']);
	Route::post('admin/clientRequests', ['as'=> 'admin.clientRequests.store', 'uses' => 'Admin\ClientRequestController@store']);
	Route::get('admin/clientRequests/create', ['as'=> 'admin.clientRequests.create', 'uses' => 'Admin\ClientRequestController@create']);
	Route::put('admin/clientRequests/{clientRequests}', ['as'=> 'admin.clientRequests.update', 'uses' => 'Admin\ClientRequestController@update']);
	Route::patch('admin/clientRequests/{clientRequests}', ['as'=> 'admin.clientRequests.update', 'uses' => 'Admin\ClientRequestController@update']);
	Route::delete('admin/clientRequests/{clientRequests}', ['as'=> 'admin.clientRequests.destroy', 'uses' => 'Admin\ClientRequestController@destroy']);
	Route::get('admin/clientRequests/{clientRequests}', ['as'=> 'admin.clientRequests.show', 'uses' => 'Admin\ClientRequestController@show']);
	Route::get('admin/clientRequests/{clientRequests}/edit', ['as'=> 'admin.clientRequests.edit', 'uses' => 'Admin\ClientRequestController@edit']);


	// Route::get('admin/events', ['as'=> 'admin.events.index', 'uses' => 'Admin\EventController@index']);
	// Route::post('admin/events', ['as'=> 'admin.events.store', 'uses' => 'Admin\EventController@store']);
	// Route::get('admin/events/create', ['as'=> 'admin.events.create', 'uses' => 'Admin\EventController@create']);
	// Route::put('admin/events/{events}', ['as'=> 'admin.events.update', 'uses' => 'Admin\EventController@update']);
	// Route::patch('admin/events/{events}', ['as'=> 'admin.events.update', 'uses' => 'Admin\EventController@update']);
	// Route::delete('admin/events/{events}', ['as'=> 'admin.events.destroy', 'uses' => 'Admin\EventController@destroy']);
	// Route::get('admin/events/{events}', ['as'=> 'admin.events.show', 'uses' => 'Admin\EventController@show']);
	// Route::get('admin/events/{events}/edit', ['as'=> 'admin.events.edit', 'uses' => 'Admin\EventController@edit']);


/**************************************************************************************************************************************************************/
	Route::get('admin/roles', ['as'=> 'admin.roles.index', 'uses' => 'Admin\RoleController@index']);
	Route::post('admin/roles', ['as'=> 'admin.roles.store', 'uses' => 'Admin\RoleController@store']);
	Route::get('admin/roles/create', ['as'=> 'admin.roles.create', 'uses' => 'Admin\RoleController@create']);
	Route::put('admin/roles/{roles}', ['as'=> 'admin.roles.update', 'uses' => 'Admin\RoleController@update']);
	Route::patch('admin/roles/{roles}', ['as'=> 'admin.roles.update', 'uses' => 'Admin\RoleController@update']);
	Route::delete('admin/roles/{roles}', ['as'=> 'admin.roles.destroy', 'uses' => 'Admin\RoleController@destroy']);
	Route::get('admin/roles/{roles}', ['as'=> 'admin.roles.show', 'uses' => 'Admin\RoleController@show']);
	Route::get('admin/roles/{roles}/edit', ['as'=> 'admin.roles.edit', 'uses' => 'Admin\RoleController@edit']);

	Route::get('admin/requestCategories', ['as'=> 'admin.requestCategories.index', 'uses' => 'Admin\RequestCategoryController@index']);
Route::post('admin/requestCategories', ['as'=> 'admin.requestCategories.store', 'uses' => 'Admin\RequestCategoryController@store']);
Route::get('admin/requestCategories/create', ['as'=> 'admin.requestCategories.create', 'uses' => 'Admin\RequestCategoryController@create']);
Route::put('admin/requestCategories/{requestCategories}', ['as'=> 'admin.requestCategories.update', 'uses' => 'Admin\RequestCategoryController@update']);
Route::patch('admin/requestCategories/{requestCategories}', ['as'=> 'admin.requestCategories.update', 'uses' => 'Admin\RequestCategoryController@update']);
Route::delete('admin/requestCategories/{requestCategories}', ['as'=> 'admin.requestCategories.destroy', 'uses' => 'Admin\RequestCategoryController@destroy']);
Route::get('admin/requestCategories/{requestCategories}', ['as'=> 'admin.requestCategories.show', 'uses' => 'Admin\RequestCategoryController@show']);
Route::get('admin/requestCategories/{requestCategories}/edit', ['as'=> 'admin.requestCategories.edit', 'uses' => 'Admin\RequestCategoryController@edit']);
});

Route::get('{any}',function(){
    return view('home.index');
})->where('any','.*');




Route::get('admin/formDatas', ['as'=> 'admin.formDatas.index', 'uses' => 'Admin\FormDataController@index']);
Route::post('admin/formDatas', ['as'=> 'admin.formDatas.store', 'uses' => 'Admin\FormDataController@store']);
Route::get('admin/formDatas/create', ['as'=> 'admin.formDatas.create', 'uses' => 'Admin\FormDataController@create']);
Route::put('admin/formDatas/{formDatas}', ['as'=> 'admin.formDatas.update', 'uses' => 'Admin\FormDataController@update']);
Route::patch('admin/formDatas/{formDatas}', ['as'=> 'admin.formDatas.update', 'uses' => 'Admin\FormDataController@update']);
Route::delete('admin/formDatas/{formDatas}', ['as'=> 'admin.formDatas.destroy', 'uses' => 'Admin\FormDataController@destroy']);
Route::get('admin/formDatas/{formDatas}', ['as'=> 'admin.formDatas.show', 'uses' => 'Admin\FormDataController@show']);
Route::get('admin/formDatas/{formDatas}/edit', ['as'=> 'admin.formDatas.edit', 'uses' => 'Admin\FormDataController@edit']);
