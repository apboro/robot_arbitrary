<?php

namespace App\Http\Controllers\Main\Admin\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\User\StoreRequest;
use App\Interfaces\admin\user\AdminUserInterface;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminUserController extends Controller implements AdminUserInterface
{

    public function index()
    {
        $users = User::all();
        return view('admin.user.index', compact('users'));
    }

    public function create()
    {
        return view('admin.user.create');
    }

    public function store(StoreRequest $request, User $user)
    {
        $data = $request->validated();
        $data['password'] = Hash::make($data['password']);
        User::firstOrCreate(['login' => $data['login'], 'email' => $data['email']], $data);

        return redirect()->route('admin.user.index');
    }

    public function show()
    {
        // TODO: Implement show() method.
    }

    public function edit()
    {
        // TODO: Implement edit() method.
    }

    public function update()
    {
        // TODO: Implement update() method.
    }

    public function destroy()
    {
        // TODO: Implement destroy() method.
    }

    private function getWords(string $surname, string $name): string
    {
        return strtoupper($surname[0]) . strtoupper($name[0]);
    }
}
