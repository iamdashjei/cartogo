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

Route::group([
    'prefix' => 'auth'
], function () {
    Route::post('login', 'Auth\AuthController@login')->name('login');
    Route::post('register', 'Auth\AuthController@register');
    Route::group([
      'middleware' => 'auth:api'
    ], function() {
        Route::get('logout', 'Auth\AuthController@logout');
        Route::get('user', 'Auth\AuthController@user');
        // List Product 
        Route::get('list-product', 'ProductController@list_product');
        // Deduct Product
        Route::post('deduct-yakult-light', 'ProductController@deduct_yakult_light');
        Route::post('deduct-yakult', 'ProductController@deduct_yakult');

        // List Outlets
        Route::get('list-outlets', 'OutletProfileController@list_outlets');

        // List Booking by user
        Route::post('list-booking', 'BookingRouteController@get_booking_list_by_user');
    });
});
