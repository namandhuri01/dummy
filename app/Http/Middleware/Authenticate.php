<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Auth;
use Closure;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
            if ($request->is('admin/*')) {
                return route('admin.login');
            }
            return route('login');
        }
    }

    public function handle($request, Closure $next, ...$guards)
    {
        $this->authenticate($request, $guards);

        if ($request->is('api/*') ) {
            return $next($request);
        }
        $is_admin_url = $request->is('admin/*');
        $is_college_url = $request->is('teacher/*');

        // url is for admin but user is not admin then redirect to user dashboard
        if($is_admin_url && !in_array(Auth::user()->role_id, [1,2,3]) ) {
            return redirect(RouteServiceProvider::HOME);
        }

        // url is for student, but a logged in user is admin then redirect admin to his dashboard
        if(!$is_admin_url && in_array(Auth::user()->role_id, [1,2,3])) {
            return redirect(RouteServiceProvider::ADMIN_HOME);
        }
        if($is_college_url && !in_array(Auth::user()->role_id, [5]) ) {
            return redirect(RouteServiceProvider::HOME);
        }
        if(!$is_college_url && in_array(Auth::user()->role_id, [5])) {
            return redirect(RouteServiceProvider::TEACHER_HOME);
        }
        // redirectig user to intended url
        return $next($request);
    }
}
