<?php

namespace App\Http\Controllers\Main\Admin\Group;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Group\StoreRequest;
use App\Http\Requests\Admin\Group\UpdateRequest;
use App\Interfaces\admin\groups\AdminGroupInterface;
use App\Models\Group;
use App\Models\Specialization;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AdminGroupController extends Controller implements AdminGroupInterface
{
    public function index()
    {
        $groupCount = Group::all()->count();
        $groups = Group::all()->sortBy('title');
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
        $specializations = Specialization::all()->sortBy('id');
        $groupSpecializations = $group->specializations;
        $students = $group->students;
        $dateCreated = Carbon::parse($group->created_at);
        return view('admin.group.show', compact('group', 'dateCreated', 'students', 'specializations', 'groupSpecializations'));
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
