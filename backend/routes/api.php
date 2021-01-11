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


//Rutas públicas
Route::post('register', 'UserController@register');
Route::post('login', 'UserController@authenticate');
//Route::get('festivals', 'FestivalController@index');


//Rutas protegidas o privadas
Route::group(['middleware' => ['jwt.verify']], function () {
    Route::get('user', 'UserController@getAuthenticatedUser');
    Route::post('logout', 'UserController@logout');

    //FESTIVAL
    //GET
    Route::get('/festivals', 'FestivalController@index');
    //GET by ID
    Route::get('/festivals/{festival}', 'FestivalController@show');
    //POST
    Route::post('/festivals', 'FestivalController@store');
    //PUT
    Route::put('/festivals/{festival}', 'FestivalController@update');
    //DELETE
    Route::delete('/festivals/{festival}', 'FestivalController@delete');

});
/*
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user(); //la flecha es para acceder a la propiedad de algún objeto
});
*/
