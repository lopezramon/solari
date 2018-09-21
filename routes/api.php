<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::post('setLanguage','LanguageController@setLanguage');
Route::post('getLanguage','LanguageController@getLanguage');

Route::get('admin/tag_translations', 'API\Admin\TagTranslationAPIController@index')->middleware('auth:api');
Route::get('admin/tag_translations', 'API\Admin\TagTranslationAPIController@index')->middleware('auth:api');

/* Mostrar los detalles del usuario */
Route::post('show/user/details/{user}', 'API\Admin\UserAPIController@showUserDetails')->middleware('auth:api');
/* Editar los datos del usuario */
Route::post('update/user', 'API\Admin\UserAPIController@updateProfile');
Route::post('profile/{user}', 'API\Admin\UserAPIController@updateProfile');
/* Eliminar los datos del usuario */
Route::get('delete/user/{user}', 'API\Admin\UserAPIController@dropOutUser')->middleware('auth:api');
Route::post('delete/user/', 'API\Admin\UserAPIController@dropOutUser')->middleware('auth:api');
/* Cambio de password */
Route::post('change/password', 'API\Admin\UserAPIController@changePassword')->middleware('auth:api');


Route::post('contactus', 'API\UtilsAPIFrontController@contactUs');
Route::post('newsletter', 'API\UtilsAPIFrontController@newsLetter');
Route::get('unsubscribe/newsletter/{user}', 'API\UtilsAPIFrontController@unsubscribeNewsletter');



// Route::post('login', 'Auth\LoginController@login');
// Route::post('logout', 'Auth\LoginController@logout');
Route::post('forgotPassword','Auth\ForgotPasswordController@forgotPassword');
// Route::post('register', 'Auth\RegisterController@register');
Route::post('password/reset','Auth\ResetPasswordController@resetFront');


// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });


// // ProductCategory
// Route::get('admin/product_categories', 'API\Admin\ProductCategoryAPIController@index');
// Route::post('admin/product_categories', 'API\Admin\ProductCategoryAPIController@store')->middleware('auth');
// Route::get('admin/product_categories/{product_categories}', 'API\Admin\ProductCategoryAPIController@show');
// Route::put('admin/product_categories/{product_categories}', 'API\Admin\ProductCategoryAPIController@update')->middleware('auth');
// Route::patch('admin/product_categories/{product_categories}', 'API\Admin\ProductCategoryAPIController@update')->middleware('auth');
// Route::delete('admin/product_categories/{product_categories}', 'API\Admin\ProductCategoryAPIController@destroy')->middleware('auth');

// // ProductSubcategory
// Route::get('admin/product_subcategories', 'API\Admin\ProductSubcategoryAPIController@index');
// Route::post('admin/product_subcategories', 'API\Admin\ProductSubcategoryAPIController@store')->middleware('auth');
// Route::get('admin/product_subcategories/{product_subcategories}', 'API\Admin\ProductSubcategoryAPIController@show');
// Route::put('admin/product_subcategories/{product_subcategories}', 'API\Admin\ProductSubcategoryAPIController@update')->middleware('auth');
// Route::patch('admin/product_subcategories/{product_subcategories}', 'API\Admin\ProductSubcategoryAPIController@update')->middleware('auth');
// Route::delete('admin/product_subcategories/{product_subcategories}', 'API\Admin\ProductSubcategoryAPIController@destroy')->middleware('auth');

// // Product
// Route::get('admin/products', 'API\Admin\ProductAPIController@index');
// Route::post('admin/products', 'API\Admin\ProductAPIController@store')->middleware('auth');
// Route::get('admin/products/{products}', 'API\Admin\ProductAPIController@show');
// Route::put('admin/products/{products}', 'API\Admin\ProductAPIController@update')->middleware('auth');
// Route::patch('admin/products/{products}', 'API\Admin\ProductAPIController@update')->middleware('auth');
// Route::delete('admin/products/{products}', 'API\Admin\ProductAPIController@destroy')->middleware('auth');

