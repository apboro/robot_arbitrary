<?php

namespace App\Http\Controllers\Main\Claim;

use App\Enums\Role;
use App\Http\Controllers\Controller;
use App\Models\User;

class ClaimController extends Controller
{
    public function index()
    {
        $users = User::where('role_id', Role::ROLE_STUDENT)->get();
        return view('claim.index', compact('users'));
    }

    public function show(User $user)
    {
        return view('claim.show', compact('user'));
    }
}
