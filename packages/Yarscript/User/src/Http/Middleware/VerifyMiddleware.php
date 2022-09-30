<?php


namespace Yarscript\User\Http\Middleware;


use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * Class VerifyMiddleware
 * @package Yarscript\User\Http\Middleware
 */
class VerifyMiddleware
{
    /**
     * @var array|string[]
     */
    protected array $except = [
        'project.invite.accept'
    ];

    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure $next
     * @param string|null $guard
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $guard = 'api')
    {
        if (!$this->isRouteExcepted($request)) {

            if (!Auth::guard($guard)->check()) {
                return response()->json(['message' => 'Unauthorized'], 401);
            }

            if (empty(Auth::guard($guard)->user()->email_verified_at)) {
                Auth::guard($guard)->logout();

                return response()->json(['error' => 'Email is not verified'], 403);
            }
        }

        return $next($request);
    }

    /**
     * @param Request $request
     * @return bool
     */
    protected function isRouteExcepted(Request $request): bool
    {
//        foreach ($this->except as $except) {
//            $except = $except !== '/' ? trim($except, '/') : $except;
//
//            if ($request->is($except)) {
//                return true;
//            }
//        }
//
//        return false;

        return in_array($request->route()->getName(), $this->except);
    }
}
