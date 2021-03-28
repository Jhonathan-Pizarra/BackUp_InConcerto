<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Lodging;
use App\Http\Resources\Lodging as LodgingRes;
use App\Http\Resources\LodgingCollection;

class LodgingController extends Controller
{
    private static $messages = [
        'required' => 'El campo :attribute es obligatorio.',
        'date' => ':attribute debe tener formato YYYY-MM-DD.',
    ];

    //Vamos a hacer controladores, tareas que debe realizar
    public function index(){
        return new LodgingCollection(Lodging::paginate());
    }

    public function show(Lodging $lodging){
        return response()->json(new LodgingRes($lodging),200);
    }

    public function store(Request $request){

        $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'observation' => 'required|string',
            'checkIn' => 'required|date',
            'checkOut' => 'required|date'
        ], self::$messages);

        $lodging = Lodging::create($request ->all());
        return response() -> json($lodging, 201); //codigo 201 correspodnde a create
    }

    public function update(Request $request, Lodging $lodging){

        $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'observation' => 'required|string',
            'checkIn' => 'required|date',
            'checkOut' => 'required|date'
        ], self::$messages);

        $lodging -> update($request->all());
        return response() -> json($lodging, 200); //codigo 200 correspodnde a modificacion exitosa
    }

    public function delete(Request $request, Lodging $lodging){
        $lodging -> delete();
        return response() -> json(null, 404); //codigo 204 correspodnde a not found
    }

}
