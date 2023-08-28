<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RiwayatPendidikan extends Model
{
    use HasFactory;

    protected $fillable = [
        'pegawai_id',
        'jenis_pendidikan',
        'institusi',
        'tahun_lulus'
    ];

    public function pegawai(){
        return $this->belongsTo('App/Models/Pegawai');
    }
}
