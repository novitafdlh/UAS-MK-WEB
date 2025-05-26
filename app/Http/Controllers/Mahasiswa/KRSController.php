<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MataKuliah;
use App\Models\KRS;
use App\Models\Prodi;
use Illuminate\Support\Facades\Auth;

class KRSController extends Controller
{
    // Menampilkan KRS yang sudah diambil
    public function index()
    {
        $mahasiswaId = Auth::id();
        $semester = 'Genap';
        $tahunAkademik = '2024/2025';

        $krsList = KRS::with('mataKuliah')
            ->where('mahasiswa_id', $mahasiswaId)
            ->where('semester', $semester)
            ->where('tahun_akademik', $tahunAkademik)
            ->get();

        return view('mahasiswa.krs.index', compact('krsList'));
    }

    // Form tambah KRS
    public function create(Request $request)
    {
        $prodis = Prodi::all();
        $matakuliahs = collect();

        if ($request->filled('prodi_id')) {
            $matakuliahs = MataKuliah::where('prodi_id', $request->prodi_id)->get();
        }

        return view('mahasiswa.krs.create', compact('prodis', 'matakuliahs'));
    }

    // Simpan KRS baru
    public function store(Request $request)
    {
        $request->validate([
            'prodi_id' => 'required|exists:prodis,id',
            'mata_kuliah_id' => 'required|exists:matakuliahs,id',
        ]);

        KRS::create([
            'mahasiswa_id' => auth()->id(),
            'mata_kuliah_id' => $request->mata_kuliah_id,
            'semester' => 'Genap',
            'tahun_akademik' => '2024/2025',
        ]);

        return redirect()->route('mahasiswa.krs.index')->with('success', 'KRS berhasil ditambahkan!');
    }

    // Hapus KRS
    public function destroy($id)
    {
        $krs = KRS::findOrFail($id);
        $krs->delete();

        return redirect()->route('mahasiswa.krs.index')->with('success', 'KRS berhasil dihapus!');
    }
}
