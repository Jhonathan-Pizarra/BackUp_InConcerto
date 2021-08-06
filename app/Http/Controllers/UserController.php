<?php

namespace App\Http\Controllers;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Exceptions\JWTException;
use App\Http\Resources\User as UserResource;

use JWTAuth;

class UserController extends Controller
{
    //Función necesaria para obtener users para Feeding...
    public function index(){
        return response()->json(UserResource::collection(User::all()),200);//nodata
    }

    public function show(User $user){
        //Tienepermiso:
        //$this->authorize('view',$user);
        return response()->json(new UserResource($user),200);
    }

    public function update(Request $request, User $user){

        //Tiene permiso:
        //$this->authorize('update', $user);

        $user -> update([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => Hash::make($request->get('password')),
            'role' => $request->get('role'),
        ]);

        $token = JWTAuth::fromUser($user);
        return response()->json(compact('user', 'token'), 201);
    }

    public function delete(Request $request, User $user){
        //Tiene permiso:
        //$this->authorize('delete', $user);
        $user -> delete();
        return response() -> json(null, 204); //codigo 204 correspodnde a not found
    }

    //Funcion de autenticacion(LOGIN) de usuario con JWT
    public function authenticate(Request $request)
    {
        $credentials = $request->only('email', 'password');
        try {
            if (!$token = JWTAuth::attempt($credentials)) {
                return response()->json(['message' => 'invalid_credentials'], 400);
            }
        } catch (JWTException $e) {
            return response()->json(['message' => 'could_not_create_token'], 500);
        }

        $user = JWTAuth::user();
        return response()->json(compact('token','user'))
            // for httpOnly cookie
            ->withCookie(
                'token',
                $token,
                //auth()->getToken()->get(),
                config('jwt.ttl'),
                '/',
                null,
                config('app.env') !== 'local',
                true, //httpPnly
                false,
                config('app.env') !== 'local' ? 'None':'Lax' //SameSite
            );
    }

    //Funcion de registro
    public function register(Request $request)
    {
//        $validator = Validator::make($request->all(),[
//            'name' => 'required|string|max:255',
//            'email' => 'required|string|email|max:255|unique:users',
//            'password' => 'required|string|min:6|confirmed',
//        ]);

//        if ($validator->fails()){
//            return response()->json($validator->errors()->toJson(), 400);
//        }
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'role' => 'required|string',
        ]);

        $user = User::create([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => Hash::make($request->get('password')),
            'role' => $request->get('role'),
        ]);

        $token = JWTAuth::fromUser($user);
        return response()->json(compact('user', 'token'), 201)
            // for httpOnly cookie
            ->withCookie(
                'token',
                $token,
                //auth()->getToken()->get(),
                config('jwt.ttl'),
                '/',
                null,
                config('app.env') !== 'local',
                true, //httpPnly
                false,
                config('app.env') !== 'local' ? 'None':'Lax' //SameSite
            );
    }

    //Usuario no autenticado
    public function getAuthenticatedUser()
    {
        try {
            if (!$user = JWTAuth::parseToken()->authenticate()) {
                return response()->json(['message' => 'user_not_found'], 404);
            }
        } catch (Tymon\JWTAuth\Exceptions\TokenExpiredException $e) {
            return response()->json(['message' => 'token_expired'], $e->getStatusCode());
        } catch (Tymon\JWTAuth\Exceptions\TokenInvalidException $e) {
            return response()->json(['message' => 'token_invalid'], $e->getStatusCode());
        } catch (Tymon\JWTAuth\Exceptions\JWTException $e) {
            return response()->json(['message' => 'token_absent'], $e->getStatusCode());
        }
        return response()->json(compact('user'), 200);
    }

    //Logout
    public function logout()
    {
        try {
            JWTAuth::invalidate(JWTAuth::getToken());

            return response()->json([
                "status" => "success",
                "message" => "User successfully logged out."
            ], 200)
                // for httpOnly cookie
                ->withCookie(
                    'token',
                    null, //Eliminar el valor de la cookie
                    //auth()->getToken()->get(),
                    config('jwt.ttl'),
                    '/',
                    null,
                    config('app.env') !== 'local',
                    true, //httpPnly
                    false,
                    config('app.env') !== 'local' ? 'None':'Lax' //SameSite
                );
        } catch (JWTException $e) {
            // something went wrong whilst attempting to encode the token
            return response()->json(["message" => "No se pudo cerrar la sesión."], 500);
        }
    }

}
