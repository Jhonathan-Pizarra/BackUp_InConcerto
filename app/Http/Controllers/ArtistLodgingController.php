<?php

namespace App\Http\Controllers;

use App\Models\Artist;
use App\Models\Lodging;
use App\Http\Resources\Artist as ArtistLodgRes;
use App\Http\Resources\ArtistCollection;

use Illuminate\Http\Request;

class ArtistLodgingController extends Controller
{
    private static $messages = [
        'required' => 'El campo :attribute es obligatorio.',
    ];

    public function index(Lodging $lodging){
        return response()->json(new ArtistCollection($lodging->artists),200);
    }

    public function show(Lodging $lodging, Artist $artist){
        $lodgingArtist = $lodging->artists()->where('artist_id', $artist->id)->firstOrFail();
        return response()->json($lodgingArtist, 200);
    }

    public function store(Request $request){

        $request->validate([
            'artist_id' => 'exists:artists,id',
            'lodging_id' => 'exists:lodgings,id',
        ], self::$messages);

        $lodging = Lodging::findOrFail($request->lodging_id);
        $lodging->artists()->attach($request->artist_id);
        return response()->json($lodging->artists, 201);
    }

    /*
    public function update(Request $request, Lodging $lodging, Artist $artist){

        $request->validate([
            'artist_id' => 'exists:artists,id',
            'lodging_id' => 'exists:lodgings,id',
        ], self::$messages);

        $artist = $lodging->artists()->where('id', $artist->id)->firstOrFail();
        $artist -> update($request->all());
        return response() -> json($artist, 200); //codigo 200 correspodnde a modificacion exitosa

    }
    */

    public function delete(Request $request, Lodging $lodging, Artist $artist){

        $lodging = Lodging::findOrFail($lodging->id);
        $lodging->artists()->detach($artist->id);
        return response() -> json(null, 404); //codigo 204 correspodnde a not found
    }

}
