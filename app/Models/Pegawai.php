<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_lengkap',
        'nik',
        'nip',
        'jenis',
        'jabatan',
        'email',
        'hp',
        'jenis_kelamin',
        'foto',
        'alamat',
        'tempat_lahir',
        'tanggal_lahir',
    ];

    public function keluarga(){
        return $this->hasMany(Keluarga::class);
    }
    public function riwayat_pendidikan(){
        return $this->hasMany(RiwayatPendidikan::class);
    }
    public function riwayat_diklat(){
        return $this->hasMany(RiwayatDiklat::class);
    }
    public function golongan(){
        return $this->hasOne(Golongan::class);
    }
    public function jabatan(){
        return $this->belongsTo(Jabatan::class);
    }
    public function gaji(){
        return $this->hasOne(Gaji::class);
    }

    public function kenaikanPangkat(){
        return $this->hasOne(kenaikanPangkat::class);
    }
}
