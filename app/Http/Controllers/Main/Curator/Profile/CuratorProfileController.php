<?php

namespace App\Http\Controllers\Main\Curator\Profile;

use App\Http\Controllers\Controller;
use App\Http\Requests\Curator\Student\StoreRequest;
use App\Models\Group;
use App\Models\Item;
use App\Models\User;

class CuratorProfileController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $groups = $user->teams;


        return view('curator.profile.index', compact('groups'));
    }
}
