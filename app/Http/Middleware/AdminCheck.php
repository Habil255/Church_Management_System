<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
       
        
        if($request->path() != '/login'){
            
            return redirect('/login');
           
             // go to the next middleware
        }else{
        return $next($request);
        }
        

        if(!Auth::check()){
            return redirect('/login');
            return response()->json([
            'msg' => 'Access Denied ... ',
            'url' => $request->path()
            ], 403);
        }
    }
}
