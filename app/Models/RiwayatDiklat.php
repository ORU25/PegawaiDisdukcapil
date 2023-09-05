<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RiwayatDiklat extends Model
{
    use HasFactory;

    protected $fillable = [
        'pegawai_id',
        'nama_diklat',
        'tempat',
        'tanggal_diklat',
        'deskripsi',
    ];

    public function pegawai(){
        return $this->belongsTo(Pegawai::class);
    }
}
