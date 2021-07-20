<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Lodging;
use App\Http\Resources\User as UserLodRes;
use App\Http\Resources\UserCollection;

use Illuminate\Http\Request;

class UserLodgingController extends Controller
{
    private static $messages = [
        'required' => 'El campo :attribute es obligatorio.',
    ];

    public function index(Lodging $lodging){
        return response()->json(new UserCollection($lodging->users),200);
        //return response()->json(UserLodRes::collection($lodging->users),200);
    }

    public function show(Lodging $lodging, User $user){
        $lodgingUser = $lodging->users()->where('id', $user->id)->firstOrFail();
        return response()->json($lodgingUser, 200);
    }

    public function store(Request $request, Lodging $lodging){

        $request->validate([
            'user_id' => 'exists:users,id',
            'lodging_id' => 'exists:lodgings,id',
        ], self::$messages);

        $lodging = Lodging::findOrFail($request->lodging_id);
        $lodging->users()->attach($request->user_id);
        return response()->json($lodging->users, 201);//codigo 201 correspodnde a create
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

    public function delete(Request $request, Lodging $lodging, User $user){

        $lodging = Lodging::findOrFail($lodging->id);
        $lodging->users()->detach($user->id);
        return response()->json(null, 404);
    }


}
