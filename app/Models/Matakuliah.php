<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Matakuliah extends Model
{
    protected $fillable = ['kode', 'nama', 'sks', 'jurusan'];

    public function prodi() {
        return $this->belongsTo(Prodi::class);
    }
}
