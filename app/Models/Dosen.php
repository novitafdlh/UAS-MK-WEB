<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    // Perbarui fillable untuk menyertakan foreign key
    protected $fillable = ['nidn', 'nama', 'email', 'prodi_id', 'jurusan_id'];

    // Tambahkan relasi ke Prodi
    public function prodi()
    {
        return $this->belongsTo(Prodi::class);
    }

    // Tambahkan relasi ke Jurusan
    public function jurusan()
    {
        return $this->belongsTo(Jurusan::class);
    }

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }
}