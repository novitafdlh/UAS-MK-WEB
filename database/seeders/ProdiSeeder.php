<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Prodi;

class ProdiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            // 1. Teknologi Informasi
            ['nama' => 'Sistem Informasi', 'jurusan_id' => 1],
            ['nama' => 'Teknik Informatika', 'jurusan_id' => 1],

            // 2. Kesehatan Masyarakat
            ['nama' => 'Promosi Kesehatan', 'jurusan_id' => 2],
            ['nama' => 'Kesehatan Lingkungan', 'jurusan_id' => 2],

            // 3. Teknik Elektro
            ['nama' => 'Teknik Tenaga Listrik', 'jurusan_id' => 3],
            ['nama' => 'Teknik Telekomunikasi', 'jurusan_id' => 3],

            // 4. Teknik Sipil
            ['nama' => 'Teknik Konstruksi', 'jurusan_id' => 4],
            ['nama' => 'Teknik Transportasi', 'jurusan_id' => 4],

            // 5. Teknik Mesin
            ['nama' => 'Teknik Otomotif', 'jurusan_id' => 5],
            ['nama' => 'Teknik Perkapalan', 'jurusan_id' => 5],

            // 6. Manajemen
            ['nama' => 'Manajemen Sumber Daya Manusia', 'jurusan_id' => 6],
            ['nama' => 'Manajemen Keuangan', 'jurusan_id' => 6],

            // 7. Akuntansi
            ['nama' => 'Akuntansi Keuangan', 'jurusan_id' => 7],
            ['nama' => 'Akuntansi Perpajakan', 'jurusan_id' => 7],

            // 8. Ilmu Hukum
            ['nama' => 'Hukum Perdata', 'jurusan_id' => 8],
            ['nama' => 'Hukum Pidana', 'jurusan_id' => 8],

            // 9. Pendidikan Bahasa Inggris
            ['nama' => 'Sastra Inggris', 'jurusan_id' => 9],
            ['nama' => 'Pendidikan Bahasa Inggris', 'jurusan_id' => 9],

            // 10. Pendidikan Matematika
            ['nama' => 'Matematika Murni', 'jurusan_id' => 10],
            ['nama' => 'Pendidikan Matematika', 'jurusan_id' => 10],
        ];

        foreach ($data as $prodi) {
            Prodi::create($prodi);
        }
    }
}