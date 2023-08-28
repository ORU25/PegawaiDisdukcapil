<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jabatan extends Model
{
    use HasFactory;

    protected $fillable = [
        'pegawai_id',
        'kenaikan_jabatan',
    ];

    public function pegawai(){
        return $this->belongsTo('App/Model/pegawai');
    }
}