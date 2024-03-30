<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Cache;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class RateLimitAndSessionManagement
{
    public function handle(Request $request, Closure $next)
    {
        $ipAddress = $request->ip();
        $requestCount = Session::get('request_count_' . $ipAddress);
        $maxRequests = 1;
        $expiry = 1; 
        if ($requestCount >= $maxRequests) {
            Session::put('request_count_' . $ipAddress, $requestCount + 1);
        }else{
            Session::put('request_count_' . $ipAddress, 1);   
        }
    
        
        return $next($request);

    }

}
