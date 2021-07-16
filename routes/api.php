<?php

//Controladores, rutas anidadas
use App\Http\Controllers\UserActivityController;
use App\Http\Controllers\UserCalendarController;
use App\Http\Controllers\UserFeedingController;
use App\Http\Controllers\UserLodgingController;
use App\Http\Controllers\ActivityController;
use App\Http\Controllers\ArtistCalendarController;
use App\Http\Controllers\ArtistConcertController;
use App\Http\Controllers\ArtistFeedingController;
use App\Http\Controllers\ArtistLodgingController;
use App\Http\Controllers\CalendarTransportController;
use App\Http\Controllers\ConcertFestivalController;
use App\Http\Controllers\ConcertResourceController;
use App\Http\Controllers\EssayFestivalController;
use App\Http\Controllers\FeedsPlaceController;
use App\Http\Controllers\PlaceConcertController;
//Controladores rutas
use App\Http\Controllers\ActivityFestivalController;
use App\Http\Controllers\CalendarController;
use App\Http\Controllers\EssayController;
use App\Http\Controllers\LodgingController;
use App\Http\Controllers\PlaceController;
use App\Http\Controllers\ResourceController;
use App\Http\Controllers\TransportController;
use App\Http\Controllers\FeedingController;
use App\Http\Controllers\FeedingPlaceController;
use App\Http\Controllers\ArtistController;
use App\Http\Controllers\ConcertController;
use App\Http\Controllers\FestivalController;
use App\Http\Controllers\UserController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
Route::post('register', [UserController::class,'register']);
Route::post('login', [UserController::class,'authenticate']);
Route::get('/festivals', [FestivalController::class, 'index']);
//Route::get('/concerts', [ConcertController::class, 'index']);

