<?php

namespace App\Http\Middleware\Truancy;

use App\Enums\Role;
use App\Enums\Status;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TruancyMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        if ((int)auth()->user()->role->id === Role::ROLE_STUDENT->value) {
            abort(Status::FORBIDDEN->value);
        }
        return $next($request);
    }
}
