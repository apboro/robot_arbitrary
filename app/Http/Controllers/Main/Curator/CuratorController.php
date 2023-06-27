<?php

namespace App\Http\Controllers\Main\Curator;

use App\Http\Controllers\Controller;
use App\Http\Requests\Curator\Student\StoreRequest;
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
        $groups = $user->groups;
        return view('curator.show', compact('user', 'groups'));
    }

    public function destroy(StoreRequest $request, User $user)
    {
        $data = $request->validated();
        $user->groups()->toggle([$data['group_id']]);

        return redirect()->route('curator.index');
    }
}
