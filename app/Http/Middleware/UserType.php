<?php

namespace App\Http\Middleware;

use Closure;

class UserType
{

    /**
     * Middleware para ver por tipo de usuario
     *
     * @param $request
     * @param callable|Closure $next
     * @param $type
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function handle($request, Closure $next, $type)
    {
        if ($request->user()->user_type != $type) {
            if ($request->ajax()) {
                return response('Unauthorized.', 401);
            } else {
                return redirect()->guest('/');
            }
        }

        return $next($request);
    }
}
