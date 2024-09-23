<?php

namespace Database\Seeders;

use App\Models\Role;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = Carbon::now();
        Role::insert([
            [
                "title" => "Administrator",
                "created_at" => $now,
                "updated_at" => $now
            ],
            [
                "title" => "Tutor Guru",
                "created_at" => $now,
                "updated_at" => $now
            ],
            [
                "title" => "Siswa",
                "created_at" => $now,
                "updated_at" => $now
            ],
            [
                "title" => "Contributor",
                "created_at" => $now,
                "updated_at" => $now
            ],
        ]);
    }
}
