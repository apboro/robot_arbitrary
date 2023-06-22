<?php

namespace App\Interfaces\admin\user;

use App\Http\Requests\Admin\User\StoreRequest;
use App\Http\Requests\Admin\User\UpdateRequest;
use App\Models\User;

interface AdminUserInterface
{
    public function index();

    public function create();

    public function store(StoreRequest $request, User $user);

    public function show(User $user);

    public function edit(User $user);

    public function update(UpdateRequest $request, User $user);

    public function destroy(User $user);
}
