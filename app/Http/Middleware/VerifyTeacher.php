<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class VerifyTeacher
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  $role
     * @return mixed
     */
    public function handle($request, Closure $next, $type = 1)
    {
        $type = (int) $type;
        $user = Auth::user();
        if(!$user->teacher) {
            return redirect()->route('portal_inicio');
        }

        if($user->teacher->type < $type) {
            return redirect()->route('portal_inicio');
        }
        return $next($request);
    }
}