<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keluarga extends Model
{
    use HasFactory; 
    protected $fillable = [
        'pegawai_id',
        'nama_anggota_keluarga',
        'hubungan_keluarga',
    ];

    public function pegawai(){
        return $this->belongsTo('App/Models/Pegawai');
    }
}
