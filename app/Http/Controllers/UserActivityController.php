<?php

namespace App\Http\Controllers;

use App\Models\ActivityFestival;
use App\Models\User;
use App\Http\Resources\ActivityFestival as ActivityUserRes;
use App\Http\Resources\ActivityFestivalCollection as ActivityCollection;

use Illuminate\Http\Request;

class UserActivityController extends Controller
{
    private static $messages = [
        'required' => 'El campo :attribute es obligatorio.',
        'date' => 'La fecha debe ser en formatao YYYY-MM-DD',
    ];

    public function index(User $user){
        return response()->json(ActivityUserRes::collection($user->activities),200);
    }

    public function show(User $user, ActivityFestival $activityFestival){
        $activityFestival = $user->activities()->where('id', $activityFestival->id)->firstOrFail();
        return response()->json($activityFestival, 200);
    }

    public function store(Request $request, User $user){

        $request->validate([
            'name' => 'required|string|max:255',
            'date' => 'required|date',
            'description' => 'required|string',
            'observation' => 'required|string',
            'festival_id' => 'required|exists:festivals,id',
            'user_id' => 'required|exists:users,id'
        ], self::$messages);

        $activityFestival = $user->activities()->save(new ActivityFestival($request->all()));
        return response()->json($activityFestival, 201);
    }

    public function update(Request $request, User $user, ActivityFestival $activityFestival){

        $request->validate([
            'name' => 'required|string|max:255',
            'date' => 'required|date',
            'description' => 'required|string',
            'observation' => 'required|string',
            'festival_id' => 'required|exists:festivals,id',
            'user_id' => 'required|exists:users,id'
        ], self::$messages);

        $activityFestival = $user->activities()->where('id', $activityFestival->id)->firstOrFail();
        $activityFestival -> update($request->all());
        return response() -> json($activityFestival, 200); //codigo 200 correspodnde a modificacion exitosa
    }

    public function delete(Request $request, User $user, ActivityFestival $activityFestival){
        $activityFestival = $user->activities()->where('id', $activityFestival->id)->firstOrFail();
        $activityFestival -> delete();
        return response() -> json(null, 404); //codigo 204 correspodnde a not found
    }
}
