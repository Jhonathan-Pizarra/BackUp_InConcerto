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

    //ALIMENTACION
    //GET
    Route::get('/feeding_places/{feeding_place}/feedings', 'FeedsPlaceController@index');
    //GET by ID
    Route::get('/feeding_places/{feeding_place}/feedings/{feeding}', 'FeedsPlaceController@show');
    //POST
    Route::post('/feeding_places/{feeding_place}/feedings', 'FeedsPlaceController@store');
    //PUT
    Route::put('/feeding_places/{feeding_place}/feedings/{feeding}', 'FeedsPlaceController@update');
    //DELETE
    Route::delete('/feeding_places/{feeding_place}/feedings/{feeding}', 'FeedsPlaceController@delete');

  
    //TRANSPORT
    //GET
    Route::get('/transports', 'TransportController@index');
    //GET by ID
    Route::get('/transports/{transport}', 'TransportController@show');
    //POST
    Route::post('/transports', 'TransportController@store');
    //PUT
    Route::put('/transports/{transport}', 'TransportController@update');
    //DELETE
    Route::delete('/transports/{transport}', 'TransportController@delete');

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

    //FESTIVALES
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

     
    //*********************************TEST****************************************  
    //CONCIERTO_2
    //GET
    Route::get('/places/{place}/concerts', 'PlaceConcertController@index');
    //GET by ID
    Route::get('/places/{place}/concerts/{concert}', 'PlaceConcertController@show');
    //POST
    Route::post('/places/{place}/concerts', 'PlaceConcertController@store');
    //PUT
    Route::put('/places/{place}/concerts/{concert}', 'PlaceConcertController@update');
    //DELETE
    Route::delete('/places/{place}/concerts/{concert}', 'PlaceConcertController@delete');
  
    //CONCIERTO_3
    //GET
    Route::get('/festivals/{festival}/concerts', 'ConcertFestivalController@index');
    //GET by ID
    Route::get('/festivals/{festival}/concerts/{concert}', 'ConcertFestivalController@show');
    //POST
    Route::post('/festivals/{festival}/concerts', 'ConcertFestivalController@store');
    //PUT
    Route::put('/festivals/{festival}/concerts/{concert}', 'ConcertFestivalController@update');
    //DELETE
    Route::delete('/festivals/{festival}/concerts/{concert}', 'ConcertFestivalController@delete');

    //ENSAYO_2
    //GET
    Route::get('/festivals/{festival}/essays', 'EssayFestivalController@index');
    //GET by ID
    Route::get('/festivals/{festival}/essays/{essay}', 'EssayFestivalController@show');
    //POST
    Route::post('/festivals/{festival}/essays', 'EssayFestivalController@store');
    //PUT
    Route::put('/festivals/{festival}/essays/{essay}', 'EssayFestivalController@update');
    //DELETE
    Route::delete('/festivals/{festival}/essays/{essay}', 'EssayFestivalController@delete');

    //ACTIVIDADES FESTIVAL_2
    //GET
    Route::get('/festivals/{festival}/activityfestivals', 'ActivityController@index');
    //GET by ID
    Route::get('/festivals/{festival}/activityfestivals/{activityfestival}', 'ActivityController@show');
    //POST
    Route::post('/festivals/{festival}/activityfestivals', 'ActivityController@store');
    //PUT
    Route::put('/festivals/{festival}/activityfestivals/{activityfestival}', 'ActivityController@update');
    //DELETE
    Route::delete('/festivals/{festival}/activityfestivals/{activityfestival}', 'ActivityController@delete');
    
  
    //ACTIVIDADES FESTIVAL_3
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
  
    //ALIMENTACION_2
    //GET
    Route::get('/artists/{artist}/feedings', 'ArtistFeedingController@index');
    //GET by ID
    Route::get('/artists/{artist}/feedings/{feeding}', 'ArtistFeedingController@show');
    //POST
    Route::post('/artists/{artist}/feedings', 'ArtistFeedingController@store');
    //PUT
    Route::put('/artists/{artist}/feedings/{feeding}', 'ArtistFeedingController@update');
    //DELETE
    Route::delete('/artists/{artist}/feedings/{feeding}', 'ArtistFeedingController@delete');
  
   //ALIMENTACION_3
    //GET
    Route::get('/users/{user}/feedings', 'UserFeedingController@index');
    //GET by ID
    Route::get('/users/{user}/feedings/{feeding}', 'UserFeedingController@show');
    //POST
    Route::post('/users/{user}/feedings', 'UserFeedingController@store');
    //PUT
    Route::put('/users/{user}/feedings/{feeding}', 'UserFeedingController@update');
    //DELETE
    Route::delete('/users/{user}/feedings/{feeding}', 'UserFeedingController@delete');


});