// // AdditionalCategory
// Route::get('admin/additional_categories', 'API\Admin\AdditionalCategoryAPIController@index');
// Route::post('admin/additional_categories', 'API\Admin\AdditionalCategoryAPIController@store');
// Route::get('admin/additional_categories/{additional_categories}', 'API\Admin\AdditionalCategoryAPIController@show');
// Route::put('admin/additional_categories/{additional_categories}', 'API\Admin\AdditionalCategoryAPIController@update');
// Route::patch('admin/additional_categories/{additional_categories}', 'API\Admin\AdditionalCategoryAPIController@update');
// Route::delete('admin/additional_categories/{additional_categories}', 'API\Admin\AdditionalCategoryAPIController@destroy');

// // ProductFeatureCategory
// Route::get('admin/product_feature_categories', 'API\Admin\ProductFeatureCategoryAPIController@index');
// Route::post('admin/product_feature_categories', 'API\Admin\ProductFeatureCategoryAPIController@store');
// Route::get('admin/product_feature_categories/{product_feature_categories}', 'API\Admin\ProductFeatureCategoryAPIController@show');
// Route::put('admin/product_feature_categories/{product_feature_categories}', 'API\Admin\ProductFeatureCategoryAPIController@update');
// Route::patch('admin/product_feature_categories/{product_feature_categories}', 'API\Admin\ProductFeatureCategoryAPIController@update');
// Route::delete('admin/product_feature_categories/{product_feature_categories}', 'API\Admin\ProductFeatureCategoryAPIController@destroy');

// // RUTA GENERAL QUE DEVUELVE: ProductCategory, ProductSubcategory, Product, AdditionalCategory, FeatureProduct
// Route::get('admin/catalog', 'API\Admin\ProductAPIController@catalog');

// // Product, AdditionalCategory, FeatureProduct
// Route::get('admin/products_general/{product_subcategory_id?}', 'API\Admin\ProductAPIController@productsGeneral');

// // SEARCH: Product, AdditionalCategory, FeatureProduct
// Route::get('admin/products_search/{word}', 'API\Admin\ProductAPIController@productsSearch');

// // Suggestions
// Route::get('admin/suggestions', 'API\Admin\ProductAPIController@suggestions');

// // Order
// Route::get('admin/orders/user/{user_id}', 'API\Admin\OrderAPIController@index')/*->middleware('auth:api')*/;
// Route::post('admin/orders', 'API\Admin\OrderAPIController@store')/*->middleware('auth')*/;
// Route::get('admin/orders/{orders}', 'API\Admin\OrderAPIController@show');
// Route::put('admin/orders/hide/{orders}', 'API\Admin\OrderAPIController@hide')/*->middleware('auth')*/;
// // Route::patch('admin/orders/{orders}', 'API\Admin\OrderAPIController@update')->middleware('auth');
// // Route::delete('admin/orders/{orders}', 'API\Admin\OrderAPIController@destroy')->middleware('auth');


// Room
Route::get('admin/rooms', 'API\Admin\RoomAPIController@index');
// Route::post('admin/rooms', 'API\Admin\RoomAPIController@store');
Route::get('admin/rooms/{rooms}', 'API\Admin\RoomAPIController@show');
// Route::put('admin/rooms/{rooms}', 'API\Admin\RoomAPIController@update');
// Route::patch('admin/rooms/{rooms}', 'API\Admin\RoomAPIController@update');
// Route::delete('admin/rooms/{rooms}', 'API\Admin\RoomAPIController@destroy');

// Booking
// Route::get('admin/bookings', 'API\Admin\BookingAPIController@index');
Route::post('admin/bookings', 'API\Admin\BookingAPIController@store');
Route::get('admin/bookings/{bookings}', 'API\Admin\BookingAPIController@show');
// Route::put('admin/bookings/{bookings}', 'API\Admin\BookingAPIController@update');
// Route::patch('admin/bookings/{bookings}', 'API\Admin\BookingAPIController@update');
// Route::delete('admin/bookings/{bookings}', 'API\Admin\BookingAPIController@destroy');


