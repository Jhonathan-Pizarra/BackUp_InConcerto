<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\FeedingPlace;

class FeedingPlaceController extends Controller
{
    //Vamos a hacer controladores, tareas que debe realizar
    public function index(){
        return FeedingPlace::all();
    }

    public function show(FeedingPlace $feeding_place){
        return $feeding_place;
    }

    public function store(Request $request){
        $feeding_place = FeedingPlace::create($request ->all());
        return response() -> json($feeding_place, 201); //codigo 201 correspodnde a create
    }

    public function update(Request $request, FeedingPlace $feeding_place){
        $feeding_place -> update($request->all());
        return response() -> json($feeding_place, 200); //codigo 200 correspodnde a modificacion exitosa
    }

    public function delete(Request $request, FeedingPlace $feeding_place){
        $feeding_place -> delete();
        return response() -> json(null, 404); //codigo 204 correspodnde a not found
    }
}
