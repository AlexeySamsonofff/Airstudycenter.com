<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use App\UserRole;
use App\Role;

class AccommodationAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
          //return $next($request);
       $user_id = Auth::user()->id; 
       $getrole = UserRole::where('user_id', $user_id)->first();
       if($getrole){
                  $role_id = $getrole->role_id;
                  $role = Role::where('id', $role_id)->first();
                  $role = $role->name;
             }
    if (Auth::check() && $role == 'Accommodation Admin') {
        return $next($request);
    }
    elseif (Auth::check() && $role == 'Super Admin') {

        return redirect('/You are Not Accommodation Admin');

        //return "You are Not School Admin";
    }
     elseif (Auth::check() && $role == 'School Admin') {

        return redirect('/You are Not Accommodation Admin');
        
        //return "You are Not School Admin";
    }
    else {
        return new Response(view('auth.login'));
    }
    }
}
