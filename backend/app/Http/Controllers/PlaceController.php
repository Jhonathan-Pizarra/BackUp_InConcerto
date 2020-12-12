<?php

namespace App\Http\Controllers;
use App\Place;

use Illuminate\Http\Request;

class PlaceController extends Controller
{
    //Vamos a hacer controladores, tareas que debe realizar
    public function index(){
        return Place::all();
    }

    public function show(Place $place){
        return $place;
    }

    public function store(Request $request){
        $place = Place::create($request ->all());
        return response() -> json($place, 201); //codigo 201 correspodnde a create
    }

    public function update(Request $request, Place $place){
        $place -> update($request->all());
        return response() -> json($place, 200); //codigo 200 correspodnde a modificacion exitosa
    }

    public function delete(Request $request, Place $place){
        $place -> delete();
        return response() -> json(null, 404); //codigo 204 correspodnde a not found
    }
}
