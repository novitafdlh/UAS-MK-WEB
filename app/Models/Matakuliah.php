<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Jurusan;
use App\Models\Prodi;
use App\Models\KRS;
use App\Models\Dosen;

class Matakuliah extends Model
{
    use HasFactory;
    protected $table = 'matakuliahs';
    protected $fillable = ['prodi_id', 'jurusan_id', 'kode', 'nama', 'sks', 'jurusan'];

    public function jurusan()
    {
        return $this->belongsTo(Jurusan::class);
    }

    public function prodi() {
        return $this->belongsTo(Prodi::class);
    }

    public function krs()
    {
        return $this->hasMany(KRS::class, 'mata_kuliah_id');
    }

    public function dosen()
    {
        return $this->belongsTo(\App\Models\Dosen::class, 'dosen_id');
    }
}
