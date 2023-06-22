<?php

namespace App\Http\Controllers\Main\Admin\User\Role;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\User\Role\UpdateRequest;
use App\Models\Role;
use App\Models\User;

class AdminUserRoleController extends Controller
{
    public function edit(User $user)
    {
        $roles = Role::all()->sortBy('id');
        return view('admin.user.role.edit', compact('user', 'roles'));
    }

    public function update(UpdateRequest $request, User $user)
    {
        $data = $request->validated();
        $user->update($data);

        return redirect()->route('admin.user.role.edit', compact('user'));
    }
}
