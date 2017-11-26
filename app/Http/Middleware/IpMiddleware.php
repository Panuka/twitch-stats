<?php

namespace App\Http\Middleware;

use App\IpSecurity;
use Closure;

class IpMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $isAllowed = IpSecurity::getQuery()
            ->where([
                'is_allowed' => true,
                'ip' => $request->ip()
            ])
            ->exists();

        if (!$isAllowed) {
            return response()->json(['error' => 'Permission denied'],403);
        }
        return $next($request);
    }
}
