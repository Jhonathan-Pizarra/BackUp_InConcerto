<?php

namespace App\Http\Controllers;

use App\Artist;
use App\Concert;
use App\Http\Resources\Artist as ArtistConcertRes;
use App\Http\Resources\ArtistCollection;
use Illuminate\Http\Request;

class ArtistConcertController extends Controller
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

    public function index(Concert $concert){
        return response()->json(ArtistConcertRes::collection($concert->artists),200);
    }

    public function show(Concert $concert, Artist $artist){
        $artist = $concert->artists()->where('id', $artist->id)->firstOrFail();
        return response()->json($artist, 200);
    }

    public function store(Request $request, Concert $concert){

        $request->validate([
            'ciOrPassport' => 'required|string|unique:artists|max:15',
            'artisticOrGroupName' => 'required|string|unique:artists|max:255',
            'name' => 'required|string|max:255',
            'lastName' => 'required|string|max:255',
            'nationality' => 'required|string|max:255',
            'mail' => 'required|string|unique:artists|email|max:255',
            'phone' => 'required|string|max:10',
            'passage' => 'required|boolean',
            'instruments' => 'required|string',
            'emergencyPhone' => 'required|string|max:25',
            'emergencyMail' => 'required|string|email|max:255',
            'foodGroup' => 'required|string|max:255',
            'observation' => 'required|string',
        ], self::$messages);

        $artist = $concert->artists()->save(new Artist($request->all()));
        return response()->json($artist, 201);
    }

    public function update(Request $request, Concert $concert,  Artist $artist){

        $request->validate([
            'ciOrPassport' => 'required|string|unique:artists|max:15',
            'artisticOrGroupName' => 'required|string|unique:artists|max:255',
            'name' => 'required|string|max:255',
            'lastName' => 'required|string|max:255',
            'nationality' => 'required|string|max:255',
            'mail' => 'required|string|unique:artists|email|max:255',
            'phone' => 'required|string|max:10',
            'passage' => 'required|boolean',
            'instruments' => 'required|string',
            'emergencyPhone' => 'required|string|max:25',
            'emergencyMail' => 'required|string|email|max:255',
            'foodGroup' => 'required|string|max:255',
            'observation' => 'required|string',
        ], self::$messages);

        $artist = $concert->artists()->where('id', $artist->id)->firstOrFail();
        $artist -> update($request->all());
        return response() -> json($artist, 200); //codigo 200 correspodnde a modificacion exitosa
    }

    public function delete(Request $request, Concert $concert, Artist $artist){
        $artist = $concert->artists()->where('id', $artist->id)->firstOrFail();
        $artist -> delete();
        return response() -> json(null, 404); //codigo 204 correspodnde a not found
    }

}
