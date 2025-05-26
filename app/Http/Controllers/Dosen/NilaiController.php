<?php

namespace App\Http\Controllers\Dosen;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Nilai;
use App\Models\Mahasiswa;
use App\Models\Prodi;
use App\Models\KRS;
use App\Models\MataKuliah;

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

        // Ambil mahasiswa yang mengambil mata kuliah tersebut via KRS
        $mahasiswas = collect();
        if ($selectedMataKuliahId) {
            $mahasiswaIdsInKRS = KRS::where('mata_kuliah_id', $selectedMataKuliahId)
                ->pluck('mahasiswa_id')->unique();

            // Ambil data mahasiswa berdasarkan daftar id tersebut
            $mahasiswas = Mahasiswa::whereIn('id', $mahasiswaIdsInKRS)->get();
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

    // Simpan nilai ke database
    public function store(Request $request)
    {
        $request->validate([
            'mahasiswa_id' => 'required|exists:mahasiswas,id', // validasi id mahasiswa
            'mata_kuliah_id' => 'required|exists:matakuliahs,id',
            'nilai' => 'required|string|max:2',
        ]);

        // Cari mahasiswa sesuai id mahasiswa yang dipilih
        $mahasiswaActual = Mahasiswa::find($request->mahasiswa_id);

        if (!$mahasiswaActual) {
            return redirect()->back()->with('error', 'Data mahasiswa tidak ditemukan.');
        }

        // Simpan atau update nilai
        Nilai::updateOrCreate(
            [
                'mahasiswa_id' => $mahasiswaActual->id,
                'mata_kuliah_id' => $request->mata_kuliah_id,
            ],
            [
                'nilai' => $request->nilai,
            ]
        );

        return redirect()->route('dosen.nilai.index')->with('success', 'Nilai berhasil disimpan.');
    }
}
