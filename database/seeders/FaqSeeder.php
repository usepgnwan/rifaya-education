<?php

namespace Database\Seeders;

use App\Models\Faq;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FaqSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $count = $this->command->ask('Berapa Create faq? ');

        $check = $this->command->confirm('Yakin Create faq?');
        if ($check) {
            Faq::factory()->count($count)->create();
            $this->command->info('sukses buat faq');
        } else {
            $this->command->info('gagal buat faq');
        }
    }
}
