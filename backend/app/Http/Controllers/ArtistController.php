<?php

namespace App\Http\Controllers;
use App\Artist;

use Illuminate\Http\Request;

class ArtistController extends Controller
{
    //Vamos a hacer controladores, tareas que debe realizar
    public function index(){
        return Artist::all();
    }

    public function show(Artist $artist){
        return $artist;
    }

    public function store(Request $request){
        $artist = Artist::create($request ->all());
        return response() -> json($artist, 201); //codigo 201 correspodnde a create
    }

    public function update(Request $request, Artist $artist){
        $artist -> update($request->all());
        return response() -> json($artist, 200); //codigo 200 correspodnde a modificacion exitosa
    }

    public function delete(Request $request, Artist $artist){
        $artist -> delete();
        return response() -> json(null, 404); //codigo 204 correspodnde a not found
    }

}
