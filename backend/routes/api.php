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
    //ACTIVIDADES FESTIVAL
    //GET
    Route::get('/users/{user}/activityfestivals', 'UserActivityController@index');
    //GET by ID
    Route::get('/users/{user}/activityfestivals/{activityfestival}', 'UserActivityController@show');
    //POST
    Route::post('/users/{user}/activityfestivals', 'UserActivityController@store');
    //PUT
    Route::put('/users/{user}/activityfestivals/{activityfestival}', 'UserActivityController@update');
    //DELETE
    Route::delete('/users/{user}/activityfestivals/{activityfestival}', 'UserActivityController@delete');

    //Etc...
});
