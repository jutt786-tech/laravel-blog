<?php

namespace App\Http\Middleware;

use App\User;
use Closure;

class VerifyRole
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
        $roles=auth()->user()->roles()->get();

        foreach ($roles as $role){
            if ($role->name=='admin'){
            return redirect(route('admin.index'));
        }else{
            return redirect(route('user.index'));
        }

        }
       return $next($request);


    }
}
