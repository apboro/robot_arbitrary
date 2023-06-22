<?php

namespace App\Interfaces\admin\role;

use App\Http\Requests\Admin\Role\StoreRequest;
use App\Http\Requests\Admin\Role\UpdateRequest;
use App\Models\Role;

interface AdminRoleInterface
{
    public function index();

    public function create();

    public function store(StoreRequest $request, Role $role);

    public function edit(Role $role);

    public function update(UpdateRequest $request, Role $role);

    public function destroy(Role $role);
}
