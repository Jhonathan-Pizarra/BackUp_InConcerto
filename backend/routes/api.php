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

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});
//Rutas públicas
Route::post('register', 'UserController@register');
Route::post('login', 'UserController@authenticate');
//Route::get('festivals', 'FestivalController@index');

//Rutas protegidas o privadas
Route::group(['middleware' => ['jwt.verify']], function () {
    Route::get('user', 'UserController@getAuthenticatedUser');
    Route::post('logout', 'UserController@logout');

    //Bandas
        //GET, POST, PUT , DELETE
    //CALENDARIO
    //GET
    Route::get('/calendars', 'CalendarController@index');
    //GET by ID
    Route::get('/calendars/{calendar}', 'CalendarController@show');
    //POST
    Route::post('/calendars', 'CalendarController@store');
    //PUT
    Route::put('/calendars/{calendar}', 'CalendarController@update');
    //DELETE
    Route::delete('/calendars/{calendar}', 'CalendarController@delete');

    //Etc...
});
