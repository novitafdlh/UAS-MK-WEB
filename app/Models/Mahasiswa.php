<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Prodi;

class Mahasiswa extends Model
{
    use HasFactory;

     protected $table = 'mahasiswas';
    // Pastikan fillable hanya berisi kolom yang ada di tabel, dan gunakan _id untuk foreign key
    protected $fillable = ['nim', 'nama', 'email', 'prodi_id', 'jurusan_id', 'user_id'];

    public function krs()
    {
        return $this->hasMany(KRS::class, 'mahasiswa_id'); // Pastikan 'mahasiswa_id' adalah foreign key di tabel KRS
    }

    public function jadwals()
    {
        return $this->belongsToMany(Jadwal::class, 'jadwal_mahasiswa', 'mahasiswa_id', 'jadwal_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id'); // Pastikan ini adalah foreign key yang benar
    }

    // Tambahkan relasi ke Prodi
    public function prodi()
    {
        return $this->belongsTo(Prodi::class, 'prodi_id');
    }

    // Tambahkan relasi ke Jurusan
    public function jurusan()
    {
        return $this->belongsTo(Jurusan::class);
    }
}