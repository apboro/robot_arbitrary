<?php

namespace App\Http\Controllers\Main\Admin\Group;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Group\StoreRequest;
use App\Http\Requests\Admin\Group\UpdateRequest;
use App\Interfaces\admin\groups\AdminGroupInterface;
use App\Models\Group;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AdminGroupController extends Controller implements AdminGroupInterface
{
    public function index()
    {
        $groupCount = Group::all()->count();
        $groups = Group::all()->sortBy('id');
        return view('admin.group.index', compact('groups', 'groupCount'));
    }

    public function create()
    {
        return view('admin.group.create');
    }

    public function store(StoreRequest $request, Group $group)
    {
        $data = $request->validated();
        Group::firstOrCreate(['title' => $data['title']], $data);

        return redirect()->route('admin.group.index');
    }

    public function show(Group $group)
    {
        $students = $group->students;
        $dateCreated = Carbon::parse($group->created_at);
        return view('admin.group.show', compact('group', 'dateCreated', 'students'));
    }

    public function edit(Group $group)
    {
        return view('admin.group.edit', compact('group'));
    }

    public function update(UpdateRequest $request, Group $group)
    {
        $data = $request->validated();
        $group->update($data);

        return redirect()->route('admin.group.edit', compact('group'));
    }

    public function destroy(Group $group)
    {
        $group->delete();
        return redirect()->route('admin.group.index');
    }
}
