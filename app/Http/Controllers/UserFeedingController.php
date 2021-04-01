<?php

namespace App\Http\Controllers;

use App\Models\Feeding;
use App\Models\User;
use App\Http\Resources\Feeding as FeedingUserRes;
use App\Http\Resources\FeedingCollection;
use Illuminate\Http\Request;

class UserFeedingController extends Controller
{
    private static $messages = [
        'required' => 'El campo :attribute es requerido.',
        'integer' => 'El campo :attribute debe ser un número entero.',
        'date' => 'El campo :attribute debe tener el formato YYYY-MM-DD'
    ];

    public function index(User $user){
        return response()->json(FeedingUserRes::collection($user->feedings),200);
    }

    public function show(User $user, Feeding $feeding){
        $feeding = $user->feedings()->where('id', $feeding->id)->firstOrFail();
        return response()->json($feeding, 200);
    }

    public function store(Request $request, User $user){

        $request->validate([
            'date' => 'required|date|max:255',
            'food' => 'required|string|max:255',
            'observation' => 'required|string',
            'quantityLunchs' =>'required|integer',
            'user_id' => 'required|exists:users,id',
            'artist_id' => 'required|exists:artists,id',
            'place_id' => 'required|exists:places,id',

        ], self::$messages);

        $feeding = $user->feedings()->save(new Feeding($request->all()));
        return response()->json($feeding, 201);
    }

    public function update(Request $request, User $user, Feeding $feeding){

        $request->validate([
            'date' => 'required|date|max:255',
            'food' => 'required|string|max:255',
            'observation' => 'required|string',
            'quantityLunchs' =>'required|integer',
            'user_id' => 'required|exists:users,id',
            'artist_id' => 'required|exists:artists,id',
            'place_id' => 'required|exists:places,id',

        ], self::$messages);

        $feeding = $user->feedings()->where('id', $feeding->id)->firstOrFail();
        $feeding -> update($request->all());
        return response() -> json($feeding, 200); //codigo 200 correspodnde a modificacion exitosa
    }

    public function delete(Request $request, User $user, Feeding $feeding){
        $feeding = $user->feedings()->where('id', $feeding->id)->firstOrFail();
        $feeding -> delete();
        return response() -> json(null, 404); //codigo 204 correspodnde a not found
    }

}
