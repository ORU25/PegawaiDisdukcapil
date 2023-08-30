<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_lengkap',
        'nip',
        'jenis',
        'email',
        'hp',
        'jenis_kelamin',
        'foto',
        'alamat',
        'tempat_lahir',
        'tanggal_lahir',
    ];

    public function keluarga(){
        return $this->hasMany('App/Models/Keluarga');
    }
    public function riwayat_pendidikan(){
        return $this->hasMany('App/Models/RiwayatPendidikan');
    }
    public function riwayat_diklat(){
        return $this->hasMany('App/Models/RiwayatDiklat');
    }
    public function golongan(){
        return $this->hasOne('App/Models/Golongan');
    }
    public function jabatan(){
        return $this->hasOne('App/Models/Jabatan');
    }
}
