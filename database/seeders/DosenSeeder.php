<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Prodi;
use Illuminate\Support\Facades\Hash;

class DosenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $prodis = Prodi::all();

        foreach ($prodis as $prodi) {
            for ($i = 1; $i <= 2; $i++) {
                $nidn = $prodi->id . str_pad($i, 5, '0', STR_PAD_LEFT);
                User::create([
                    'nidn'       => $nidn,
                    'name'       => 'Dosen ' . $i . ' ' . $prodi->nama,
                    'email'      => 'dosen' . $prodi->id . '_' . $i . '@example.com',
                    'password'   => Hash::make('password'),
                    'role'       => 'dosen',
                    'jurusan_id' => $prodi->jurusan_id,
                    'prodi_id'   => $prodi->id,
                ]);
            }
        }
    }
}
