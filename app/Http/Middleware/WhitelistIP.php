<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class WhitelistIP
{
    /**
     * The function checks if the IP address of the request is in the list of allowed IP addresses and
     * returns the next middleware if it is, otherwise it aborts the request with a 403 error.
     *
     * @param Request request The  parameter is an instance of the Request class, which
     * represents the HTTP request made to the server. It contains information about the request such
     * as the request method, headers, query parameters, and request body.
     * @param Closure next The `` parameter is a closure that represents the next middleware or
     * the final route handler in the middleware stack. It is responsible for passing the request to
     * the next middleware or the final route handler.
     *
     * @return If the IP address of the request is in the array of allowed IP addresses, the function
     * will return the result of the `()` closure, which means it will continue to the
     * next middleware or the controller action. If the IP address is not in the array, the function
     * will abort the request with a 403 status code and the message "Unauthorized IP address."
     */
    public function handle(Request $request, Closure $next)
    {
        $allowed_ips = [ //paystack ips
            '52.31.139.75',
            '52.49.173.169',
            '52.214.14.220'
        ];
        $ip = $request->ip();

        if (in_array($ip, $allowed_ips)) {
            return $next($request);
        }

        abort(403, 'Unauthorized IP address.');
    }
}
