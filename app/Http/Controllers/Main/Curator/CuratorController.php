<?php

namespace App\Http\Controllers\Main\Curator;

use App\Http\Controllers\Controller;
use App\Models\Group;
use App\Models\Item;
use App\Models\User;

class CuratorController extends Controller
{
    public function index($students = null)
    {
        $user = auth()->user();
        $groups = $user->teams;

        return view('curator.index', compact('groups'));
    }
}
