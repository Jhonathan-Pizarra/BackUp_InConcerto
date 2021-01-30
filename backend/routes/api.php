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
    //Recursos: conciertos/2/recursos/2
    Route::get('/concerts/{concert}/resources', 'ConcertController@index');
    //GET by ID
    Route::get('/concerts/{concert}/resources/{resource}', 'ConcertController@show');
    //POST
    Route::post('/concerts/{concert}/resources', 'ConcertController@store');
    //PUT
    Route::put('/resources/{resource}', 'ConcertController@update');
    //DELETE
    Route::delete('/concerts/{concert}/resources/{resource}', 'ConcertController@delete');

    //Etc...
});
