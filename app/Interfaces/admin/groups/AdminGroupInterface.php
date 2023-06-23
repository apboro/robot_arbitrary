<?php

namespace App\Interfaces\admin\groups;

use App\Http\Requests\Admin\Group\StoreRequest;
use App\Http\Requests\Admin\Group\UpdateRequest;
use App\Models\Group;

interface AdminGroupInterface
{
    public function index();

    public function create();

    public function store(StoreRequest $request, Group $group);

    public function show(Group $group);

    public function edit(Group $group);

    public function update(UpdateRequest $request, Group $group);

    public function destroy(Group $group);
}
