<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ActivityFestival;
use App\Http\Resources\ActivityFestival as ActivityRes;
use App\Http\Resources\ActivityFestivalCollection as ActivityCollection;

class ActivityFestivalController extends Controller
{
    private static $messages = [
        'required' => 'El campo :attribute es obligatorio.',
        'date' => 'La fecha debe ser en formatao YYYY-MM-DD',
    ];

    //Vamos a hacer controladores, tareas que debe realizar
    public function index(){
        return new ActivityCollection(ActivityFestival::paginate());
    }

    public function show(ActivityFestival $activityfestival){
        //Tiene permiso:
        $this->authorize('view', $activityfestival);

        return response()->json(new ActivityRes($activityfestival),200);
    }

    public function store(Request $request){
        //Tiene permiso:
        $this->authorize('create', ActivityFestival::class);

        $request->validate([
            'name' => 'required|string|max:255',
            'date' => 'required|date',
            'description' => 'required|string',
            'observation' => 'required|string',
            'festival_id' => 'required|exists:festivals,id',
            'user_id' => 'required|exists:users,id'
        ], self::$messages);

        $activityfestival = ActivityFestival::create($request ->all());
        return response() -> json($activityfestival, 201); //codigo 201 correspodnde a create
    }

    public function update(Request $request, ActivityFestival $activityfestival){
        //Tiene permiso:
        $this->authorize('update', $activityfestival);

        $request->validate([
            'name' => 'required|string|max:255',
            'date' => 'required|date',
            'description' => 'required|string',
            'observation' => 'required|string',
            'festival_id' => 'required|exists:festivals,id',
            'user_id' => 'required|exists:users,id'
        ], self::$messages);

        $activityfestival -> update($request->all());
        return response() -> json($activityfestival, 200); //codigo 200 correspodnde a modificacion exitosa
    }

    public function delete(Request $request, ActivityFestival $activityfestival){
        //Tiene permiso:
        $this->authorize('delete', $activityfestival);

        $activityfestival -> delete();
        return response() -> json(null, 404); //codigo 204 correspodnde a not found
    }
}
