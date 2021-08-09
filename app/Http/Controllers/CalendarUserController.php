<?php

namespace App\Http\Controllers;
use App\Http\Resources\CalendarCollection;
use App\Http\Resources\UserCollection;
use App\Models\Calendar;
use App\Models\User;
use Illuminate\Http\Request;

class CalendarUserController extends Controller
{
    private static $messages = [
        'name' => 'required|string|max:255',
        'email' => 'required|string|unique:users|email|max:255',
        'password' => 'required|string'
    ];

    public function index(User $user){
        return response()->json(new CalendarCollection($user->calendars),200);
    }

    public function show(User $user, Calendar $calendar){
        $userCalendar = $user->calendars()->where('id', $calendar->id)->firstOrFail();
        return response()->json($userCalendar, 200);
    }

    public function store(Request $request, User $user){

        $request->validate([
            'user_id' => 'exists:users,id',
            'calendar_id' => 'exists:calendars,id',
        ], self::$messages);

        $user = User::findOrFail($request->user_id);
        $user->calendars()->attach($request->calendar_id);
        return response()->json($user->calendars, 201);

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

    public function delete(Request $request, User $user, Calendar $calendar){

        $user = User::findOrFail($user->id);
        $user->calendars()->detach($calendar->id);
        return response()->json(null, 204);
    }
}
