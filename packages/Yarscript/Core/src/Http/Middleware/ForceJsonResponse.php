<?php

namespace Yarscript\Core\Http\Middleware;

use Closure;

/**
 * Class ForceJsonResponse
 * @package Yarscript\Core\Http\Middleware
 */
class ForceJsonResponse
{
    /**
     * @param $request
     * @param Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $request->headers->set('Accept', 'application/json');
        return $next($request);
    }
}
