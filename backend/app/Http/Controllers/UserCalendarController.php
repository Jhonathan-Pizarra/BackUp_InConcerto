<?php

namespace App\Http\Controllers;

use App\User;
use App\Calendar;
use App\Http\Resources\User as UserCalRes;
use Illuminate\Http\Request;

class UserCalendarController extends Controller
{
    private static $messages = [
        'name' => 'required|string|max:255',
        'email' => 'required|string|unique:users|email|max:255',
        'password' => 'required|string'
    ];

    public function index(Calendar $calendar){
        return response()->json(UserCalRes::collection($calendar->users),200);
    }

    public function show(Calendar $calendar, User $user){
        $user = $calendar->users()->where('id', $user->id)->firstOrFail();
        return response()->json($user, 200);
    }

    public function store(Request $request, Calendar $calendar){

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|unique:users|email|max:255',
            'password' => 'required|string'
        ], self::$messages);

        $user = $calendar->users()->save(new User($request->all()));
        return response()->json($user, 201);
    }

    public function update(Request $request, Calendar $calendar, User $user){

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|unique:users|email|max:255',
            'password' => 'required|string'
        ], self::$messages);

        $user = $calendar->users()->where('id', $user->id)->firstOrFail();
        $user -> update($request->all());
        return response() -> json($user, 200); //codigo 200 correspodnde a modificacion exitosa
    }

    public function delete(Request $request,  Calendar $calendar, User $user){
        $user = $calendar->users()->where('id', $user->id)->firstOrFail();
        $user -> delete();
        return response() -> json(null, 404); //codigo 204 correspodnde a not found
    }

}
