<?php

namespace App\Http\Controllers;

use App\Http\Resources\LodgingCollection;
use App\Http\Resources\UserCollection;
use App\Models\Lodging;
use App\Models\User;
use Illuminate\Http\Request;

class LodgingUserController extends Controller
{
    private static $messages = [
        'required' => 'El campo :attribute es obligatorio.',
    ];

    public function index(User $user){
        return response()->json(new LodgingCollection($user->lodgings),200);
    }

    public function show(User $user, Lodging $lodging){
        $userLodging = $user->lodgings()->where('id', $lodging->id)->firstOrFail();
        return response()->json($userLodging, 200);
    }

    public function store(Request $request, User $user){

        $request->validate([
            'user_id' => 'exists:users,id',
            'lodging_id' => 'exists:lodgings,id',
        ], self::$messages);

        $user = User::findOrFail($request->user_id);
        $user->lodgings()->attach($request->lodging_id);
        return response()->json($user->lodgings, 201);//codigo 201 correspodnde a create
    }

    /*
    public function update(Request $request, Lodging $lodging, User $user){

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|unique:users|email|max:255',
            'password' => 'required|string',
        ], self::$messages);

        $user = $lodging->users()->where('id', $user->id)->firstOrFail();
        $user -> update($request->all());
        return response() -> json($user, 200); //codigo 200 correspodnde a modificacion exitosa
    }
    */

    public function delete(Request $request, User $user, Lodging $lodging){

        $user = User::findOrFail($user->id);
        $user->lodgings()->detach($lodging->id);
        return response()->json(null, 204);
    }
}
