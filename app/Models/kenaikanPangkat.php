<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kenaikanPangkat extends Model
{
    use HasFactory;

    protected $table = 'kenaikan_pangkat';

    protected $fillable = [
        'pegawai_id',
        'tahun',
        'bulan'
    ];

    public function pegawai(){
        return $this->belongsTo(Pegawai::class);
    }
}
