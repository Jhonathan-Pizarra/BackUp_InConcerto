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

    //HOSPEDAJE
    //GET
    Route::get('/lodgings', 'LodgingController@index');
    //GET by ID
    Route::get('/lodgings/{lodging}', 'LodgingController@show');
    //POST
    Route::post('/lodgings', 'LodgingController@store');
    //PUT
    Route::put('/lodgings/{lodging}', 'LodgingController@update');
    //DELETE
    Route::delete('/lodgings/{lodging}', 'LodgingController@delete');

    //ACTIVIDADES FESTIVAL
    //GET
    Route::get('/activityfestivals', 'ActivityFestivalController@index');
    //GET by ID
    Route::get('/activityfestivals/{activityfestival}', 'ActivityFestivalController@show');
    //POST
    Route::post('/activityfestivals', 'ActivityFestivalController@store');
    //PUT
    Route::put('/activityfestivals/{activityfestival}', 'ActivityFestivalController@update');
    //DELETE
    Route::delete('/activityfestivals/{activityfestival}', 'ActivityFestivalController@delete');

    //PLACECONCERT
    //GET
    Route::get('/places', 'PlaceController@index');
    //GET by ID
    Route::get('/places/{place}', 'PlaceController@show');
    //POST
    Route::post('/places', 'PlaceController@store');
    //PUT
    Route::put('/places/{place}', 'PlaceController@update');
    //DELETE
    Route::delete('/places/{place}', 'PlaceController@delete');
  
    //ARTISTS
    //GET
    Route::get('/artists', 'ArtistController@index');
    //GET by ID
    Route::get('/artists/{artist}', 'ArtistController@show');
    //POST
    Route::post('/artists', 'ArtistController@store');
    //PUT
    Route::put('/artists/{artist}', 'ArtistController@update');
    //DELETE
    Route::delete('/artists/{artist}', 'ArtistController@delete');

    //RECURSOS
    //GET
    Route::get('/resources', 'ResourceController@index');
    //GET by ID
    Route::get('/resources/{resource}', 'ResourceController@show');
    //POST
    Route::post('/resources', 'ResourceController@store');
    //PUT
    Route::put('/resources/{resource}', 'ResourceController@update');
    //DELETE
    Route::delete('/resources/{resource}', 'ResourceController@delete');

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
  
    //ENSAYO
    //GET
    Route::get('/essays', 'EssayController@index');
    //GET by ID
    Route::get('/essays/{essay}', 'EssayController@show');
    //POST
    Route::post('/essays', 'EssayController@store');
    //PUT
    Route::put('/essays/{essay}', 'EssayController@update');
    //DELETE
    Route::delete('/essays/{essay}', 'EssayController@delete');

    //CONCIERTO
    //GET
    Route::get('/concerts', 'ConcertController@index');
    //GET by ID
    Route::get('/concerts/{concert}', 'ConcertController@show');
    //POST
    Route::post('/concerts', 'ConcertController@store');
    //PUT
    Route::put('/concerts/{concert}', 'ConcertController@update');
    //DELETE
    Route::delete('/concerts/{concert}', 'ConcertController@delete');


});

