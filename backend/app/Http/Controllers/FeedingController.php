<?php

namespace App\Http\Controllers;
use App\Feeding;
use App\Http\Resources\Feeding as FeedingRes;
use App\Http\Resources\FeedingCollection;

use Illuminate\Http\Request;

class FeedingController extends Controller
{
    //Vamos a hacer controladores, tareas que debe realizar
    public function index(){
        return new FeedingCollection(Feeding::paginate());
    }

    public function show(Feeding $feeding){
        return response()->json(new FeedingRes($feeding),200);
    }

    public function store(Request $request){
        $feeding = Feeding::create($request ->all());
        return response() -> json($feeding, 201); //codigo 201 correspodnde a create
    }

    public function update(Request $request, Feeding $feeding){
        $feeding -> update($request->all());
        return response() -> json($feeding, 200); //codigo 200 correspodnde a modificacion exitosa
    }

    public function delete(Request $request, Feeding $feeding){
        $feeding -> delete();
        return response() -> json(null, 404); //codigo 204 correspodnde a not found
    }
}
