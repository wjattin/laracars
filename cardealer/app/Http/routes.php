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

//Dealers
Route::get('dealers', 'dealersController@dealers')->name('dealers');
Route::post('dealers', 'dealersController@new_dealer')->name('new_dealer');

//Profiles
Route::get('profiles', 'profilesController@profiles')->name('profiles');
Route::get('profiles/{id}', 'profilesController@getProfile')->name('getProfile');
Route::post('profiles', 'profilesController@new_profile')->name('new_profiles');
//Login
Route::post('createLogin', 'loginController@new_login')->name('new_login');

//Vehicles
Route::get('vehicles', 'vehiclesController@vehicles')->name('vehicles');
Route::get('vehicles/{id}/delete', 'vehiclesController@deleteVehicles')->name('deleteVehicles');
Route::post('vehicles', 'vehiclesController@new_vehicle')->name('new_vehicle');

//VehicleImages - All routes for manipulating images
Route::get('/vehicleImages/{vehicles_id}', ['uses' =>'vehicleImagesController@vehicleImages'])->name('vehicleImages');
    //Deletes all images
Route::get('/vehicleImages/{vehicles_id}/delete', ['uses' =>'vehicleImagesController@deleteImages'])->name('deleteImages');
    //Deletes a single image
Route::get('/vehicleImage/{id}/delete', ['uses' =>'vehicleImagesController@deleteImage'])->name('deleteImage');
Route::post('vehicleImages', 'vehicleImagesController@new_image')->name('new_images');

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

Route::group(['middleware' => ['web']], function () {
    //
});
