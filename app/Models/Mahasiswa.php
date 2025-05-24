<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    public function jadwals()
    {
        return $this->belongsToMany(Jadwal::class, 'jadwal_mahasiswa', 'mahasiswa_id', 'jadwal_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    protected $fillable = ['nim', 'nama', 'email', 'prodi', 'jurusan'];
}
