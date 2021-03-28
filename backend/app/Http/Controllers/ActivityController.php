<?php

namespace App\Http\Controllers;

use App\ActivityFestival;
use App\Festival;
use App\Http\Resources\ActivityFestival as ActivityFestRes;
use App\Http\Resources\ActivityFestivalCollection as ActivityCollection;
use Illuminate\Http\Request;

class ActivityController extends Controller
{
    private static $messages = [
        'required' => 'El campo :attribute es obligatorio.',
        'date' => 'La fecha debe ser en formatao YYYY-MM-DD',
    ];

    //Vamos a hacer controladores, tareas que debe realizar
    public function index(Festival $festival){
        return response()->json(ActivityFestRes::collection($festival->activities),200);
    }

    public function show(Festival $festival, ActivityFestival $activityFestival){
        $activityFestival = $festival->activities()->where('id', $activityFestival->id)->firstOrFail();
        return response()->json($activityFestival, 200);
    }

    public function store(Request $request, Festival $festival){

        $request->validate([
            'name' => 'required|string|max:255',
            'date' => 'required|date',
            'description' => 'required|string',
            'observation' => 'required|string',
            'festival_id' => 'required|exists:festivals,id',
            'user_id' => 'required|exists:users,id'
        ], self::$messages);

        $activityfestival = $festival->activities()->save(new ActivityFestival($request->all()));
        return response()->json($activityfestival, 201);
    }

    public function update(Request $request, Festival $festival, ActivityFestival $activityFestival){

        $request->validate([
            'name' => 'required|string|max:255',
            'date' => 'required|date',
            'description' => 'required|string',
            'observation' => 'required|string',
            'festival_id' => 'required|exists:festivals,id',
            'user_id' => 'required|exists:users,id'
        ], self::$messages);

        $activityFestival = $festival->activities()->where('id', $activityFestival->id)->firstOrFail();
        $activityFestival -> update($request->all());
        return response() -> json($activityFestival, 200); //codigo 200 correspodnde a modificacion exitosa
    }

    public function delete(Request $request, Festival $festival, ActivityFestival $activityfestival){
        $activityfestival = $festival->activities()->where('id', $activityfestival->id)->firstOrFail();
        $activityfestival -> delete();
        return response() -> json(null, 404); //codigo 204 correspodnde a not found
    }

}
