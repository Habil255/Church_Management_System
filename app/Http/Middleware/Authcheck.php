<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Auth;


use Closure;
use Illuminate\Http\Request;

class Authcheck
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
        
        
        if($request->path() != '/login' && !Auth::check() ){
            

            return redirect('/login');
            
            
             // go to the next middleware
        }
        if(Auth::user()->roles[0]->title == 'Pastor'){
            return $next($request);
            
        }
       else{
           return redirect()->back()->with('error', __('Permission Denied'));
       }
        return $next($request);

        // return redirect('/login');
        
        
        

        if(!Auth::check()){
            return redirect('/login');
            return response()->json([
            'msg' => 'Access Denied ... ',
            'url' => $request->path()
            ], 403);
        }
    }
}
