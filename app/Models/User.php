<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasRoles;

    public function mahasiswa()
    {
        return $this->hasOne(Mahasiswa::class);
    }

    public function dosen() {
        return $this->hasOne(Dosen::class, 'user_id');
    }

    public function prodi() {
        return $this->belongsTo(Prodi::class);
    }

    public function jurusan() {
        return $this->belongsTo(Jurusan::class);
    }

    public function users() {
        return $this->hasMany(User::class);
    }

    public function mataKuliahs() {
        return $this->hasMany(MataKuliah::class);
    }

    public function jadwals() {
        return $this->hasMany(Jadwal::class);
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'role',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
