<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class CekLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, $roles)
    {   
        if(auth()->user()->roles_id == $roles){
            return $next($request);
        // if (!Auth::check()) {
        //     return redirect('login');
        }
        $user = Auth::user();

        if($user->role == $roles)
            return $next($request); 
        return response()->json(['You do not have permission to access for this page.']);
        // return redirect('login')->with('error',"Kamu Tidak Punya Akses");
    }
}
