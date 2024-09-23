<?php

namespace Database\Seeders;

use App\Models\Testimoni;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TestimoniSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $count = $this->command->ask('Berapa Create testimoni? ');

        $check = $this->command->confirm('Yakin Create testimoni?');
        if ($check) {
            Testimoni::factory()->count($count)->create();
            $this->command->info('sukses buat testimoni');
        } else {
            $this->command->info('gagal buat testimoni');
        }
    }
}
