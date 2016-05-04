<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});




//Login
Route::post('createLogin', 'loginController@new_login')->name('new_login');
Route::get('vehiclesAPI', 'vehiclesController@vehiclesAPI')->name('vehiclesAPI');


/*
// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');
*/
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () { });
Route::group(['middleware' => ['auth']], function () {
//    Route::auth();

});

    Route::group(['middleware' => 'web'], function () {
    Route::auth();
        Route::get('/home', 'vehiclesController@myvehicles')->name('myvehicles');
        Route::get('/', 'vehiclesController@myvehicles')->name('myvehicles');
    //Dealers
    Route::get('dealers',  'dealersController@dealers')->name('dealers');
    Route::post('dealers', 'dealersController@new_dealer')->name('newDealer');
    //Vehicles
        Route::get('vehicles', 'vehiclesController@vehicles')->name('vehicles');
        Route::get('vehicles/search', 'vehiclesController@search')->name('search');
    Route::get('myvehicles', 'vehiclesController@myvehicles')->name('myvehicles');
    Route::get('vehicles/{id}/delete', 'vehiclesController@deleteVehicles')->name('deleteVehicles');
    Route::post('vehicles/update', 'vehiclesController@update_vehicle')->name('updateVehicles');
    Route::post('vehicles', 'vehiclesController@new_vehicle')->name('new_vehicle');
    Route::get('decodeVin/{vin}', 'vehiclesController@decodeVin')->name('decodeVin');

//VehicleImages - All routes for manipulating images
    Route::get('/vehicleImages/{vehicles_id}', ['uses' =>'vehicleImagesController@vehicleImages'])->name('vehicleImages');
    //Deletes all images
    Route::get('/vehicleImages/{vehicles_id}/delete', ['uses' =>'vehicleImagesController@deleteImages'])->name('deleteImages');
    //Deletes a single image
    Route::get('/vehicleImage/{id}/delete', ['uses' =>'vehicleImagesController@deleteImage'])->name('deleteImage');
    Route::post('vehicleImages', 'vehicleImagesController@new_image')->name('new_images');

    //Profiles
    Route::get('profiles', 'profilesController@profiles')->name('profiles');
    Route::get('profiles/{id}', 'profilesController@getProfile')->name('getProfile');
    Route::post('profiles', 'profilesController@new_profile')->name('new_profiles');

});
