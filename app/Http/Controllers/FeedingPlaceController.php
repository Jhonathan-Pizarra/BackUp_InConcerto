<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FeedingPlace;
use App\Http\Resources\FeedingPlace as FPlaceRes;
use App\Http\Resources\FeedingPlaceCollection;

class FeedingPlaceController extends Controller
{
    private static $messages = [
        'required' => 'El campo :attribute es obligatorio.',
        'integer' => 'El campo :attribute no es un número entero.',
        'boolean' => 'El campo :attribute debe ser true o false'
    ];

    //Vamos a hacer controladores, tareas que debe realizar
    public function index(){
        return new FeedingPlaceCollection(FeedingPlace::paginate());
    }

    public function show(FeedingPlace $feeding_place){
        //Tiene permiso:
        $this->authorize('view', $feeding_place);

        return response()->json(new FPlaceRes($feeding_place),200);
    }

    public function store(Request $request){
        //Tiene permiso:
        $this->authorize('create', FeedingPlace::class);

        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|unique:feeding_places|max:255',
            'permit' => 'required|boolean',
            'aforo' => 'required|integer',

        ], self::$messages);

        $feeding_place = FeedingPlace::create($request ->all());
        return response() -> json($feeding_place, 201); //codigo 201 correspodnde a create
    }

    public function update(Request $request, FeedingPlace $feeding_place){
        //Tiene permiso:
        $this->authorize('update', $feeding_place);

        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|unique:feeding_places|max:255',
            'permit' => 'required|boolean',
            'aforo' => 'required|integer',

        ], self::$messages);

        $feeding_place -> update($request->all());
        return response() -> json($feeding_place, 200); //codigo 200 correspodnde a modificacion exitosa
    }

    public function delete(Request $request, FeedingPlace $feeding_place){
        //Tiene permiso:
        $this->authorize('delete', $feeding_place);

        $feeding_place -> delete();
        return response() -> json(null, 404); //codigo 204 correspodnde a not found
    }
}
