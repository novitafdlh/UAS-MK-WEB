<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Nilai extends Model
{
    protected $table = 'nilai';

    protected $fillable = [
        'mahasiswa_id',
        'mata_kuliah_id',
        'nilai',
    ];

    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'mahasiswa_id');
    }

    public function mataKuliah()
    {
        return $this->belongsTo(MataKuliah::class, 'mata_kuliah_id');
    }

    public function dosen()
    {
        return $this->belongsTo(Dosen::class, 'dosen_id');
    }

    public function jadwal()
    {
        return $this->belongsTo(\App\Models\Jadwal::class, 'jadwal_id');
    }
}
