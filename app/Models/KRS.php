<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KRS extends Model
{
    protected $table = 'krs';

    protected $fillable = [
        'user_id',
        'mahasiswa_id',
        'mata_kuliah_id',
        'semester',
        'tahun_akademik',
    ];

     public function user()
    {
        return $this->belongsTo(User::class, 'mahasiswa_id');
    }

    public function mataKuliah()
    {
        return $this->belongsTo(MataKuliah::class, 'mata_kuliah_id');
    }

    public function mahasiswa()
    {
        return $this->belongsTo(User::class, 'mahasiswa_id');
    }
}
