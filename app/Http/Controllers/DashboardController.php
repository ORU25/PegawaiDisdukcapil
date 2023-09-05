<?php

namespace App\Http\Controllers;

use App\Models\Gaji;
use App\Models\Jabatan;
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
        $pegawai = Pegawai::all();

        $bulanSaatIni = now()->month;

        $gaji = Gaji::where('bulan', $bulanSaatIni)
        ->orderBy('tanggal')
        ->get();
        $jabatan = Jabatan::where('bulan', $bulanSaatIni)
        ->orderBy('tanggal')
        ->get();

        return view('dashboard', ['chart' => $chart->build()])->with('pegawai',$pegawai)->with('gaji',$gaji)->with('jabatan',$jabatan);
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
