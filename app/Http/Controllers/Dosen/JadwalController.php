<?php

namespace App\Http\Controllers\Dosen;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class JadwalController extends Controller
{
    public function index(Request $request)
    {
        $dosen = User::where('role', 'dosen')->where('id', Auth::id())->first();
        $hari = $request->query('hari'); // ambil filter hari dari query string

        $query = \App\Models\Jadwal::with(['prodi', 'mata_kuliah', 'jurusan'])
            ->where('dosen_id', $dosen->id);

        if ($hari) {
            $query->where('hari', $hari);
        }

        $jadwals = $query->get();

        // Daftar hari untuk dropdown
        $daftarHari = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];

        return view('dosen.jadwal.index', compact('jadwals', 'daftarHari', 'hari'));
    }
}
