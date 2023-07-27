<?php

namespace Database\Seeders;

use App\Models\Role;
use Database\Seeders\GenericSeeder;

class RolesSeeder extends GenericSeeder
{
    protected array $data = [
        Role::class => [
            Role::Admin => ['title' => 'Admin12'],
            Role::Teacher => ['title' => 'Teacher'],
            Role::Student => ['title' => 'Student'],
            Role::Curator => ['title' => 'Curator'],
            Role::Robot => ['title' => 'Robot'],
            Role::Educational_part => ['title' => 'Educational_part'],
        ]
    ];
}
