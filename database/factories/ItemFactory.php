<?php

namespace Database\Factories;

use App\Models\Item;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class ItemFactory extends Factory
{
    protected $model = Item::class;

    public function definition(): array
    {
        return [
            'title' => $this->faker->unique()->randomElement([
                'Математика',
                'Акробатика',
                'Фехтование',
                'Стрельба',
                'Анатомия',
                'Статистика',
                'Философия',
                'Рисование',
                'Красноречие']),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
