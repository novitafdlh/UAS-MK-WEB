<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Nilai;

class KHSController extends Controller
{
    public function index()
    {
        $mahasiswa = Auth::user();
        // Ambil nilai beserta relasi matakuliah dan dosen
        $nilais = Nilai::with(['mataKuliah', 'jadwal.dosen'])
            ->where('user_id', $mahasiswa->id)
            ->get();

        return view('mahasiswa.khs.index', compact('nilais', 'mahasiswa'));
    }
}
