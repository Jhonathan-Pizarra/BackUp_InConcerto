<?php

namespace App\Http\Controllers;

use App\Models\Feeding;
use App\Http\Resources\Feeding as FeedingRes;
use App\Http\Resources\FeedingCollection;

use Illuminate\Http\Request;

class FeedingController extends Controller
{
    private static $messages = [
        'required' => 'El campo :attribute es requerido.',
        'integer' => 'El campo :attribute debe ser un número entero.',
        'date' => 'El campo :attribute debe tener el formato YYYY-MM-DD'
    ];

    //Vamos a hacer controladores, tareas que debe realizar
    public function index(){
        //return new FeedingCollection(Feeding::paginate());
        return response()->json(new FeedingCollection(Feeding::all()),200);  //no data + metadata
    }

    public function show(Feeding $feeding){
        //Tiene permiso:
        $this->authorize('view', $feeding);
        return response()->json(new FeedingRes($feeding),200);
    }

    public function store(Request $request){
        //Tiene permiso:
        $this->authorize('create', Feeding::class);

        $request->validate([
            'date' => 'required|date|max:255',
            'food' => 'required|string|max:255',
            'observation' => 'required|string',
            'quantityLunchs' =>'required|integer',
            'user_id' => 'required|exists:users,id',
            'artist_id' => 'required|exists:artists,id',
            'place_id' => 'required|exists:feeding_places,id',

        ], self::$messages);

        $feeding = Feeding::create($request ->all());
        return response() -> json($feeding, 201); //codigo 201 correspodnde a create
    }

    public function update(Request $request, Feeding $feeding){
        //Tiene permiso:
        $this->authorize('update', $feeding);

        $request->validate([
            'date' => 'date|max:255',
            'food' => 'string|max:255',
            'observation' => 'string',
            'quantityLunchs' =>'integer',
            'user_id' => 'exists:users,id',
            'artist_id' => 'exists:artists,id',
            'place_id' => 'exists:feeding_places,id',

        ], self::$messages);

        $feeding -> update($request->all());
        return response() -> json($feeding, 200); //codigo 200 correspodnde a modificacion exitosa
    }

    public function delete(Request $request, Feeding $feeding){
        //Tiene permiso:
        $this->authorize('delete', $feeding);

        $feeding -> delete();
        return response() -> json(null, 204); //codigo 204 correspodnde a not found
    }
}
