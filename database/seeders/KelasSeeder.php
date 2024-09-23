<?php

namespace Database\Seeders;

use App\Models\Kelas;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KelasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = Carbon::now();
        Kelas::insert([
            [
                "title" => "I",
                "jenjang_id" => 1,
                "created_at" => $now,
                "updated_at" => $now
            ],
            [
                "title" => "II",
                "jenjang_id" => 1,
                "created_at" => $now,
                "updated_at" => $now
            ],
            [
                "title" => "III",
                "jenjang_id" => 1,
                "created_at" => $now,
                "updated_at" => $now
            ],
            [
                "title" => "IV",
                "jenjang_id" => 1,
                "created_at" => $now,
                "updated_at" => $now
            ],
            [
                "title" => "V",
                "jenjang_id" => 1,
                "created_at" => $now,
                "updated_at" => $now
            ],
            [
                "title" => "VI",
                "jenjang_id" => 1,
                "created_at" => $now,
                "updated_at" => $now
            ],
            [
                "title" => "VII",
                "jenjang_id" => 2,
                "created_at" => $now,
                "updated_at" => $now
            ],
            [
                "title" => "VIII",
                "jenjang_id" => 2,
                "created_at" => $now,
                "updated_at" => $now
            ],
            [
                "title" => "IX",
                "jenjang_id" => 2,
                "created_at" => $now,
                "updated_at" => $now
            ],
            [
                "title" => "X",
                "jenjang_id" => 3,
                "created_at" => $now,
                "updated_at" => $now
            ],
            [
                "title" => "XI",
                "jenjang_id" => 3,
                "created_at" => $now,
                "updated_at" => $now
            ],
            [
                "title" => "XII",
                "jenjang_id" => 3,
                "created_at" => $now,
                "updated_at" => $now
            ],

        ]);
    }
}
