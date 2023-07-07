<?php

namespace App\Http\Middleware\Education\Worker;

use App\Enums\Role;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class WorkerMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        if ((int)auth()->user()->role->id !== Role::ROLE_EDUCATIONAL_PART->value) {
            abort(404);
        }
        return $next($request);
    }
}
