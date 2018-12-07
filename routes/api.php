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
Route::post('get_env', 'API\ConfigAPIController@getEnv');

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


Route::post('forgotPassword','Auth\ForgotPasswordController@forgotPassword');
Route::post('password/reset','Auth\ResetPasswordController@resetFront');


// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });


//  ____
// |  _ \    ___     ___    _ __ ___    ___
// | |_) |  / _ \   / _ \  | '_ ` _ \  / __|
// |  _ <  | (_) | | (_) | | | | | | | \__ \
// |_| \_\  \___/   \___/  |_| |_| |_| |___/
//

// Room
Route::post('admin/rooms', 'API\Admin\RoomAPIController@index');// API Listado de ROOM (DISPONIBILIDAD)
Route::get('admin/rooms/{room}', 'API\Admin\RoomAPIController@show'); // API Obtener detalle de ROOM
Route::post('admin/rooms/lock', 'API\Admin\RoomAPIController@lock'); // API Bloquear temporalmente ROOM (BLOQUEO TEMPORAL)


// Booking
Route::get('admin/bookings/user/{user_id}', 'API\Admin\BookingAPIController@index');
Route::post('admin/bookings', 'API\Admin\BookingAPIController@store'); // (BOOKING)
Route::get('admin/bookings/{booking}', 'API\Admin\BookingAPIController@show');
Route::put('admin/bookings/hide/{booking}', 'API\Admin\BookingAPIController@hide');






// Route::get('admin/blogs', 'API\Admin\BlogAPIController@index');
// Route::post('admin/blogs', 'API\Admin\BlogAPIController@store');
// Route::get('admin/blogs/{blogs}', 'API\Admin\BlogAPIController@show');
// Route::put('admin/blogs/{blogs}', 'API\Admin\BlogAPIController@update');
// Route::patch('admin/blogs/{blogs}', 'API\Admin\BlogAPIController@update');
// Route::delete('admin/blogs/{blogs}', 'API\Admin\BlogAPIController@destroy');


 Route::get('admin/room_categories', 'API\Admin\RoomCategoryAPIController@index');
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


Route::get('admin/locked_rooms', 'Admin\LockedRoomAPIController@index');
Route::post('admin/locked_rooms', 'Admin\LockedRoomAPIController@store');
Route::get('admin/locked_rooms/{locked_rooms}', 'Admin\LockedRoomAPIController@show');
Route::put('admin/locked_rooms/{locked_rooms}', 'Admin\LockedRoomAPIController@update');
Route::patch('admin/locked_rooms/{locked_rooms}', 'Admin\LockedRoomAPIController@update');
Route::delete('admin/locked_rooms/{locked_rooms}', 'Admin\LockedRoomAPIController@destroy');


Route::get('admin/room_locations', 'API\Admin\RoomLocationAPIController@index');
Route::post('admin/room_locations', 'Admin\RoomLocationAPIController@store');
Route::get('admin/room_locations/{room_locations}', 'Admin\RoomLocationAPIController@show');
Route::put('admin/room_locations/{room_locations}', 'Admin\RoomLocationAPIController@update');
Route::patch('admin/room_locations/{room_locations}', 'Admin\RoomLocationAPIController@update');
Route::delete('admin/room_locations/{room_locations}', 'Admin\RoomLocationAPIController@destroy');



Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::group(['prefix' => 'auth'], function () {
    Route::post('login', 'API\Auth\AuthAPIController@login');
    Route::post('signup', 'API\Auth\AuthAPIController@signup');
    Route::get('signup/activate/{token}', 'API\Auth\AuthAPIController@signupActivate');

    Route::group(['middleware' => 'auth:api'], function() {
        Route::post('logout', 'API\Auth\AuthAPIController@logout');
        Route::get('user', 'API\Auth\AuthAPIController@user');
    });
});


Route::group(['namespace' => 'Auth', 'middleware' => 'auth:api', 'prefix' => 'password'], function () {
    /* Envia correo con el token para el cambio de clave */
    Route::post('send/reset', 'PasswordResetAPIController@create');
    Route::get('find/{token}', 'PasswordResetAPIController@find');
    Route::post('reset', 'PasswordResetAPIController@reset');
});