<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\User;
use Firebase\JWT\JWT;

class Auth
{

    public function handle($request, Closure $next)
    {
        try {
            if (!$request->hasHeader('Authorization')) throw new \Exception();
    
            $authorizationHeader = $request->header('Authorization');
            $token = str_replace('Bearer ', '', $authorizationHeader);
            $data = JWT::decode($token, env('JWT_KEY'), ['HS256']);
            $user = User::where('email', $data->email)->first();
    
            if (is_null($user)) throw new \Exception();
    
            return $next($request);
        } catch (\Exception $ex) {
            return response()->json('Unauthorize', 401);
        }
    }

}
