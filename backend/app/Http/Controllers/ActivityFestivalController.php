<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ActivityFestival;

class ActivityFestivalController extends Controller
{

    //Vamos a hacer controladores, tareas que debe realizar
    public function index(){
        return ActivityFestival::all();
    }

    public function show(ActivityFestival $activityfestival){
        return $activityfestival;
    }

    public function store(Request $request){
        $activityfestival = ActivityFestival::create($request ->all());
        return response() -> json($activityfestival, 201); //codigo 201 correspodnde a create
    }

    public function update(Request $request, ActivityFestival $activityfestival){
        $activityfestival -> update($request->all());
        return response() -> json($activityfestival, 200); //codigo 200 correspodnde a modificacion exitosa
    }

    public function delete(Request $request, ActivityFestival $activityfestival){
        $activityfestival -> delete();
        return response() -> json(null, 404); //codigo 204 correspodnde a not found
    }
}
