<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Jadwal;
use App\Models\Prodi;
use App\Models\Matakuliah;
use App\Models\User;

class JadwalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $prodis = Prodi::all();

        foreach ($prodis as $prodi) {
            // Ambil satu matakuliah dan satu dosen untuk prodi ini
            $matakuliah = Matakuliah::where('prodi_id', $prodi->id)->first();
            $dosen = User::where('role', 'dosen')->where('prodi_id', $prodi->id)->first();

            if ($matakuliah && $dosen) {
                Jadwal::create([
                    'jurusan_id'     => $prodi->jurusan_id,
                    'prodi_id'        => $prodi->id,
                    'mata_kuliah_id'  => $matakuliah->id,
                    'dosen_id'        => $dosen->id,
                    'hari'            => 'Senin',
                    'jam_mulai'       => '08:00',
                    'jam_selesai'     => '10:00',
                    'ruangan'         => 'Ruang ' . $prodi->id,
                ]);
            }
        }
    }
}
