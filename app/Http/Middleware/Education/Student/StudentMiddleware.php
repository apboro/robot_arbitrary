<?php

namespace App\Http\Middleware\Education\Student;

use App\Enums\Role;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class StudentMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        if ((int)auth()->user()->role->id !== Role::ROLE_STUDENT->value) {
            abort(404);
        }
        return $next($request);
    }
}
