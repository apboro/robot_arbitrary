<?php

namespace App\Http\Controllers\Main\Admin\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\User\StoreRequest;
use App\Http\Requests\Admin\User\UpdateRequest;
use App\Interfaces\admin\user\AdminUserInterface;
use App\Models\Role;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class AdminUserController extends Controller implements AdminUserInterface
{

    public function index()
    {
        $users = User::all()->sortBy('role_id');
        return view('admin.user.index', compact('users'));
    }

    public function create()
    {
        $roles = Role::all()->sortBy('id');
        return view('admin.user.create', compact('roles'));
    }

    public function store(StoreRequest $request, User $user)
    {
        $data = $request->validated();
        $data['password'] = Hash::make($data['password']);
        User::firstOrCreate(['login' => $data['login']], $data);

        return redirect()->route('admin.user.index');
    }

    public function show(User $user)
    {
        $dateCreated = Carbon::parse($user->created_at);
        return view('admin.user.show', compact('user', 'dateCreated'));
    }

    public function edit(User $user)
    {
        return view('admin.user.edit', compact('user'));
    }

    public function update(UpdateRequest $request, User $user)
    {
        $data = $request->validated();
        $user->update($data);

        return redirect()->route('admin.user.edit', compact('user'));
    }

    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('admin.user.index');
    }

    private function getWords(string $surname, string $name): string
    {
        return strtoupper($surname[0]) . strtoupper($name[0]);
    }
}
