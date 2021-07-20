<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Calendar;
use App\Http\Resources\User as UserCalRes;
use Illuminate\Http\Request;
use App\Http\Resources\UserCollection;

class UserCalendarController extends Controller
{
    private static $messages = [
        'name' => 'required|string|max:255',
        'email' => 'required|string|unique:users|email|max:255',
        'password' => 'required|string'
    ];

    public function index(Calendar $calendar){
        return response()->json(new UserCollection($calendar->users),200);
    }

    public function show(Calendar $calendar, User $user){
        $calendarUser = $calendar->users()->where('id', $user->id)->firstOrFail();
        return response()->json($calendarUser, 200);
    }

    public function store(Request $request, Calendar $calendar){

        $request->validate([
            'user_id' => 'exists:users,id',
            'calendar_id' => 'exists:calendars,id',
        ], self::$messages);

        $calendar = Calendar::findOrFail($request->calendar_id);
        $calendar->users()->attach($request->user_id);
        return response()->json($calendar->users, 201);

    }

    /*
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
    */

    public function delete(Request $request,  Calendar $calendar, User $user){

        $calendar = Calendar::findOrFail($calendar->id);
        $calendar->users()->detach($user->id);
        return response()->json(null, 404);
    }

}
