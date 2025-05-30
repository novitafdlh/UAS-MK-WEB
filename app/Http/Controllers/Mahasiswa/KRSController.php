<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MataKuliah;
use App\Models\KRS;
use App\Models\Prodi;
use App\Models\Jadwal;
use Illuminate\Support\Facades\Auth;

class KRSController extends Controller
{
    // Menampilkan daftar KRS mahasiswa aktif
    public function index()
    {
        $userId = Auth::id();
        $semester = 'Genap';
        $tahunAkademik = '2024/2025';

        $krsList = KRS::with(['jadwal.mata_kuliah', 'jadwal.dosen', 'jadwal.prodi', 'jadwal.jurusan'])
            ->where('user_id', $userId)
            ->where('semester', $semester)
            ->where('tahun_akademik', $tahunAkademik)
            ->get();

        return view('mahasiswa.krs.index', compact('krsList'));
    }

    // Form tambah KRS
    public function create(Request $request)
    {
        $mahasiswa = Auth::user();
        $matakuliahs = MataKuliah::where('prodi_id', $mahasiswa->prodi_id)->get();
        $jadwal = null;

        if ($request->mata_kuliah_id) {
            $jadwal = \App\Models\Jadwal::with('dosen')->where('mata_kuliah_id', $request->mata_kuliah_id)->first();
        }

        return view('mahasiswa.krs.create', compact('matakuliahs', 'mahasiswa', 'jadwal'));
    }

    // Simpan KRS baru
    public function store(Request $request)
    {
        $request->validate([
            'mata_kuliah_id' => 'required|exists:matakuliahs,id',
        ]);
        
        // Ambil jadwal pertama yang sesuai dengan mata kuliah yang dipilih
        $jadwal = \App\Models\Jadwal::where('mata_kuliah_id', $request->mata_kuliah_id)->first();

        if (!$jadwal) {
            return back()->withErrors(['mata_kuliah_id' => 'Jadwal untuk mata kuliah ini belum tersedia.']);
        }

        KRS::create([
            'user_id' => Auth::id(),
            'jadwal_id' => $jadwal->id,
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
        $mahasiswa = Auth::user();
        $prodis = Prodi::all();
        $jadwals = \App\Models\Jadwal::where('prodi_id', $mahasiswa->prodi_id)->get();
        $matakuliahs = MataKuliah::where('prodi_id', $mahasiswa->prodi_id)->get();

        return view('mahasiswa.krs.edit', compact('jadwals', 'krs', 'prodis', 'matakuliahs'));
    }

    // Update KRS
    public function update(Request $request, $id)
    {
        $request->validate([
            'mata_kuliah_id' => 'required|exists:matakuliahs,id',
        ]);

        $jadwal = \App\Models\Jadwal::where('mata_kuliah_id', $request->mata_kuliah_id)->first();

        if (!$jadwal) {
            return back()->withErrors(['mata_kuliah_id' => 'Jadwal untuk mata kuliah ini belum tersedia.']);
        }

        $krs = KRS::findOrFail($id);
        $krs->update([
            'jadwal_id' => $jadwal->id,
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
