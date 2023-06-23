<?php

namespace App\Http\Controllers\Main\Admin\User\Password;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\User\Password\UpdateRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminPasswordUserController extends Controller
{
    public function edit(User $user)
    {
        return view('admin.user.password.edit', compact('user'));
    }

    public function update(UpdateRequest $request, User $user)
    {
        $data = $request->validated();
        $data['password'] = Hash::make($data['password']);
        $user->update($data);

        return redirect()->route('admin.user.password.edit', compact('user'));
    }
}
