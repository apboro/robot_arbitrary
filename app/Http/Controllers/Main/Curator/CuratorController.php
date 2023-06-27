<?php

namespace App\Http\Controllers\Main\Curator;

use App\Http\Controllers\Controller;
use App\Models\Group;
use App\Models\Item;
use App\Models\User;

class CuratorController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $groups = $user->teams;

        return view('curator.index', compact('groups'));
    }

    public function show(User $user)
    {
        return view('curator.show', compact('user'));
    }
}
