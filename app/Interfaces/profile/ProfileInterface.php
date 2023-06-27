<?php

namespace App\Interfaces\profile;

use App\Http\Requests\Profile\UpdatePasswordRequest;
use App\Http\Requests\Profile\UpdateRequest;
use App\Models\User;

interface ProfileInterface
{
    public function index();

    public function update(UpdateRequest $request, User $user);

    public function password(UpdatePasswordRequest $request, User $user);
}
