<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EssayController extends Controller
{
    //Vamos a hacer controladores, tareas que debe realizar
    public function index(){
        return Essay::all();
    }

    public function show(Essay $essay){
        return $essay;
    }

    public function store(Request $request){
        $essay = Essay::create($request ->all());
        return response() -> json($essay, 201); //codigo 201 correspodnde a create
    }

    public function update(Request $request, Essay $essay){
        $essay -> update($request->all());
        return response() -> json($essay, 200); //codigo 200 correspodnde a modificacion exitosa
    }

    public function delete(Request $request, Essay $essay){
        $essay -> delete();
        return response() -> json(null, 404); //codigo 204 correspodnde a not found
    }
}
