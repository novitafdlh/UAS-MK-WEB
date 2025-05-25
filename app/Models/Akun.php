<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Akun extends Model
{
    // Field yang boleh diisi
    protected $fillable = ['nim', 'nama', 'email', 'prodi_id', 'jurusan_id', 'user_id'];

    // Relasi ke tabel users (mahasiswa)
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function prodi()
    {
        return $this->belongsTo(Prodi::class);
    }

    public function jurusan()
    {
        return $this->belongsTo(Jurusan::class);
    }
}
