<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
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
        if($request->path() == "/" && $request->session()->has("user")){
            return redirect("/user");
        }
        else if($request->path() == "admin_login"  && $request->session()->has("admin")){   
            return redirect("/admin");
        }
        return $next($request);
    }
}
