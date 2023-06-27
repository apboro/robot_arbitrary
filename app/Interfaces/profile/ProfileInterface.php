<?php

namespace App\Interfaces\profile;

use App\Http\Requests\Profile\UpdatePasswordRequest;
use App\Http\Requests\Profile\UpdateRequest;

interface ProfileInterface
{
    public function index();

    public function update(UpdateRequest $request);

    public function password(UpdatePasswordRequest $request);
}
