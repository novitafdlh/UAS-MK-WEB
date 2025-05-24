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
        ];

        foreach ($data as $jurusan) {
            Jurusan::create($jurusan);
        }
    }
}
