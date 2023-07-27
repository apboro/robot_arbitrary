<?php

namespace Database\Seeders;

use App\Models\Group;
use App\Models\GroupUser;
use App\Models\Item;
use App\Models\Truancies;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    use WithFaker;
    protected array $seeders = [
        RolesSeeder::class,
    ];
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        foreach ($this->seeders as $seederClass) {

            /** @var GenericSeeder $seeder */
            $seeder = $this->container->make($seederClass);

            $seeder->run();
        }

        User::create([
            'surname' => 'Admin',
            'name' =>'Admin',
            'middleName' => 'Admin',
            'login' => 'admin',
            'password' => Hash::make('admin'),
            'email_verified_at' => Carbon::now(),
            'remember_token' => Str::random(10),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'role_id' => 1,
        ]);
        User::factory()->count(50)->create();
        Group::factory()->count(5)->create();
        Item::factory()->count(6)->create();

        $users = User::where('role_id', 3)->get();
        foreach ($users as $user) {
            GroupUser::create([
                'user_id' => $user->id,
                'group_id' => Group::pluck('id')->random(),
            ]);
        }
    }
}
