<?php

namespace App\Http\Controllers;
use App\Transport;

use Illuminate\Http\Request;

class TransportController extends Controller
{
    //Vamos a hacer controladores, tareas que debe realizar
    public function index(){
        return Transport::all();
    }

    public function show(Transport $transport){
        return $transport;
    }

    public function store(Request $request){
        $transport = Transport::create($request ->all());
        return response() -> json($transport, 201); //codigo 201 correspodnde a create
    }

    public function update(Request $request, Transport $transport){
        $transport -> update($request->all());
        return response() -> json($transport, 200); //codigo 200 correspodnde a modificacion exitosa
    }

    public function delete(Request $request, Transport $transport){
        $transport -> delete();
        return response() -> json(null, 404); //codigo 204 correspodnde a not found
    }
}
