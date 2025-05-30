<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Jurusan;

class JurusanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['nama' => 'Teknologi Informasi'],
            ['nama' => 'Kesehatan Masyarakat'],
            ['nama' => 'Teknik Elektro'],
            ['nama' => 'Teknik Sipil'],
            ['nama' => 'Teknik Mesin'],
            ['nama' => 'Manajemen'],
            ['nama' => 'Akuntansi'],
            ['nama' => 'Ilmu Hukum'],
            ['nama' => 'Pendidikan Bahasa Inggris'],
            ['nama' => 'Pendidikan Matematika'],
        ];

        foreach ($data as $jurusan) {
            Jurusan::create($jurusan);
        }
    }
}