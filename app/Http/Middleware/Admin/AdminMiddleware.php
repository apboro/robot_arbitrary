<?php

namespace App\Http\Middleware\Admin;

use App\Enums\Role;
use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response) $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if ((int)auth()->user()->role->id !== Role::ROLE_ADMIN->value) {
            abort(404);
        }
        return $next($request);
    }
}
