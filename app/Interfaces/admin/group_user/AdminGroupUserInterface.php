<?php

namespace App\Interfaces\admin\group_user;

use App\Http\Requests\Admin\GroupUser\StoreRequest;
use App\Http\Requests\Admin\GroupUser\UpdateRequest;
use App\Models\User;

interface AdminGroupUserInterface
{
    public function store(StoreRequest $request, User $user);

    public function update(UpdateRequest $request, User $user);
}
