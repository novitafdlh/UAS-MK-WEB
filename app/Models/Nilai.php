<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Nilai extends Model
{
    protected $table = 'nilai';

    protected $fillable = [
        'user_id',
        'dosen_id',
        'mata_kuliah_id',
        'nilai',
    ];

    // Relasi ke user (mahasiswa)
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function mataKuliah()
    {
        return $this->belongsTo(MataKuliah::class, 'mata_kuliah_id');
    }

    public function jadwal()
    {
        return $this->belongsTo(\App\Models\Jadwal::class, 'jadwal_id');
    }
    public function dosen()
    {
        return $this->belongsTo(User::class, 'dosen_id');
    }
}
