<?php

namespace App\Http\Controllers;

use App\Feeding;
use App\FeedingPlace;
use App\Http\Resources\Feeding as FeedsPlaceRes;
use App\Http\Resources\FeedingCollection;
use Illuminate\Http\Request;

class FeedsPlaceController extends Controller
{
    private static $messages = [
        'required' => 'El campo :attribute es requerido.',
        'integer' => 'El campo :attribute debe ser un número entero.',
        'date' => 'El campo :attribute debe tener el formato YYYY-MM-DD'
    ];

    public function index(FeedingPlace $feedingPlace){
        return response()->json(FeedsPlaceRes::collection($feedingPlace->feedings),200);
    }

    public function show(FeedingPlace $feedingPlace, Feeding $feeding){
        $feeding = $feedingPlace->feedings()->where('id', $feeding->id)->firstOrFail();
        return response()->json($feeding, 200);
    }

    public function store(Request $request, FeedingPlace $feedingPlace){

        $request->validate([
            'date' => 'required|date|max:255',
            'food' => 'required|string|max:255',
            'observation' => 'required|string',
            'quantityLunchs' =>'required|integer',
            'user_id' => 'required|exists:users,id',
            'artist_id' => 'required|exists:artists,id',
            'place_id' => 'required|exists:places,id',

        ], self::$messages);

        $feeding = $feedingPlace->feedings()->save(new Feeding($request->all()));
        return response()->json($feeding, 201);
    }

    public function update(Request $request, FeedingPlace $feedingPlace, Feeding $feeding){

        $request->validate([
            'date' => 'required|date|max:255',
            'food' => 'required|string|max:255',
            'observation' => 'required|string',
            'quantityLunchs' =>'required|integer',
            'user_id' => 'required|exists:users,id',
            'artist_id' => 'required|exists:artists,id',
            'place_id' => 'required|exists:places,id',

        ], self::$messages);

        $feeding = $feedingPlace->feedings()->where('id', $feeding->id)->firstOrFail();
        $feeding -> update($request->all());
        return response() -> json($feeding, 200); //codigo 200 correspodnde a modificacion exitosa

    }

    public function delete(Request $request, FeedingPlace $feedingPlace, Feeding $feeding){
        $feeding = $feedingPlace->feedings()->where('id', $feeding->id)->firstOrFail();
        $feeding -> delete();
        return response() -> json(null, 404); //codigo 204 correspodnde a not found
    }


}