// Route::get('admin/blogs', 'API\Admin\BlogAPIController@index');
// Route::post('admin/blogs', 'API\Admin\BlogAPIController@store');
// Route::get('admin/blogs/{blogs}', 'API\Admin\BlogAPIController@show');
// Route::put('admin/blogs/{blogs}', 'API\Admin\BlogAPIController@update');
// Route::patch('admin/blogs/{blogs}', 'API\Admin\BlogAPIController@update');
// Route::delete('admin/blogs/{blogs}', 'API\Admin\BlogAPIController@destroy');


// Route::get('admin/activity_categories', 'API\Admin\ActivityCategoryAPIController@index');
// Route::post('admin/activity_categories', 'API\Admin\ActivityCategoryAPIController@store');
// Route::get('admin/activity_categories/{activity_categories}', 'API\Admin\ActivityCategoryAPIController@show');
// Route::put('admin/activity_categories/{activity_categories}', 'API\Admin\ActivityCategoryAPIController@update');
// Route::patch('admin/activity_categories/{activity_categories}', 'API\Admin\ActivityCategoryAPIController@update');
// Route::delete('admin/activity_categories/{activity_categories}', 'API\Admin\ActivityCategoryAPIController@destroy');


// Route::get('admin/activities', 'API\Admin\ActivityAPIController@index');
// Route::post('admin/activities', 'API\Admin\ActivityAPIController@store');
// Route::get('admin/activities/{activities}', 'API\Admin\ActivityAPIController@show');
// Route::put('admin/activities/{activities}', 'API\Admin\ActivityAPIController@update');
// Route::patch('admin/activities/{activities}', 'API\Admin\ActivityAPIController@update');
// Route::delete('admin/activities/{activities}', 'API\Admin\ActivityAPIController@destroy');




// Route::get('admin/brands', 'API\Admin\BrandAPIController@index');
// Route::post('admin/brands', 'API\Admin\BrandAPIController@store');
// Route::get('admin/brands/{brands}', 'API\Admin\BrandAPIController@show');
// Route::put('admin/brands/{brands}', 'API\Admin\BrandAPIController@update');
// Route::patch('admin/brands/{brands}', 'API\Admin\BrandAPIController@update');
// Route::delete('admin/brands/{brands}', 'API\Admin\BrandAPIController@destroy');



// Route::get('admin/product_presentations', 'API\Admin\ProductPresentationAPIController@index');
// Route::post('admin/product_presentations', 'API\Admin\ProductPresentationAPIController@store');
// Route::get('admin/product_presentations/{product_presentations}', 'API\Admin\ProductPresentationAPIController@show');
// Route::put('admin/product_presentations/{product_presentations}', 'API\Admin\ProductPresentationAPIController@update');
// Route::patch('admin/product_presentations/{product_presentations}', 'API\Admin\ProductPresentationAPIController@update');
// Route::delete('admin/product_presentations/{product_presentations}', 'API\Admin\ProductPresentationAPIController@destroy');


// Route::get('admin/order_details', 'API\Admin\OrderDetailAPIController@index');
// Route::post('admin/order_details', 'API\Admin\OrderDetailAPIController@store');
// Route::get('admin/order_details/{order_details}', 'API\Admin\OrderDetailAPIController@show');
// Route::put('admin/order_details/{order_details}', 'API\Admin\OrderDetailAPIController@update');
// Route::patch('admin/order_details/{order_details}', 'API\Admin\OrderDetailAPIController@update');
// Route::delete('admin/order_details/{order_details}', 'API\Admin\OrderDetailAPIController@destroy');


// Route::get('admin/room_categories', 'API\Admin\RoomCategoryAPIController@index');
// Route::post('admin/room_categories', 'API\Admin\RoomCategoryAPIController@store');
// Route::get('admin/room_categories/{room_categories}', 'API\Admin\RoomCategoryAPIController@show');
// Route::put('admin/room_categories/{room_categories}', 'API\Admin\RoomCategoryAPIController@update');
// Route::patch('admin/room_categories/{room_categories}', 'API\Admin\RoomCategoryAPIController@update');
// Route::delete('admin/room_categories/{room_categories}', 'API\Admin\RoomCategoryAPIController@destroy');


