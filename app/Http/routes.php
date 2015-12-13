<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',

]);
/*
Route::group(['prefix' => 'api'], function()
{
    //Route::resource('room_type', 'RoomTypeController');
    Route::resource('client','ClientController');

});
*/
Route::resource('DashBoard','DashboardController');
Entrust::routeNeedsRole('DashBoard', 'owner',Redirect::to('client'));


Route::resource('superadmin','SuperAdminController');
Entrust::routeNeedsRole('superadmin', 'owner',Redirect::to('client'));

Route::resource('client','ClientController');
Route::get('client/{client}','ClientController@destroy');

Route::resource('moniteur','MoniteurController');
Route::get('moniteur/{moniteur}','MoniteurController@destroy');

Route::resource('vehicules','VehiculesController');
Route::get('vehicules/{vehicules}','VehiculesController@destroy');
Route::post('vehicules/getnotification','VehiculesController@getnotification');

Route::resource('autoecole','AutoecoleController');
Route::get('autoecole/{autoecole}','AutoecoleController@destroy');


Route::resource('examen','ExamenController');
Route::get('examen/{examen}','ExamenController@destroy');
Route::post('examen/addexamen','ExamenController@addexamen');
Route:post('examen/getexamen','ExamenController@getexamen');
Route::post('examen/getcondidatsexamen','ExamenController@getcondidatsexamen');

Route::resource('cours','CoursController');
Route::get('cours/{cours}','CoursController@destroy');
Route::post('cours/send','CoursController@send');
Route::post('cours/getevent','CoursController@fullcalanderevent');
Route::post('cours/getcondidat','CoursController@getCondidat');













