<?php

namespace App\Http\Controllers;

use App\Models\Concert;
use App\Models\Place;
use Illuminate\Http\Request;
use App\Http\Resources\Concert as ConcertRes;
use App\Http\Resources\ConcertCollection;

class PlaceConcertController extends Controller
{
    private static $messages = [
        'required' => 'El campo :attribute es obligatorio.',
    ];

    public function index(Place $place){
        return response()->json(ConcertRes::collection($place->concerts),200);
    }

    public function show(Place $place, Concert $concert){
        $concert = $place->concerts()->where('id', $concert->id)->firstOrFail();
        return response()->json($concert, 200);
    }

    public function store(Request $request, Place $place){

        $request->validate([
            'dateConcert' => 'required|date',
            'name' => 'required|string|max:255',
            'duration' => 'required|string',
            'free' => 'required',
            'insitu' => 'required',
            'festival_id' => 'required|exists:festivals,id',
            'place_id' => 'required|exists:places,id'
        ], self::$messages);

        $concert = $place->concerts()->save(new Concert($request->all()));
        return response()->json($concert, 201);
    }

    public function update(Request $request, Place $place, Concert $concert){

        $request->validate([
            'dateConcert' => 'required|date',
            'name' => 'required|string|max:255',
            'duration' => 'required|string',
            'free' => 'required',
            'insitu' => 'required',
            'festival_id' => 'required|exists:festivals,id',
            'place_id' => 'required|exists:places,id'
        ], self::$messages);

        $concert = $place->concerts()->where('id', $concert->id)->firstOrFail();
        $concert -> update($request->all());
        return response() -> json($concert, 200); //codigo 200 correspodnde a modificacion exitosa
    }

    public function delete(Request $request, Place $place, Concert $concert){
        $concert = $place->concerts()->where('id', $concert->id)->firstOrFail();
        $concert -> delete();
        return response() -> json(null, 204); //codigo 204 correspodnde a not found
    }

}
