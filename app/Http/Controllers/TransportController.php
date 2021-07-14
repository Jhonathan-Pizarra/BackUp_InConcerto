<?php

namespace App\Http\Controllers;

use App\Models\Transport;
use Illuminate\Http\Request;
use App\Http\Resources\Transport as TransportRes;
use App\Http\Resources\TransportCollection;

class TransportController extends Controller
{
    private static $messages = [
        'required' => 'El campo :attribute es obligatorio.',
        'numeric' => 'El campo :attribute no es un número.',
    ];

    //Vamos a hacer controladores, tareas que debe realizar
    public function index(){
        //return new TransportCollection(Transport::paginate());
        return response()->json(new TransportCollection(Transport::all()),200);
    }

    public function show(Transport $transport){
        //Tiene permiso:
        $this->authorize('view', $transport);

        return response()->json(new TransportRes($transport),200);
    }

    public function store(Request $request){
        //Tiene permiso:
        $this->authorize('create', Transport::class);

        $request->validate([
            'type' => 'required|string|max:255',
            'capacity' => 'required|numeric|integer',
            'instruments_capacity' => 'required|numeric',
            'disponibility' => 'required|boolean',
            'licence_plate' => 'required|string|max:255',
            'calendar_id' =>'required|exists:calendars,id'

        ], self::$messages);

        $transport = Transport::create($request ->all());
        return response() -> json($transport, 201); //codigo 201 correspodnde a create
    }

    public function update(Request $request, Transport $transport){
        //Tiene permiso:
        $this->authorize('update', $transport);

        $request->validate([
            'type' => 'string|max:255',
            'capacity' => 'numeric|integer',
            'instruments_capacity' => 'numeric',
            'disponibility' => 'required|boolean',
            'licence_plate' => 'string|max:255',
            'calendar_id' =>'exists:calendars,id'

        ], self::$messages);

        $transport -> update($request->all());
        return response() -> json($transport, 200); //codigo 200 correspodnde a modificacion exitosa
    }

    public function delete(Request $request, Transport $transport){
        //Tiene permiso:
        $this->authorize('delete', $transport);

        $transport -> delete();
        return response() -> json(null, 404); //codigo 204 correspodnde a not found
    }
}
