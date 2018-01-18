<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Superuser
{
  public function handle($request, Closure $next)
  {
    if (Auth::check()) {
      return $next($request);
    } else if (Auth::check() == false){
      return redirect()->route('auth.login');
    }
  }
}
