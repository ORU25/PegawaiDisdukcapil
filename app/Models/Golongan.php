<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Golongan extends Model
{
    use HasFactory;

    protected $fillabe = [
        'pegawai_id',
        'golongan'
    ];

    public function pegawai(){
        return $this->belongsTo(Pegawai::class);
    }
}
