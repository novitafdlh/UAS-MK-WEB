<?php

namespace App\Http\Controllers\Dosen;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Nilai;
use App\Models\Mahasiswa;
use App\Models\Prodi;
use App\Models\KRS;
use App\Models\MataKuliah;
use App\Models\User;

class NilaiController extends Controller
{
    public function index()
    {
        $prodis = Prodi::all();
        $nilaiList = [];

        if (request()->has('prodi_id') && request()->prodi_id != '') {
            $nilaiList = Nilai::with(['mahasiswa', 'mataKuliah'])
                ->whereHas('mahasiswa', function ($q) {
                    $q->where('prodi_id', request()->prodi_id);
                })->get();
        }

        return view('dosen.nilai.index', compact('prodis', 'nilaiList'));
    }

    public function create(Request $request)
    {
        $prodis = Prodi::all();

        $selectedProdiId = $request->input('prodi_id');
        $selectedMataKuliahId = $request->input('mata_kuliah_id');
        $selectedMahasiswaId = $request->input('mahasiswa_id');

        // Ambil mata kuliah berdasarkan prodi yang dipilih
        $mataKuliahs = $selectedProdiId
            ? MataKuliah::where('prodi_id', $selectedProdiId)->get()
            : collect();

        // Ambil mahasiswa yang mengambil mata kuliah tersebut (via KRS)
        $mahasiswas = collect();
        if ($selectedMataKuliahId) {
            // Ambil semua entri KRS untuk mata kuliah yang dipilih
            $krsEntries = KRS::where('mata_kuliah_id', $selectedMataKuliahId)->get();

            // Dapatkan user_id dari entri KRS tersebut
            $userIdsInKRS = $krsEntries->pluck('mahasiswa_id')->unique()->toArray();

            // Dapatkan data Mahasiswa yang user_id-nya ada di daftar user_id KRS
            // Asumsi model Mahasiswa memiliki kolom 'user_id' yang terhubung ke tabel users
            $mahasiswas = Mahasiswa::whereIn('user_id', $userIdsInKRS)->get();
        }

        return view('dosen.nilai.create', compact(
            'prodis',
            'mataKuliahs',
            'mahasiswas',
            'selectedProdiId',
            'selectedMataKuliahId',
            'selectedMahasiswaId'
        ));
    }

    public function store(Request $request)
    {
        $request->validate([
            'mahasiswa_id' => 'required|exists:users,id',
            'mata_kuliah_id' => 'required|exists:mata_kuliahs,id',
            'nilai' => 'required|string|max:2', // misal nilai huruf A, B, C, dst
        ]);

        $mahasiswaActual = Mahasiswa::where('user_id', $request->mahasiswa_id)->first();

        if (!$mahasiswaActual) {
            return redirect()->back()->with('error', 'Data mahasiswa tidak ditemukan untuk user ini.');
        }

        Nilai::updateOrCreate(
            [
                'mahasiswa_id' => $mahasiswaActual->id,
                'mata_kuliah_id' => $request->mata_kuliah_id,
            ],
            [
                'nilai' => $request->nilai,
            ]
        );

        return redirect()->route('nilai.index')->with('success', 'Nilai berhasil disimpan.');
    }

    // index dan metode lain bisa disesuaikan jika perlu
}
