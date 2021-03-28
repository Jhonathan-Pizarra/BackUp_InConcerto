<?php

namespace App\Http\Controllers;
use App\Place;
use App\Http\Resources\Place as PlaceRes;
use App\Http\Resources\PlaceCollection;

use Illuminate\Http\Request;

class PlaceController extends Controller
{
    private static $messages = [
        'required' => 'El campo :attribute es obligatorio.',
        'unique' => 'El :attribute ya existe.',
        'integer' => 'El campo :attribute debe ser un número entero'
    ];

    //Vamos a hacer controladores, tareas que debe realizar
    public function index(){
        return new PlaceCollection(Place::paginate());
    }

    public function show(Place $place){
        return response()->json(new PlaceRes($place),200);
    }

    public function store(Request $request){

        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|unique:places|max:255',
            'permit' => 'required|boolean',
            'aforo' => 'required|integer',
            'description' => 'required|string|max:255'
        ], self::$messages);

        $place = Place::create($request ->all());
        return response() -> json($place, 201); //codigo 201 correspodnde a create
    }

    public function update(Request $request, Place $place){

        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|unique:places|max:255',
            'permit' => 'required|boolean',
            'aforo' => 'required|integer',
            'description' => 'required|string|max:255'
        ], self::$messages);

        $place -> update($request->all());
        return response() -> json($place, 200); //codigo 200 correspodnde a modificacion exitosa
    }

    public function delete(Request $request, Place $place){
        $place -> delete();
        return response() -> json(null, 404); //codigo 204 correspodnde a not found
    }
}
