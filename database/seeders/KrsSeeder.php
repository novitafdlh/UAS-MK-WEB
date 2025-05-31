<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\KRS;
use App\Models\User;
use App\Models\MataKuliah;
use App\Models\Jadwal;

class KrsSeeder extends Seeder
{
    public function run(): void
    {
        $mahasiswas = User::where('role', 'mahasiswa')->get();
        $matakuliahs = MataKuliah::all();
        $jadwals = Jadwal::all();

        for ($i = 0; $i < 10; $i++) {
            $mahasiswa = $mahasiswas->random();
            $matakuliah = $matakuliahs->random();
            $jadwal = $jadwals->random();

            KRS::create([
                'user_id'         => $mahasiswa->id,
                'mata_kuliah_id'  => $matakuliah->id,
                'jadwal_id'       => $jadwal->id,
                'semester'        => 'Genap',
                'tahun_akademik'  => '2024/2025',
            ]);
        }
    }
}