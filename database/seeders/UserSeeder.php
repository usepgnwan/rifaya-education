<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $count = $this->command->ask('Berapa Create user? ');

        $check = $this->command->confirm('Yakin Create user?');
        if ($check) {
            User::factory(10)->create()->each(function ($user) {
                // Get random roles
                $roles = Role::inRandomOrder()->take(rand(1, 3))->pluck('id');
                // Assign roles to the user
                $user->roles()->attach($roles);
            });
        } else {
            $this->command->info('gagal buat user');
        }


    }
}
