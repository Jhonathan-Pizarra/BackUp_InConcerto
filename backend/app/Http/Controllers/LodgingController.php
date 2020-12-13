<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Lodging;

class LodgingController extends Controller
{
    //Vamos a hacer controladores, tareas que debe realizar
    public function index(){
        return Lodging::all();
    }

    public function show(Lodging $lodging){
        return $lodging;
    }

    public function store(Request $request){
        $lodging = Lodging::create($request ->all());
        return response() -> json($lodging, 201); //codigo 201 correspodnde a create
    }

    public function update(Request $request, Lodging $lodging){
        $lodging -> update($request->all());
        return response() -> json($lodging, 200); //codigo 200 correspodnde a modificacion exitosa
    }

    public function delete(Request $request, Lodging $lodging){
        $lodging -> delete();
        return response() -> json(null, 404); //codigo 204 correspodnde a not found
    }

}
