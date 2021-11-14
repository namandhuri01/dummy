<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;

class CheckUserRole
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
        // $this->authenticate($request, $guards);

        if ($request->is('api/*') ) {
            return $next($request);
        }
        $is_admin_url = $request->is('admin/*');
        $is_teacher_url = $request->is('college/*');

        // url is for admin but user is not admin then redirect to user dashboard
        if($is_admin_url && !in_array(Auth::user()->role_id, [1,2,3]) ) {
            return redirect(RouteServiceProvider::HOME);
        }

        // url is for student, but a logged in user is admin then redirect admin to his dashboard
        if(!$is_admin_url && in_array(Auth::user()->role_id, [1,2,3])) {
            return redirect(RouteServiceProvider::ADMIN_HOME);
        }
        if($is_teacher_url && !in_array(Auth::user()->role_id, [5]) ) {
            return redirect(RouteServiceProvider::HOME);
        }
        if(!$is_teacher_url && in_array(Auth::user()->role_id, [5])) {
            return redirect(RouteServiceProvider::COLLEGE_HOME);
        }
        // redirectig user to intended url
        return $next($request);
    }
}
