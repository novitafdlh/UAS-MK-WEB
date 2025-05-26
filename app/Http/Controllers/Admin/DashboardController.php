<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Dosen;    // Import model Dosen
use App\Models\User;     // Import model User (untuk akun dosen & mahasiswa)
use App\Models\Jurusan;  // Import model Jurusan
use App\Models\Prodi;    // Import model Prodi

class DashboardController extends Controller
{
    public function index()
    {
        // Hitung total dari setiap entitas
        $totalDosens = Dosen::count(); // Total data dosen (dari tabel 'dosens')
        $totalDosenAccounts = User::where('role', 'dosen')->count(); // Total akun dosen (dari tabel 'users' dengan role 'dosen')
        $totalMahasiswaAccounts = User::where('role', 'mahasiswa')->count(); // Total akun mahasiswa (dari tabel 'users' dengan role 'mahasiswa')
        $totalJurusans = Jurusan::count(); // Total jurusan
        $totalProdis = Prodi::count(); // Total program studi

        // Kirim data ini ke view
        return view('admin.dashboard', compact(
            'totalDosens',
            'totalDosenAccounts',
            'totalMahasiswaAccounts',
            'totalJurusans',
            'totalProdis'
        ));
    }
}