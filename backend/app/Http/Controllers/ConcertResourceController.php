<?php

namespace App\Http\Controllers;

use App\ConcertResource;
use App\Http\Resources\ConcertResource as ConcertResourceRes;
use App\Http\Resources\ConcertResourceCollection;
use Illuminate\Http\Request;

class ConcertResourceController extends Controller
{
    private static $messages = [
        'required' => 'El campo :attribute es obligatorio.',
    ];

    //Vamos a hacer controladores, tareas que debe realizar
    public function index(){
        return new ConcertResourceCollection(ConcertResource::paginate());
    }

    public function show(ConcertResource $concertResource){
        return response()->json(new ConcertResourceRes($concertResource),200);
    }

    public function store(Request $request){

        $request->validate([
            'concert_id' => 'required|exists:concerts,id',
            'resource_id' => 'required|exists:resources,id',
            'state' => 'required|boolean',
        ], self::$messages);

        $concertResource = ConcertResource::create($request ->all());
        return response() -> json($concertResource, 201); //codigo 201 correspodnde a create
    }

    public function update(Request $request, ConcertResource $concertResource){

        $request->validate([
            'concert_id' => 'required|exists:concerts,id',
            'resource_id' => 'required|exists:resources,id',
            'state' => 'required|boolean',
        ], self::$messages);

        $concertResource -> update($request->all());
        return response() -> json($concertResource, 200); //codigo 200 correspodnde a modificacion exitosa
    }

    public function delete(Request $request, ConcertResource $concertResource){
        $concertResource -> delete();
        return response() -> json(null, 404); //codigo 204 correspodnde a not found
    }

}
