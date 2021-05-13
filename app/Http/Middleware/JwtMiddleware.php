<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;
use Tymon\JWTAuth\Facades\JWTAuth;


class JwtMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        try {
            $user = JWTAuth::parseToken()->authenticate();

        } catch (TokenExpiredException $e) {
            //return response()->json(['messsage' => 'token_expired'], 401);
            try {
                $refreshed_token = JWTAuth::refresh(JWTAuth::getToken());
                $user = JWTAuth::setToken($refreshed_token)->toUser();
                return response()->json(['message' => 'token_expired', 'refreshed_token' => $refreshed_token], 401);

            } catch (JWTException $e) {
//                return response()->json(['token_expired'], $e->getStatusCode());

                return response()->json([
                    'message' => 'token_not_refreshed'
                ], 401);
            }

        } catch (TokenInvalidException $e) {
            return response()->json(['message' => 'token_invalid'], 401);
        } catch (JWTException $e) {
            return response()->json(['message' => 'token_absent'], 401);
        } catch (Exception $e) {
            return response()->json(['message' => $e->getMessage()], 500);
        }
        return $next($request);
    }
}
