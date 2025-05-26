<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Gambar;

class GambarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Gambar::create([
        'nama_file' => 'contoh1.jpg',
        'tipe_proses' => 'grayscale',
    ]);

    Gambar::create([
        'nama_file' => 'contoh2.jpg',
        'tipe_proses' => 'biner',
    ]);

    Gambar::create([
        'nama_file' => 'contoh3.jpg',
        'tipe_proses' => 'negatif',
    ]);
    }
}
