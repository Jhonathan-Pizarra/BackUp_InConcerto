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
    //LUGARES ALIMENTACION
    //GET
    Route::get('/feeding_places', 'FeedingPlaceController@index');
    //GET by ID
    Route::get('/feeding_places/{feeding_place}', 'FeedingPlaceController@show');
    //POST
    Route::post('/feeding_places', 'FeedingPlaceController@store');
    //PUT
    Route::put('/feeding_places/{feeding_place}', 'FeedingPlaceController@update');
    //DELETE
    Route::delete('/feeding_places/{feeding_place}', 'FeedingPlaceController@delete');

    //Etc...
});
