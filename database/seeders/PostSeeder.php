<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $count = $this->command->ask('Berapa Create post? ');

        $check = $this->command->confirm('Yakin Create post?');
        if ($check) {
            Post::factory()->count($count)->create();
            $this->command->info('sukses buat post');
        } else {
            $this->command->info('gagal buat post');
        }
    }
}
