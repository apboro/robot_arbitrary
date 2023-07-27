<?php

namespace Database\Factories;

use App\Models\GroupUser;
use App\Models\Item;
use App\Models\Truancies;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class TruanciesFactory extends Factory
{
    protected $model = Truancies::class;

    public function definition(): array
    {
        $groupUser = GroupUser::inRandomOrder()->first();

        return [
            'teacher_id' => User::where('role_id', 2)
                ->inRandomOrder()->first()->id,
            'group_id' => $groupUser->group_id,
            'student_id' => $groupUser->user_id,
            'item_id' => Item::pluck('id')->random(),
            'couple' => rand(1,6),
            'count_hours' => rand(1,2),
            'created_at' => $this->faker->dateTimeBetween('-3 days'),
        ];
    }
}
