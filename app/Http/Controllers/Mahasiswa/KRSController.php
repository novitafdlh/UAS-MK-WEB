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
        $mahasiswa = Auth::user()->mahasiswa;
        $matakuliahs = MataKuliah::where('prodi_id', $mahasiswa->prodi_id)->get();

        return view('mahasiswa.krs.create', compact('matakuliahs', 'mahasiswa'));
    }

    // Simpan KRS baru
    public function store(Request $request)
    {
        $request->validate([
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

    // Form edit KRS
public function edit($id)
{
    $krs = KRS::with('mataKuliah')->findOrFail($id);
    $prodis = Prodi::all();
    $matakuliahs = MataKuliah::where('prodi_id', $krs->mataKuliah->prodi_id)->get();

    return view('mahasiswa.krs.edit', compact('krs', 'prodis', 'matakuliahs'));
}

// Update KRS
public function update(Request $request, $id)
{
    $request->validate([
        'mata_kuliah_id' => 'required|exists:matakuliahs,id',
    ]);

    $krs = KRS::findOrFail($id);
    $krs->update([
        'mata_kuliah_id' => $request->mata_kuliah_id,
    ]);

    return redirect()->route('mahasiswa.krs.index')->with('success', 'KRS berhasil diperbarui!');
}


    // Hapus KRS
    public function destroy($id)
    {
        $krs = KRS::findOrFail($id);
        $krs->delete();

        return redirect()->route('mahasiswa.krs.index')->with('success', 'KRS berhasil dihapus!');
    }
}
