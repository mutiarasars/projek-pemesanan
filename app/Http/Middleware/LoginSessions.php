<?php

namespace App\Http\Middleware;

use Closure;

class LoginSessions
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
      $sess = session()->get("login");
      if (!$sess) {
        return redirect(route("admin"));
      }

      return $next($request);
    }
}
