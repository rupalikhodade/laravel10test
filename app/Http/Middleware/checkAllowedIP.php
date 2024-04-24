<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class checkAllowedIP
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
    {
        // Define allowed IPs
        $allowedIPs = ['192.168.1.1', '10.0.0.1','127.0.0.1'];
        //$allowedIPs = ['192.168.1.1', '10.0.0.1'];

        // Get the client's IP address
        $clientIP = $request->ip();

        // Check if the client's IP is allowed or not
        if (!in_array($clientIP, $allowedIPs)) {
            abort(403, 'Unauthorized! you can not access this page.'); // Return a 403 Forbidden response
        }

        return $next($request);
    }
}
