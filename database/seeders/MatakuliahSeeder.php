<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Matakuliah;

class MatakuliahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Matakuliah::insert([
            [
                'kode' => 'IF101',
                'nama' => 'Algoritma dan Pemrograman',
                'sks' => 3,
                'prodi_id' => 1, // ganti sesuai id prodi yang ada
                'dosen_id' => 1, // ganti sesuai id dosen yang ada
            ],
            [
                'kode' => 'IF102',
                'nama' => 'Basis Data',
                'sks' => 3,
                'prodi_id' => 1,
                'dosen_id' => 2,
            ],
            [
                'kode' => 'IF103',
                'nama' => 'Struktur Data',
                'sks' => 3,
                'prodi_id' => 1,
                'dosen_id' => 1,
            ],
        ]);
    }
}
