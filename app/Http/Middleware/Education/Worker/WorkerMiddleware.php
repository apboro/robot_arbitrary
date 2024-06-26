<?php

namespace App\Http\Middleware\Education\Worker;

use App\Enums\Role;
use App\Enums\Status;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class WorkerMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        if ((int)auth()->user()->role->id !== Role::ROLE_EDUCATIONAL_PART->value) {
            abort(Status::FORBIDDEN->value);
        }
        return $next($request);
    }
}
