<?php

namespace App\Http\Controllers\Dosen;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
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
            $nilaiList = KRS::with(['user', 'mataKuliah'])
                ->whereHas('user', function ($q) {
                    $q->where('prodi_id', request()->prodi_id)
                      ->where('role', 'mahasiswa');
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

        // Ambil mahasiswa (user) yang mengambil mata kuliah tersebut via KRS
        $mahasiswas = collect();
        if ($selectedMataKuliahId) {
            $mahasiswaUserIdsInKRS = KRS::where('mata_kuliah_id', $selectedMataKuliahId)
                ->pluck('user_id')->unique();

            // Ambil user dengan role mahasiswa berdasarkan user_id dari KRS
            $mahasiswas = User::whereIn('id', $mahasiswaUserIdsInKRS)
                ->where('role', 'mahasiswa')
                ->get();
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
            'mahasiswa_id' => 'required|exists:users,id', // validasi id mahasiswa (user)
            'mata_kuliah_id' => 'required|exists:matakuliahs,id',
            'nilai' => 'required|string|max:2',
        ]);

        // Cari mahasiswa sesuai id mahasiswa yang dipilih
        $mahasiswaActual = User::where('id', $request->mahasiswa_id)
            ->where('role', 'mahasiswa')
            ->first();

        if (!$mahasiswaActual) {
            return redirect()->back()->with('error', 'Data mahasiswa tidak ditemukan.');
        }

        // Simpan atau update nilai
        KRS::updateOrCreate(
            [
                'user_id' => $mahasiswaActual->id,
                'mata_kuliah_id' => $request->mata_kuliah_id,
            ],
            [
                'nilai' => $request->nilai,
                'dosen_id' => auth()->id(),
            ]
        );

        return redirect()->route('dosen.nilai.index')->with('success', 'Nilai berhasil disimpan.');
    }

    public function edit($id)
    {
        $nilai = KRS::with(['user', 'mataKuliah'])->findOrFail($id);
        return view('dosen.nilai.edit', compact('nilai'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nilai' => 'required|string|max:2',
        ]);

        $nilai = KRS::findOrFail($id);
        $nilai->nilai = $request->nilai;
        $nilai->dosen_id = auth()->id();
        $nilai->save();

        return redirect()->route('dosen.nilai.index')->with('success', 'Nilai berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $nilai = KRS::findOrFail($id);
        $nilai->delete();

        return redirect()->route('dosen.nilai.index')->with('success', 'Nilai berhasil dihapus.');
    }
}