<?php

namespace App\Http\Controllers;


use App\Http\Resources\LodgingCollection;
use App\Models\Lodging;
use App\Models\Artist;
use App\Models\User;
use Illuminate\Http\Request;

class LodgingArtistController extends Controller
{
    private static $messages = [
        'required' => 'El campo :attribute es obligatorio.',
    ];

    public function index(Artist $artist){
        return response()->json(new LodgingCollection($artist->lodgings),200);
    }

    public function show(Artist $artist, Lodging $lodging){
        $artistLodging = $artist->lodgings()->where('id', $lodging->id)->firstOrFail();
        return response()->json($artistLodging, 200);
    }

    public function store(Request $request, Artist $artist){

        $request->validate([
            'artist_id' => 'exists:artists,id',
            'lodging_id' => 'exists:lodgings,id',
        ], self::$messages);

        $artist = Artist::findOrFail($request->artist_id);
        $artist->lodgings()->attach($request->lodging_id);
        return response()->json($artist->lodgings, 201);//codigo 201 correspodnde a create
    }

    /*
    public function update(Request $request, Lodging $lodging, User $user){

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|unique:users|email|max:255',
            'password' => 'required|string',
        ], self::$messages);

        $user = $lodging->users()->where('id', $user->id)->firstOrFail();
        $user -> update($request->all());
        return response() -> json($user, 200); //codigo 200 correspodnde a modificacion exitosa
    }
    */

    public function delete(Request $request, Artist $artist, Lodging $lodging){

        $artist = Artist::findOrFail($artist->id);
        $artist->lodgings()->detach($lodging->id);
        return response()->json(null, 204);
    }
}
