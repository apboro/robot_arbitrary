<?php

namespace App\Http\Controllers\Main\Admin\GroupUser;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\GroupUser\StoreRequest;
use App\Http\Requests\Admin\GroupUser\UpdateRequest;
use App\Interfaces\admin\group_user\AdminGroupUserInterface;
use App\Models\User;

class AdminGroupUserController extends Controller implements AdminGroupUserInterface
{
    public function store(StoreRequest $request, User $user)
    {
        // TODO: Implement store() method.
    }

    public function update(UpdateRequest $request, User $user)
    {
        // TODO: Implement update() method.
    }
}
