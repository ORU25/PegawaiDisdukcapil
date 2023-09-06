<?php

namespace App\Http\Controllers;

use App\Models\Gaji;
use App\Models\Jabatan;
use App\Models\kenaikanPangkat;
use App\Models\Pegawai;
use App\Charts\PegawaiChart;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(PegawaiChart $chart) 
    {
        $jabatan = Jabatan::all();

        $kadis = Jabatan::where('nama_jabatan','Kepala Dinas')->first();
        $sekretaris = Jabatan::where('nama_jabatan','Sekretaris')->first();
        $kabidDaduk = Jabatan::where('nama_jabatan','Kabid Pelayanan Pendaftaran Penduduk')->first();
        $kabidCapil = Jabatan::where('nama_jabatan','Kabid Pelayanan Pencatatan Sipil')->first();
        $kabidPiak = Jabatan::where('nama_jabatan','Kabid Pengelolaan Informasi Administrasi Kependudukan dan Pemanfaatan Data')->first();

        $tahunSaatIni = now()->year;
        $bulanSaatIni = now()->month;

        $gaji = Gaji::where('bulan', $bulanSaatIni+1)
        ->orderBy('tanggal')
        ->get();
        $pangkat = kenaikanPangkat::where('tahun', $tahunSaatIni)
        ->orderBy('bulan')
        ->get();

        return view('dashboard', ['chart' => $chart->build()])->with('kadis',$kadis)->with('sekretaris',$sekretaris)->with('kabidDaduk',$kabidDaduk)->with('kabidCapil',$kabidCapil)->with('kabidPiak',$kabidPiak)->with('gaji',$gaji)->with('pangkat',$pangkat);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
