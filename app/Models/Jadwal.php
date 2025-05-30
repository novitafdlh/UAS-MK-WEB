<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Jadwal extends Model
{
    use HasFactory;

    protected $fillable = [
        'jurusan_id',
        'prodi_id',
        'dosen_id',
        'mata_kuliah_id',
        'user_id',
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

    public function jurusan()
    {
        return $this->belongsTo(\App\Models\Jurusan::class, 'jurusan_id');
    }

    public function dosen()
    {
        return $this->belongsTo(\App\Models\User::class, 'dosen_id');
    }

    public function jadwal()
    {
        return $this->belongsTo(\App\Models\Jadwal::class, 'jadwal_id');
    }

    public function mahasiswas()
    {
        return $this->belongsToMany(
            \App\Models\User::class, 'user_id')->where('role', 'mahasiswa')->withTimestamps();
    }
}
