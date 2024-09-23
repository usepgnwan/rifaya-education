<?php

namespace Database\Seeders;

use App\Models\category;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = Carbon::now();

        Category::insert([
            [
                "title" => "Artikel",
                "created_at" => $now,
                "updated_at" => $now
            ],
            [
                "title" => "Tryout",
                "created_at" => $now,
                "updated_at" => $now
            ],
            [
                "title" => "Kelas Intensif",
                "created_at" => $now,
                "updated_at" => $now
            ]
        ]);
    }
}
