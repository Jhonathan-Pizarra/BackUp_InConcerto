<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Concert;
use App\Http\Resources\Concert as ConcertRes;
use App\Http\Resources\ConcertCollection;

class ConcertController extends Controller
{
    private static $messages = [
        'required' => 'El campo :attribute es obligatorio.',
    ];

    //Vamos a hacer controladores, tareas que debe realizar
    public function index(){
        //return response()->json(ConcertRes::collection(Concert::all()),200); //no data
        //return response()->json(new ConcertCollection(Concert::all()),200);  //no data + metadata
        //return response()->json(new ConcertCollection(Concert::paginate(10)),200); //data + pagination
        return new ConcertCollection(Concert::paginate()); //data + pagination
    }

    public function show(Concert $concert){
        //Tiene permiso:
        $this->authorize('view', $concert);

        return response()->json(new ConcertRes($concert),200);
    }

    public function store(Request $request){
        //Tiene permiso:
        $this->authorize('create', Concert::class);

        $request->validate([
            'dateConcert' => 'required|date',
            'name' => 'required|string|max:255',
            'duration' => 'required|string',
            'free' => 'required',
            'insitu' => 'required',
            'festival_id' => 'required|exists:festivals,id',
            'place_id' => 'required|exists:places,id'
        ], self::$messages);

        $concert = Concert::create($request ->all());
        return response() -> json($concert, 201); //codigo 201 correspodnde a create
    }

    public function update(Request $request, Concert $concert){
        //Tiene permiso:
        $this->authorize('update', $concert);

        $request->validate([
            'dateConcert' => 'required|date',
            'name' => 'required|string|max:255',
            'duration' => 'required|string',
            'free' => 'required',
            'insitu' => 'required',
            'festival_id' => 'required|exists:festivals,id',
            'place_id' => 'required|exists:places,id'
        ], self::$messages);

        $concert -> update($request->all());
        return response() -> json($concert, 200); //codigo 200 correspodnde a modificacion exitosa
    }

    public function delete(Request $request, Concert $concert){
        //Tiene permiso:
        $this->authorize('delete', $concert);

        $concert -> delete();
        return response() -> json(null, 404); //codigo 204 correspodnde a not found
    }

}
