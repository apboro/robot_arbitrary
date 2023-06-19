<?php

namespace App\Interfaces\admin\user;

use App\Http\Requests\Admin\User\StoreRequest;
use App\Models\User;

interface AdminUserInterface
{
    public function index();

    public function create();

    public function store(StoreRequest $request, User $user);

    public function show();

    public function edit();

    public function update();

    public function destroy();
}