// Route::get('admin/room_seasons', 'API\Admin\RoomSeasonAPIController@index');
// Route::post('admin/room_seasons', 'API\Admin\RoomSeasonAPIController@store');
// Route::get('admin/room_seasons/{room_seasons}', 'API\Admin\RoomSeasonAPIController@show');
// Route::put('admin/room_seasons/{room_seasons}', 'API\Admin\RoomSeasonAPIController@update');
// Route::patch('admin/room_seasons/{room_seasons}', 'API\Admin\RoomSeasonAPIController@update');
// Route::delete('admin/room_seasons/{room_seasons}', 'API\Admin\RoomSeasonAPIController@destroy');


// Route::get('admin/service_categories', 'API\Admin\ServiceCategoryAPIController@index');
// Route::post('admin/service_categories', 'API\Admin\ServiceCategoryAPIController@store');
// Route::get('admin/service_categories/{service_categories}', 'API\Admin\ServiceCategoryAPIController@show');
// Route::put('admin/service_categories/{service_categories}', 'API\Admin\ServiceCategoryAPIController@update');
// Route::patch('admin/service_categories/{service_categories}', 'API\Admin\ServiceCategoryAPIController@update');
// Route::delete('admin/service_categories/{service_categories}', 'API\Admin\ServiceCategoryAPIController@destroy');


// Route::get('admin/services', 'API\Admin\ServiceAPIController@index');
// Route::post('admin/services', 'API\Admin\ServiceAPIController@store');
// Route::get('admin/services/{services}', 'API\Admin\ServiceAPIController@show');
// Route::put('admin/services/{services}', 'API\Admin\ServiceAPIController@update');
// Route::patch('admin/services/{services}', 'API\Admin\ServiceAPIController@update');
// Route::delete('admin/services/{services}', 'API\Admin\ServiceAPIController@destroy');


// Route::get('admin/event_categories', 'API\Admin\EventCategoryAPIController@index');
// Route::post('admin/event_categories', 'API\Admin\EventCategoryAPIController@store');
// Route::get('admin/event_categories/{event_categories}', 'API\Admin\EventCategoryAPIController@show');
// Route::put('admin/event_categories/{event_categories}', 'API\Admin\EventCategoryAPIController@update');
// Route::patch('admin/event_categories/{event_categories}', 'API\Admin\EventCategoryAPIController@update');
// Route::delete('admin/event_categories/{event_categories}', 'API\Admin\EventCategoryAPIController@destroy');


// Route::get('admin/booking_details', 'API\Admin\BookingDetailAPIController@index');
// Route::post('admin/booking_details', 'API\Admin\BookingDetailAPIController@store');
// Route::get('admin/booking_details/{booking_details}', 'API\Admin\BookingDetailAPIController@show');
// Route::put('admin/booking_details/{booking_details}', 'API\Admin\BookingDetailAPIController@update');
// Route::patch('admin/booking_details/{booking_details}', 'API\Admin\BookingDetailAPIController@update');
// Route::delete('admin/booking_details/{booking_details}', 'API\Admin\BookingDetailAPIController@destroy');


// Route::get('admin/newsletter_users', 'API\Admin\NewsletterUserAPIController@index');
// Route::post('admin/newsletter_users', 'API\Admin\NewsletterUserAPIController@store');
// Route::get('admin/newsletter_users/{newsletter_users}', 'API\Admin\NewsletterUserAPIController@show');
// Route::put('admin/newsletter_users/{newsletter_users}', 'API\Admin\NewsletterUserAPIController@update');
// Route::patch('admin/newsletter_users/{newsletter_users}', 'API\Admin\NewsletterUserAPIController@update');
// Route::delete('admin/newsletter_users/{newsletter_users}', 'API\Admin\NewsletterUserAPIController@destroy');


// Route::get('admin/multimedia', 'API\Admin\MultimediaAPIController@index');
// Route::post('admin/multimedia', 'API\Admin\MultimediaAPIController@store');
// Route::get('admin/multimedia/{multimedia}', 'API\Admin\MultimediaAPIController@show');
// Route::put('admin/multimedia/{multimedia}', 'API\Admin\MultimediaAPIController@update');
// Route::patch('admin/multimedia/{multimedia}', 'API\Admin\MultimediaAPIController@update');
// Route::delete('admin/multimedia/{multimedia}', 'API\Admin\MultimediaAPIController@destroy');


