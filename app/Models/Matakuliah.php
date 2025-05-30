<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Jurusan;
use App\Models\Prodi;
use App\Models\KRS;

class Matakuliah extends Model
{
    use HasFactory;
    protected $table = 'matakuliahs';
    protected $fillable = ['prodi_id', 'jurusan_id', 'kode', 'nama', 'sks', 'dosen_id'];

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
        return $this->belongsTo(User::class, 'dosen_id');
    }
}
