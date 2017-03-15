<?php

namespace App\Http\Middleware;

use Closure;

class Permission
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

      foreach (auth()->user()->roles as $role) {
        foreach ($role->links as $link) {
          if($link->name == $request->route()->getName())
          {
           return $next($request);
          }

          }
          return redirect('admin/admin');
        }
      }
}
