<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Matakuliah;

class MatakuliahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            // Prodi 1: Sistem Informasi (jurusan_id 1, prodi_id 1)
            ['kode' => 'SI101', 'nama' => 'Pengantar Sistem Informasi', 'sks' => 3, 'jurusan_id' => 1, 'prodi_id' => 1],
            ['kode' => 'SI102', 'nama' => 'Basis Data', 'sks' => 3, 'jurusan_id' => 1, 'prodi_id' => 1],

            // Prodi 2: Teknik Informatika (jurusan_id 1, prodi_id 2)
            ['kode' => 'TI101', 'nama' => 'Algoritma dan Pemrograman', 'sks' => 3, 'jurusan_id' => 1, 'prodi_id' => 2],
            ['kode' => 'TI102', 'nama' => 'Struktur Data', 'sks' => 3, 'jurusan_id' => 1, 'prodi_id' => 2],

            // Prodi 3: Promosi Kesehatan (jurusan_id 2, prodi_id 3)
            ['kode' => 'PK101', 'nama' => 'Dasar Promosi Kesehatan', 'sks' => 2, 'jurusan_id' => 2, 'prodi_id' => 3],
            ['kode' => 'PK102', 'nama' => 'Komunikasi Kesehatan', 'sks' => 2, 'jurusan_id' => 2, 'prodi_id' => 3],

            // Prodi 4: Kesehatan Lingkungan (jurusan_id 2, prodi_id 4)
            ['kode' => 'KL101', 'nama' => 'Dasar Kesehatan Lingkungan', 'sks' => 2, 'jurusan_id' => 2, 'prodi_id' => 4],
            ['kode' => 'KL102', 'nama' => 'Sanitasi', 'sks' => 2, 'jurusan_id' => 2, 'prodi_id' => 4],

            // Prodi 5: Teknik Tenaga Listrik (jurusan_id 3, prodi_id 5)
            ['kode' => 'TL101', 'nama' => 'Dasar Listrik', 'sks' => 3, 'jurusan_id' => 3, 'prodi_id' => 5],
            ['kode' => 'TL102', 'nama' => 'Mesin Listrik', 'sks' => 3, 'jurusan_id' => 3, 'prodi_id' => 5],

            // Prodi 6: Teknik Telekomunikasi (jurusan_id 3, prodi_id 6)
            ['kode' => 'TT101', 'nama' => 'Dasar Telekomunikasi', 'sks' => 3, 'jurusan_id' => 3, 'prodi_id' => 6],
            ['kode' => 'TT102', 'nama' => 'Jaringan Komputer', 'sks' => 3, 'jurusan_id' => 3, 'prodi_id' => 6],

            // Prodi 7: Teknik Konstruksi (jurusan_id 4, prodi_id 7)
            ['kode' => 'TK101', 'nama' => 'Dasar Konstruksi', 'sks' => 3, 'jurusan_id' => 4, 'prodi_id' => 7],
            ['kode' => 'TK102', 'nama' => 'Manajemen Konstruksi', 'sks' => 3, 'jurusan_id' => 4, 'prodi_id' => 7],

            // Prodi 8: Teknik Transportasi (jurusan_id 4, prodi_id 8)
            ['kode' => 'TT101', 'nama' => 'Dasar Transportasi', 'sks' => 3, 'jurusan_id' => 4, 'prodi_id' => 8],
            ['kode' => 'TT102', 'nama' => 'Sistem Transportasi', 'sks' => 3, 'jurusan_id' => 4, 'prodi_id' => 8],

            // Prodi 9: Teknik Otomotif (jurusan_id 5, prodi_id 9)
            ['kode' => 'TO101', 'nama' => 'Dasar Otomotif', 'sks' => 3, 'jurusan_id' => 5, 'prodi_id' => 9],
            ['kode' => 'TO102', 'nama' => 'Perawatan Kendaraan', 'sks' => 3, 'jurusan_id' => 5, 'prodi_id' => 9],

            // Prodi 10: Teknik Perkapalan (jurusan_id 5, prodi_id 10)
            ['kode' => 'TP101', 'nama' => 'Dasar Perkapalan', 'sks' => 3, 'jurusan_id' => 5, 'prodi_id' => 10],
            ['kode' => 'TP102', 'nama' => 'Konstruksi Kapal', 'sks' => 3, 'jurusan_id' => 5, 'prodi_id' => 10],
        ];

        foreach ($data as $mk) {
            Matakuliah::create($mk);
        }
    }
}