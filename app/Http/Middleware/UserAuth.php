<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class UserAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::guard('users')->check()) {
            return $next($request);
        }else{
            $method = $request->method();
            if ($method == 'POST') {
                return response()->json([
                    'status' => 401,
                    'message' => 'Unauthorized',
                    'link' => route('user.login.show')
                ], 401);
            }
            return redirect(route('user.login.show'));
        }
    }
}
