<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KRS extends Model
{
    protected $table = 'krs';

    protected $fillable = [
        'user_id',
        'jadwal_id',
        'mata_kuliah_id',
        'semester',
        'tahun_akademik',
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
        return $this->belongsTo(Jadwal::class, 'jadwal_id');
    }
}
