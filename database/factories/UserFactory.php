<?php

namespace Database\Factories;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    protected $model = User::class;



    public function definition(): array
    {
        return [
            'surname' => $this->faker->lastName(),
            'name' => $this->faker->firstName(),
            'middleName' => $this->faker->firstName(),
            'login' => $this->faker->unique()->userName(),
            'password' => bcrypt($this->faker->password()),
            'email_verified_at' => Carbon::now(),
            'remember_token' => Str::random(10),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'role_id' => $this->faker->biasedNumberBetween(2,3),
        ];
    }
}