//Rutas protegidas o privadas
Route::group(['middleware' => ['jwt.verify']], function () {
    Route::get('user', [UserController::class, 'getAuthenticatedUser']);
    Route::post('logout', [UserController::class, 'logout']);

    //USERS
    Route::get('/users',[UserController::class,'index']);
    Route::get('/users/{user}',[UserController::class,'show']);

    //FESTIVALES
    //GET
    //Route::get('/festivals', [FestivalController::class, 'index']);
    //GET by ID
    Route::get('/festivals/{festival}', [FestivalController::class, 'show']);
    //POST
    Route::post('/festivals', [FestivalController::class, 'store']);
    //PUT
    Route::put('/festivals/{festival}', [FestivalController::class, 'update']);
    //DELETE
    Route::delete('/festivals/{festival}', [FestivalController::class, 'delete']);

    //CONCIERTO
    //GET
    Route::get('/concerts', [ConcertController::class, 'index']);
    //GET by ID
    Route::get('/concerts/{concert}', [ConcertController::class, 'show']);
    //POST
    Route::post('/concerts', [ConcertController::class, 'store']);
    //PUT
    Route::put('/concerts/{concert}', [ConcertController::class, 'update']);
    //DELETE
    Route::delete('/concerts/{concert}', [ConcertController::class, 'delete']);

    //ENSAYO
    //GET
    Route::get('/essays', [EssayController::class, 'index']);
    //GET by ID
    Route::get('/essays/{essay}', [EssayController::class, 'show']);
    //POST
    Route::post('/essays', [EssayController::class, 'store']);
    //PUT
    Route::put('/essays/{essay}', [EssayController::class, 'update']);
    //DELETE
    Route::delete('/essays/{essay}', [EssayController::class, 'delete']);

    //ARTISTS
    //GET
    Route::get('/artists', [ArtistController::class, 'index']);
    //GET by ID
    Route::get('/artists/{artist}', [ArtistController::class, 'show']);
    //POST
    Route::post('/artists', [ArtistController::class, 'store']);
    //PUT
    Route::put('/artists/{artist}', [ArtistController::class, 'update']);
    //DELETE
    Route::delete('/artists/{artist}', [ArtistController::class, 'delete']);

    //PLACECONCERT
    //GET
    Route::get('/places', [PlaceController::class, 'index']);
    //GET by ID
    Route::get('/places/{place}', [PlaceController::class, 'show']);
    //POST
    Route::post('/places', [PlaceController::class, 'store']);
    //PUT
    Route::put('/places/{place}', [PlaceController::class, 'update']);
    //DELETE
    Route::delete('/places/{place}', [PlaceController::class, 'delete']);

    //RECURSOS
    //GET
    Route::get('/resources', [ResourceController::class, 'index']);
    //GET by ID
    Route::get('/resources/{resource}', [ResourceController::class, 'show']);
    //POST
    Route::post('/resources', [ResourceController::class, 'store']);
    //PUT
    Route::put('/resources/{resource}', [ResourceController::class, 'update']);
    //DELETE
    Route::delete('/resources/{resource}', [ResourceController::class, 'delete']);

    //ALIMENTACION
    //GET
    Route::get('/feedings', [FeedingController::class, 'index']);
    //GET by ID
    Route::get('/feedings/{feeding}', [FeedingController::class, 'show']);
    //POST
    Route::post('/feedings', [FeedingController::class, 'store']);
    //PUT
    Route::put('/feedings/{feeding}', [FeedingController::class, 'update']);
    //DELETE
    Route::delete('/feedings/{feeding}', [FeedingController::class, 'delete']);

    //LUGARES ALIMENTACION
    //GET
    Route::get('/feeding_places', [FeedingPlaceController::class, 'index']);
    //GET by ID
    Route::get('/feeding_places/{feeding_place}', [FeedingPlaceController::class, 'show']);
    //POST
    Route::post('/feeding_places', [FeedingPlaceController::class, 'store']);
    //PUT
    Route::put('/feeding_places/{feeding_place}', [FeedingPlaceController::class, 'update']);
    //DELETE
    Route::delete('/feeding_places/{feeding_place}', [FeedingPlaceController::class, 'delete']);

    //CALENDARIO
    //GET
    Route::get('/calendars', [CalendarController::class, 'index']);
    //GET by ID
    Route::get('/calendars/{calendar}', [CalendarController::class, 'show']);
    //POST
    Route::post('/calendars', [CalendarController::class, 'store']);
    //PUT
    Route::put('/calendars/{calendar}', [CalendarController::class, 'update']);
    //DELETE
    Route::delete('/calendars/{calendar}', [CalendarController::class, 'delete']);

    //TRANSPORT
    //GET
    Route::get('/transports', [TransportController::class, 'index']);
    //GET by ID
    Route::get('/transports/{transport}', [TransportController::class, 'show']);
    //POST
    Route::post('/transports', [TransportController::class, 'store']);
    //PUT
    Route::put('/transports/{transport}', [TransportController::class, 'update']);
    //DELETE
    Route::delete('/transports/{transport}', [TransportController::class, 'delete']);

    //HOSPEDAJE
    //GET
    Route::get('/lodgings', [LodgingController::class, 'index']);
    //GET by ID
    Route::get('/lodgings/{lodging}', [LodgingController::class, 'show']);
    //POST
    Route::post('/lodgings', [LodgingController::class, 'store']);
    //PUT
    Route::put('/lodgings/{lodging}', [LodgingController::class, 'update']);
    //DELETE
    Route::delete('/lodgings/{lodging}', [LodgingController::class, 'delete']);

    //ACTIVIDADES FESTIVAL
    //GET
    Route::get('/activityfestivals', [ActivityFestivalController::class, 'index']);
    //GET by ID
    Route::get('/activityfestivals/{activityfestival}', [ActivityFestivalController::class, 'show']);
    //POST
    Route::post('/activityfestivals', [ActivityFestivalController::class, 'store']);
    //PUT
    Route::put('/activityfestivals/{activityfestival}', [ActivityFestivalController::class, 'update']);
    //DELETE
    Route::delete('/activityfestivals/{activityfestival}', [ActivityFestivalController::class, 'delete']);

    //Nota: http://localhost:8000/api/user  solo me devolverá el usuario actual
    //http://localhost:8000/api/users no me devolverá nada. (Pero debería hacerlo para un superuser)

    //*********************************RUTAS ANIDADAS****************************************
    //CONCIERTO_2: http://localhost:8000/api/places/5/concerts
    //GET
    Route::get('/places/{place}/concerts', [PlaceConcertController::class, 'index']);
    //GET by ID
    Route::get('/places/{place}/concerts/{concert}', [PlaceConcertController::class, 'show']);
    //POST
    Route::post('/places/{place}/concerts', [PlaceConcertController::class, 'store']);
    //PUT
    Route::put('/places/{place}/concerts/{concert}', [PlaceConcertController::class, 'update']);
    //DELETE
    Route::delete('/places/{place}/concerts/{concert}', [PlaceConcertController::class, 'delete']);

    //CONCIERTO_3: http://localhost:8000/api/festivals/5/concerts
    //GET
    Route::get('/festivals/{festival}/concerts', [ConcertFestivalController::class, 'index']);
    //GET by ID
    Route::get('/festivals/{festival}/concerts/{concert}', [ConcertFestivalController::class, 'show']);
    //POST
    Route::post('/festivals/{festival}/concerts', [ConcertFestivalController::class, 'store']);
    //PUT
    Route::put('/festivals/{festival}/concerts/{concert}', [ConcertFestivalController::class, 'update']);
    //DELETE
    Route::delete('/festivals/{festival}/concerts/{concert}', [ConcertFestivalController::class, 'delete']);

    //ENSAYO_2: http://localhost:8000/api/festivals/5/essays
    //GET
    Route::get('/festivals/{festival}/essays', [EssayFestivalController::class, 'index']);
    //GET by ID
    Route::get('/festivals/{festival}/essays/{essay}', [EssayFestivalController::class, 'show']);
    //POST
    Route::post('/festivals/{festival}/essays', [EssayFestivalController::class, 'store']);
    //PUT
    Route::put('/festivals/{festival}/essays/{essay}', [EssayFestivalController::class, 'update']);
    //DELETE
    Route::delete('/festivals/{festival}/essays/{essay}', [EssayFestivalController::class, 'delete']);

    //ACTIVIDADES FESTIVAL_2: http://localhost:8000/api/festivals/5/activityfestivals
    //GET
    Route::get('/festivals/{festival}/activityfestivals', [ActivityController::class, 'index']);
    //GET by ID
    Route::get('/festivals/{festival}/activityfestivals/{activityfestival}', [ActivityController::class, 'show']);
    //POST
    Route::post('/festivals/{festival}/activityfestivals', [ActivityController::class, 'store']);
    //PUT
    Route::put('/festivals/{festival}/activityfestivals/{activityfestival}', [ActivityController::class, 'update']);
    //DELETE
    Route::delete('/festivals/{festival}/activityfestivals/{activityfestival}', [ActivityController::class, 'delete']);


    //ACTIVIDADES FESTIVAL_3: http://localhost:8000/api/users/1/activityfestivals
    //GET
    Route::get('/users/{user}/activityfestivals', [UserActivityController::class, 'index']);
    //GET by ID
    Route::get('/users/{user}/activityfestivals/{activityfestival}', [UserActivityController::class, 'show']);
    //POST
    Route::post('/users/{user}/activityfestivals', [UserActivityController::class, 'store']);
    //PUT
    Route::put('/users/{user}/activityfestivals/{activityfestival}', [UserActivityController::class, 'update']);
    //DELETE
    Route::delete('/users/{user}/activityfestivals/{activityfestival}', [UserActivityController::class, 'delete']);

    //ALIMENTACION_2: http://localhost:8000/api/artists/7/feedings
    //GET
    Route::get('/artists/{artist}/feedings', [ArtistFeedingController::class, 'index']);
    //GET by ID
    Route::get('/artists/{artist}/feedings/{feeding}', [ArtistFeedingController::class, 'show']);
    //POST
    Route::post('/artists/{artist}/feedings', [ArtistFeedingController::class, 'store']);
    //PUT
    Route::put('/artists/{artist}/feedings/{feeding}', [ArtistFeedingController::class, 'update']);
    //DELETE
    Route::delete('/artists/{artist}/feedings/{feeding}', [ArtistFeedingController::class, 'delete']);

    //ALIMENTACION_3: http://localhost:8000/api/users/3/feedings
    //A pesar de estar logeado como user 1 puedo ver la info del user 3 y su feeding
    //GET
    Route::get('/users/{user}/feedings', [UserFeedingController::class, 'index']);
    //GET by ID
    Route::get('/users/{user}/feedings/{feeding}', [UserFeedingController::class, 'show']);
    //POST
    Route::post('/users/{user}/feedings', [UserFeedingController::class, 'store']);
    //PUT
    Route::put('/users/{user}/feedings/{feeding}', [UserFeedingController::class, 'update']);
    //DELETE
    Route::delete('/users/{user}/feedings/{feeding}', [UserFeedingController::class, 'delete']);

    //ALIMENTACION_4: http://localhost:8000/api/feeding_places/1/feedings
    //GET
    Route::get('/feeding_places/{feeding_place}/feedings', [FeedsPlaceController::class, 'index']);
    //GET by ID
    Route::get('/feeding_places/{feeding_place}/feedings/{feeding}', [FeedsPlaceController::class, 'show']);
    //POST
    Route::post('/feeding_places/{feeding_place}/feedings', [FeedsPlaceController::class, 'store']);
    //PUT
    Route::put('/feeding_places/{feeding_place}/feedings/{feeding}', [FeedsPlaceController::class, 'update']);
    //DELETE
    Route::delete('/feeding_places/{feeding_place}/feedings/{feeding}', [FeedsPlaceController::class, 'delete']);

    //TRANPSORT_2: http://localhost:8000/api/calendars/3/transports
    //GET
    Route::get('/calendars/{calendar}/transports', [CalendarTransportController::class, 'index']);
    //GET by ID
    Route::get('/calendars/{calendar}/transports/{transport}', [CalendarTransportController::class, 'show']);
    //POST
    Route::post('/calendars/{calendar}/transports', [CalendarTransportController::class, 'store']);
    //PUT
    Route::put('/calendars/{calendar}/transports/{transport}', [CalendarTransportController::class, 'update']);
    //DELETE
    Route::delete('/calendars/{calendar}/transports/{transport}', [CalendarTransportController::class, 'delete']);

    //RESOURCES_2: http://localhost:8000/api/concerts/2/resources/2
    //GET
    Route::get('/concerts/{concert}/resources', [ConcertResourceController::class, 'index']);
    //GET by ID
    Route::get('/concerts/{concert}/resources/{resource}', [ConcertResourceController::class, 'show']);
    //POST
    Route::post('/concerts/{concert}/resources', [ConcertResourceController::class, 'store']);
    //PUT
    //Route::put('/concerts/{concert}/resources/{resource}', [ConcertResourceController::class, 'update']);
    //DELETE
    Route::delete('/concerts/{concert}/resources/{resource}', [ConcertResourceController::class, 'delete']);

    //ARTISTS_2: http://localhost:8000/api/concerts/1/artists
    //GET
    Route::get('/concerts/{concert}/artists', [ArtistConcertController::class, 'index']);
    //GET by ID
    Route::get('/concerts/{concert}/artists/{artist}', [ArtistConcertController::class, 'show']);
    //POST
    Route::post('/concerts/{concert}/artists', [ArtistConcertController::class, 'store']);
    //PUT
    //Route::put('/concerts/{concert}/artists/{artist}', [ArtistConcertController::class, 'update']);
    //DELETE
    Route::delete('/concerts/{concert}/artists/{artist}', [ArtistConcertController::class, 'delete']);

    //ARTISTS_3: http://localhost:8000/api/calendars/2/artists
    //GET
    Route::get('/calendars/{calendar}/artists', [ArtistCalendarController::class, 'index']);
    //GET by ID
    Route::get('/calendars/{calendar}/artists/{artist}', [ArtistCalendarController::class, 'show']);
    //POST
    Route::post('/calendars/{calendar}/artists', [ArtistCalendarController::class, 'store']);
    //PUT
    //Route::put('/calendars/{calendar}/artists/{artist}', [ArtistCalendarController::class, 'update']);
    //DELETE
    Route::delete('/calendars/{calendar}/artists/{artist}', [ArtistCalendarController::class, 'delete']);

    //USER_2: http://localhost:8000/api/calendars/1/users
    //GET
    Route::get('/calendars/{calendar}/users', [UserCalendarController::class, 'index']);
    //GET by ID
    Route::get('/calendars/{calendar}/users/{user}', [UserCalendarController::class, 'show']);
    //POST
    Route::post('/calendars/{calendar}/users', [UserCalendarController::class, 'store']);
    //PUT
    Route::put('/calendars/{calendar}/users/{user}', [UserCalendarController::class, 'update']);
    //DELETE
    Route::delete('/calendars/{calendar}/users/{user}', [UserCalendarController::class, 'delete']);

    //ARTISTS_4: http://localhost:8000/api/lodgings/1/artists
    //GET
    Route::get('/lodgings/{lodging}/artists', [ArtistLodgingController::class, 'index']);
    //GET by ID
    Route::get('/lodgings/{lodging}/artists/{artist}', [ArtistLodgingController::class, 'show']);
    //POST
    Route::post('/lodgings/{lodging}/artists', [ArtistLodgingController::class, 'store']);
    //PUT
    //Route::put('/lodgings/{lodging}/artists/{artist}', [ArtistLodgingController::class, 'update']);
    //DELETE
    Route::delete('/lodgings/{lodging}/artists/{artist}', [ArtistLodgingController::class, 'delete']);

    //USER_3: http://localhost:8000/api/lodgings/1/users
    //GET
    Route::get('/lodgings/{lodging}/users', [UserLodgingController::class, 'index']);
    //GET by ID
    Route::get('/lodgings/{lodging}/users/{user}', [UserLodgingController::class, 'show']);
    //POST
    Route::post('/lodgings/{lodging}/users', [UserLodgingController::class, 'store']);
    //PUT
    Route::put('/lodgings/{lodging}/users/{user}', [UserLodgingController::class, 'update']);
    //DELETE
    Route::delete('/lodgings/{lodging}/users/{user}', [UserLodgingController::class, 'delete']);


});


