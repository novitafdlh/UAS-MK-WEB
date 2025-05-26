<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matakuliah extends Model
{
    use HasFactory;
    protected $table = 'matakuliahs';
    protected $fillable = ['prodi_id', 'kode', 'nama', 'sks', 'jurusan'];


    public function prodi() {
        return $this->belongsTo(Prodi::class);
    }

    public function krs()
    {
        return $this->hasMany(KRS::class, 'mata_kuliah_id');
    }
}
