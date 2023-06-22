<?php

namespace App\Http\Controllers\Main\Admin\Role;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Role\StoreRequest;
use App\Http\Requests\Admin\Role\UpdateRequest;
use App\Interfaces\admin\role\AdminRoleInterface;
use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller implements AdminRoleInterface
{

    public function index()
    {
        $roles = Role::all()->sortBy('id');
        return view('admin.role.index', compact('roles'));
    }

    public function create()
    {
        return view('admin.role.create');
    }

    public function store(StoreRequest $request, Role $role)
    {
        $data = $request->validated();
        Role::firstOrCreate(['title' => $data['title']], $data);

        return redirect()->route('admin.role.index');
    }

    public function edit(Role $role)
    {
        return view('admin.role.edit', compact('role'));
    }

    public function update(UpdateRequest $request, Role $role)
    {
        $data = $request->validated();
        $role->update($data);

        return redirect()->route('admin.role.edit', compact('role'));
    }

    public function destroy(Role $role)
    {
        $role->delete();
        return redirect()->route('admin.role.index');
    }
}
