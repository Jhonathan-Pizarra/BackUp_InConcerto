<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ActivityFestival;
use App\Http\Resources\ActivityFestival as ActivityRes;
use App\Http\Resources\ActivityFestivalCollection as ActivityCollection;

class ActivityFestivalController extends Controller
{
    //Vamos a hacer controladores, tareas que debe realizar
    public function index(){
        return new ActivityCollection(ActivityFestival::paginate());
    }

    public function show(ActivityFestival $activityfestival){
        return response()->json(new ActivityRes($activityfestival),200);
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
