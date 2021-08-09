<?php

namespace App\Http\Controllers;

use App\Http\Resources\ArtistCollection;
use App\Http\Resources\CalendarCollection;
use App\Models\Artist;
use App\Models\Calendar;
use Illuminate\Http\Request;

class CalendarArtistController extends Controller
{
    private static $messages = [
        'required' => 'El campo :attribute es obligatorio.'
    ];

    public function index(Artist $artist){
        //return response()->json(ArtistCalRes::collection($calendar->artists),200);
        return response()->json(new CalendarCollection($artist->calendars),200);  //no data + metadata
    }

    /*public function show(Artist $artist, Calendar $calendar){
        $artistCalendar = $artist->calendars()->where('calendar_id', $calendar->id)->firstOrFail();
        return response()->json($artistCalendar, 200);
    }*/
    public function show(Calendar $calendar, Artist $artist){
        $calendarArtist = $calendar->artists()->where('id', $artist->id)->firstOrFail();
        return response()->json($calendarArtist, 200);
    }

    public function store(Request $request, Artist $artist){

        $request->validate([
            'artist_id' => 'exists:artists,id',
            'calendar_id' => 'exists:calendars,id',
        ], self::$messages);

        $artist = Artist::findOrFail($request->artist_id);
        $artist->calendars()->attach($request->calendar_id);
        return response()->json($artist->calendars, 201);

    }

    /*
    public function update(Request $request, Calendar $calendar, Artist $artist){

        $request->validate([
            'artist_id' => 'exists:artists,id',
            'calendar_id' => 'exists:calendars,id',
        ], self::$messages);

        $artist = $calendar->artists()->where('id', $artist->id)->firstOrFail();
        $artist -> update($request->all());
        return response() -> json($artist, 200); //codigo 200 correspodnde a modificacion exitosa
    }
    */

    public function delete(Request $request, Artist $artist, Calendar $calendar){

        $artist = Artist::findOrFail($artist->id);
        $artist->calendars()->detach($calendar->id);
        return response()->json(null, 204);

        /*
        $artist = $calendar->artists()->where('id', $artist->id)->firstOrFail();
        $artist -> delete();
        return response() -> json(null, 404); //codigo 204 correspodnde a not found
        */
    }
}
