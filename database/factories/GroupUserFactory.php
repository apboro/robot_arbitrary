<?php

namespace Database\Factories;

use App\Models\Group;
use App\Models\GroupUser;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class GroupUserFactory extends Factory
{

    public function definition(): array
    {
        $users = User::where('role_id', 3)->get();
        foreach ($users as $user) {
            return [
                'user_id' => $user->id,
                'group_id' => Group::pluck('id')->random(),
            ];
        }
    }
}
