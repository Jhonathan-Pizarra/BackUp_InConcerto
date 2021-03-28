<?php

namespace App\Http\Controllers;

use App\User;
use App\Lodging;
use App\Http\Resources\User as UserLodRes;

use Illuminate\Http\Request;

class UserLodgingController extends Controller
{
    private static $messages = [
        'required' => 'El campo :attribute es obligatorio.',
    ];

    public function index(Lodging $lodging){
        return response()->json(UserLodRes::collection($lodging->users),200);
    }

    public function show(Lodging $lodging, User $user){
        $user = $lodging->users()->where('id', $user->id)->firstOrFail();
        return response()->json($user, 200);
    }

    public function store(Request $request, Lodging $lodging){

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|unique:users|email|max:255',
            'password' => 'required|string',
        ], self::$messages);

        $user = $lodging->users()->save(new User($request->all()));
        return response()->json($user, 201);//codigo 201 correspodnde a create
    }

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

    public function delete(Request $request, Lodging $lodging, User $user){
        $user = $lodging->concerts()->where('id', $user->id)->firstOrFail();
        $user -> delete();
        return response() -> json(null, 404); //codigo 204 correspodnde a not found
    }


}
