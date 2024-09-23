<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Materi;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MateriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = Carbon::now();
        Materi::insert([
            [
                "title" => "Himpunan",
                "kelas_id" => 9,
                "created_at" => $now,
                "updated_at" => $now
            ],
            [
                "title" => "Limit",
                "kelas_id" => 9,
                "created_at" => $now,
                "updated_at" => $now
            ],
            [
                "title" => "Logaritma",
                "kelas_id" => 9,
                "created_at" => $now,
                "updated_at" => $now
            ],

        ]);
    }
}
