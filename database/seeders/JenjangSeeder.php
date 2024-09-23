<?php

namespace Database\Seeders;

use App\Models\Jenjang;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JenjangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = Carbon::now();
        Jenjang::insert([
            [
                "title" => "SD",
                "description" => "Sekolah Dasar",
                "created_at" => $now,
                "updated_at" => $now
            ],
            [
                "title" => "SMP",
                "description" => "Sekolah Menengah Pertama",
                "created_at" => $now,
                "updated_at" => $now
            ],
            [
                "title" => "SMA",
                "description" => "Sekolah Menengah Atas",
                "created_at" => $now,
                "updated_at" => $now
            ],

        ]);
    }
}
