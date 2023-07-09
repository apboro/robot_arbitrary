<?php

namespace App\Http\Middleware\Admin;

use App\Enums\Role;
use App\Enums\Status;
use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        if ((int)auth()->user()->role->id !== Role::ROLE_ADMIN->value) {
            abort(Status::FORBIDDEN->value);
        }
        return $next($request);
    }
}
