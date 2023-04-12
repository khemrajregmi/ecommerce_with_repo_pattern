<?php

namespace Kerung\Http\Middleware;

use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use Closure;
use Redirect;
use Notify;

class PermissionMiddleWare
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
        $user = Sentinel::findUserById(Sentinel::getUser()->id);
        $action = $request->route()->getName();
        if($user->hasAccess('admin')){
            return $next($request);
        }
        else if($user->hasAccess($action)){
            return $next($request);
        }
        else {
            Notify::error('Permission Denied . Please Contact your Admin.');
            return Redirect::route('admin.dashboard.index');
        }
    }
}