// Route::get('admin/seos', 'API\Admin\SeoAPIController@index');
// Route::post('admin/seos', 'API\Admin\SeoAPIController@store');
// Route::get('admin/seos/{seos}', 'API\Admin\SeoAPIController@show');
// Route::put('admin/seos/{seos}', 'API\Admin\SeoAPIController@update');
// Route::patch('admin/seos/{seos}', 'API\Admin\SeoAPIController@update');
// Route::delete('admin/seos/{seos}', 'API\Admin\SeoAPIController@destroy');


// Route::get('admin/tag_translations', 'API\Admin\TagTranslationAPIController@index');
// Route::post('admin/tag_translations', 'API\Admin\TagTranslationAPIController@store');
// Route::get('admin/tag_translations/{tag_translations}', 'API\Admin\TagTranslationAPIController@show');
// Route::put('admin/tag_translations/{tag_translations}', 'API\Admin\TagTranslationAPIController@update');
// Route::patch('admin/tag_translations/{tag_translations}', 'API\Admin\TagTranslationAPIController@update');
// Route::delete('admin/tag_translations/{tag_translations}', 'API\Admin\TagTranslationAPIController@destroy');


// Route::get('admin/client_requests', 'API\Admin\ClientRequestAPIController@index');
Route::post('admin/client_requests', 'API\Admin\ClientRequestAPIController@store');
// Route::get('admin/client_requests/{client_requests}', 'API\Admin\ClientRequestAPIController@show');
// Route::put('admin/client_requests/{client_requests}', 'API\Admin\ClientRequestAPIController@update');
// Route::patch('admin/client_requests/{client_requests}', 'API\Admin\ClientRequestAPIController@update');
// Route::delete('admin/client_requests/{client_requests}', 'API\Admin\ClientRequestAPIController@destroy');


// Route::get('admin/roles', 'API\Admin\RoleAPIController@index');
// Route::post('admin/roles', 'API\Admin\RoleAPIController@store');
// Route::get('admin/roles/{roles}', 'API\Admin\RoleAPIController@show');
// Route::put('admin/roles/{roles}', 'API\Admin\RoleAPIController@update');
// Route::patch('admin/roles/{roles}', 'API\Admin\RoleAPIController@update');
// Route::delete('admin/roles/{roles}', 'API\Admin\RoleAPIController@destroy');


// Route::get('admin/product_features', 'API\Admin\ProductFeatureAPIController@index');
// Route::post('admin/product_features', 'API\Admin\ProductFeatureAPIController@store');
// Route::get('admin/product_features/{product_features}', 'API\Admin\ProductFeatureAPIController@show');
// Route::put('admin/product_features/{product_features}', 'API\Admin\ProductFeatureAPIController@update');
// Route::patch('admin/product_features/{product_features}', 'API\Admin\ProductFeatureAPIController@update');
// Route::delete('admin/product_features/{product_features}', 'API\Admin\ProductFeatureAPIController@destroy');


Route::get('admin/request_categories', 'API\Admin\RequestCategoryAPIController@index');
Route::post('admin/request_categories', 'API\Admin\RequestCategoryAPIController@store');
Route::get('admin/request_categories/{request_categories}', 'API\Admin\RequestCategoryAPIController@show');
Route::put('admin/request_categories/{request_categories}', 'API\Admin\RequestCategoryAPIController@update');
Route::patch('admin/request_categories/{request_categories}', 'API\Admin\RequestCategoryAPIController@update');
Route::delete('admin/request_categories/{request_categories}', 'API\Admin\RequestCategoryAPIController@destroy');


Route::get('admin/form_datas', 'Admin\FormDataAPIController@index');
Route::post('admin/form_datas', 'Admin\FormDataAPIController@store');
Route::get('admin/form_datas/{form_datas}', 'Admin\FormDataAPIController@show');
Route::put('admin/form_datas/{form_datas}', 'Admin\FormDataAPIController@update');
Route::patch('admin/form_datas/{form_datas}', 'Admin\FormDataAPIController@update');
Route::delete('admin/form_datas/{form_datas}', 'Admin\FormDataAPIController@destroy');
