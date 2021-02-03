<?php

namespace App\Http\Controllers;

use App\Artist;
use App\Calendar;
use App\Http\Resources\Artist as ArtistCalRes;
use App\Http\Resources\ArtistCollection;

use Illuminate\Http\Request;

class ArtistCalendarController extends Controller
{
    private static $messages = [
        'required' => 'El campo :attribute es obligatorio.',
        'ciOrPassport.unique' => 'CI o Pasaporte ya existe',
        'max' => 'Número de digitos excedidos',
        'mail.unique' => ':attribute ya existe',
        'email' => ':attribute no válido',
        'boolean' => ':attribute solo puede ser "true" o "false"',
        'numeric' => 'el campo :attribute debe ser un número'
    ];

    public function index(Calendar $calendar){
        return response()->json(ArtistCalRes::collection($calendar->artists),200);
    }

    public function show(Calendar $calendar, Artist $artist){
        $artist = $calendar->artists()->where('id', $artist->id)->firstOrFail();
        return response()->json($artist, 200);
    }

    public function store(Request $request, Calendar $calendar){

        $request->validate([
            'dateEssay' => 'required|date',
            'name' => 'required|string|max:255',
            'place' => 'required|string|max:255',
            'festival_id' => 'required|exists:festivals,id', //No disponible hasta que se fusione con la rama de relacion
        ], self::$messages);

        $artist = $calendar->artists()->save(new Artist($request->all()));
        return response()->json($artist, 201);
    }

    public function update(Request $request, Calendar $calendar, Artist $artist){

        $request->validate([
            'dateEssay' => 'required|date',
            'name' => 'required|string|max:255',
            'place' => 'required|string|max:255',
            'festival_id' => 'required|exists:festivals,id', //No disponible hasta que se fusione con la rama de relacion
        ], self::$messages);

        $artist = $calendar->artists()->where('id', $artist->id)->firstOrFail();
        $artist -> update($request->all());
        return response() -> json($artist, 200); //codigo 200 correspodnde a modificacion exitosa
    }

    public function delete(Request $request,  Calendar $calendar, Artist $artist){
        $artist = $calendar->artists()->where('id', $artist->id)->firstOrFail();
        $artist -> delete();
        return response() -> json(null, 404); //codigo 204 correspodnde a not found
    }

}
