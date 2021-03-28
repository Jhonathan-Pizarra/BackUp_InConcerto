<?php

namespace App\Http\Controllers;
use App\Festival;
use App\Concert;
use Illuminate\Http\Request;
use App\Http\Resources\Concert as ConcertFestRes;
use App\Http\Resources\ConcertCollection;

class ConcertFestivalController extends Controller
{
    private static $messages = [
        'required' => 'El campo :attribute es obligatorio.',
    ];

    public function index(Festival $festival){
        return response()->json(ConcertFestRes::collection($festival->concerts),200);
    }

    public function show(Festival $festival, Concert $concert){
        $concert = $festival->concerts()->where('id', $concert->id)->firstOrFail();
        return response()->json($concert, 200);
    }

    public function store(Request $request, Festival $festival){

        $request->validate([
            'dateConcert' => 'required|date',
            'name' => 'required|string|max:255',
            'duration' => 'required|string',
            'free' => 'required',
            'insitu' => 'required',
            'festival_id' => 'required|exists:festivals,id',
            'place_id' => 'required|exists:places,id'
        ], self::$messages);

        $concert = $festival->concerts()->save(new Concert($request->all()));
        return response()->json($concert, 201);
    }

    public function update(Request $request, Festival $festival, Concert $concert){

        $request->validate([
            'dateConcert' => 'required|date',
            'name' => 'required|string|max:255',
            'duration' => 'required|string',
            'free' => 'required',
            'insitu' => 'required',
            'festival_id' => 'required|exists:festivals,id',
            'place_id' => 'required|exists:places,id'
        ], self::$messages);

        $concert = $festival->concerts()->where('id', $concert->id)->firstOrFail();
        $concert -> update($request->all());
        return response() -> json($concert, 200); //codigo 200 correspodnde a modificacion exitosa
    }

    public function delete(Request $request, Festival $festival, Concert $concert){
        $concert = $festival->concerts()->where('id', $concert->id)->firstOrFail();
        $concert -> delete();
        return response() -> json(null, 404); //codigo 204 correspodnde a not found
    }

}
