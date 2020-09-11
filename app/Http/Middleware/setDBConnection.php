<?php
namespace App\Http\Middleware;

use Closure;

class SetDBConnection
{
    public function handle($request, Closure $next)
    {
        if (session('societe')) {
            config(['database.connections.mysql.database' => session('societe')]);
        }

        return $next($request);
    }
}