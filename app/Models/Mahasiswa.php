<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    // Pastikan fillable hanya berisi kolom yang ada di tabel, dan gunakan _id untuk foreign key
    protected $fillable = ['nim', 'nama', 'email', 'prodi_id', 'jurusan_id', 'user_id'];

    public function jadwals()
    {
        return $this->belongsToMany(Jadwal::class, 'jadwal_mahasiswa', 'mahasiswa_id', 'jadwal_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

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
}