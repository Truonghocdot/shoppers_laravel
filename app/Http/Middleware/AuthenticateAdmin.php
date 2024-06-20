<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
class AuthenticateAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {   
        if(Auth::user()){
            $user = Auth::user()->toArray();
            if($user){
                if($user['role'] == 1){
                    return $next($request);
                }else{
                    return redirect()->back()->with("error","You not have permissed to access!");
                } 
            }
        }else{
            return redirect()->back();
        }
    }
}
