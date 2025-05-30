<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Prodi;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class MahasiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $prodis = Prodi::all();

        foreach ($prodis as $prodi) {
            for ($i = 1; $i <= 2; $i++) {
                $nim = $prodi->id . str_pad($i, 6, '0', STR_PAD_LEFT);
                User::create([
                    'nim'        => $nim,
                    'name'       => 'Mahasiswa ' . $i . ' ' . $prodi->nama,
                    'email'      => 'mhs' . $prodi->id . '_' . $i . '@example.com',
                    'password'   => Hash::make('password'),
                    'role'       => 'mahasiswa',
                    'jurusan_id' => $prodi->jurusan_id,
                    'prodi_id'   => $prodi->id,
                ]);
            }
        }
    }
}