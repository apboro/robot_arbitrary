<?php

namespace App\Http\Controllers\Main\Admin\User\GroupUser;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\User\GroupUser\StoreRequest;
use App\Http\Requests\Admin\User\GroupUser\UpdateRequest;
use App\Interfaces\admin\user\group_user\AdminGroupUserInterface;
use App\Models\GroupUser;
use App\Models\User;

class AdminGroupUserController extends Controller implements AdminGroupUserInterface
{
    public function store(StoreRequest $request, User $user)
    {
        $data = $request->validated();
        GroupUser::firstOrCreate(['user_id' => $data['user_id']], $data);
        return redirect()->route('admin.user.show', compact('user'));
    }

    public function update(UpdateRequest $request, User $user)
    {
        // TODO: Implement update() method.
    }
}
