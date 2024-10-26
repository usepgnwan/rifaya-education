<?php

namespace Database\Seeders;

use App\Models\MataPelajaran;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MataPelajaranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = Carbon::now();

        MataPelajaran::insert([
            [
                "title" => "Matematika",
                "created_at" => $now,
                "updated_at" => $now
            ],
            [
                "title" => "IPA",
                "created_at" => $now,
                "updated_at" => $now
            ],
            [
                "title" => "Desain Canva",
                "created_at" => $now,
                "updated_at" => $now
            ]
        ]);
    }
}
