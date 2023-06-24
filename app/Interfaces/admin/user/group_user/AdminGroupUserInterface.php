<?php

namespace App\Interfaces\admin\user\group_user;

use App\Http\Requests\Admin\User\GroupUser\StoreRequest;
use App\Http\Requests\Admin\User\GroupUser\UpdateRequest;
use App\Models\User;

interface AdminGroupUserInterface
{
    public function store(StoreRequest $request, User $user);
}
