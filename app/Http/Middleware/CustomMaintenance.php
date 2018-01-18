<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\ConfigModel;

class CustomMaintenance
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
        $data['config'] = ConfigModel::findOrFail(1);
        if ($data['config']->maintenance == 'enable' && !$request->is(['auth', 'auth/*', 'superuser', 'superuser/*'])){
            return response()->view('errors.503', $data, 503);
        } else {
            return $next($request);
        }
    }
}
