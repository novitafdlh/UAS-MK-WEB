<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Jadwal extends Model
{
    use HasFactory;

    protected $fillable = [
        'prodi_id',
        'mata_kuliah_id',
        'dosen_id',
        'hari',
        'jam_mulai',
        'jam_selesai',
        'ruangan',
    ];

    // Relasi ke mata kuliah
    public function mata_kuliah()
    {
        return $this->belongsTo(MataKuliah::class);
    }

    // Relasi ke prodi
    public function prodi()
    {
        return $this->belongsTo(Prodi::class);
    }

    // Relasi ke dosen (menggunakan model User karena dosen termasuk user)
    public function dosen()
    {
        return $this->belongsTo(User::class, 'dosen_id');
    }

    // Relasi ke mahasiswa (many-to-many)
    public function mahasiswas()
    {
        return $this->belongsToMany(Mahasiswa::class, 'jadwal_mahasiswa', 'jadwal_id', 'mahasiswa_id')
                    ->withTimestamps();
    }
}
