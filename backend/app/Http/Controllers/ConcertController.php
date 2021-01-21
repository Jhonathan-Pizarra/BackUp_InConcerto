<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Concert;
use App\Http\Resources\Concert as ConcertRes;
use App\Http\Resources\ConcertCollection;

class ConcertController extends Controller
{
    //Vamos a hacer controladores, tareas que debe realizar
    public function index(){
        return new ConcertCollection(Concert::paginate());
    }

    public function show(Concert $concert){
        return response()->json(new ConcertRes($concert),200);
    }

    public function store(Request $request){
        $concert = Concert::create($request ->all());
        return response() -> json($concert, 201); //codigo 201 correspodnde a create
    }

    public function update(Request $request, Concert $concert){
        $concert -> update($request->all());
        return response() -> json($concert, 200); //codigo 200 correspodnde a modificacion exitosa
    }

    public function delete(Request $request, Concert $concert){
        $concert -> delete();
        return response() -> json(null, 404); //codigo 204 correspodnde a not found
    }

}
