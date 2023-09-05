<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use App\Models\RiwayatDiklat;
use Illuminate\Http\Request;

class DiklatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($nip)
    {
        $pegawai = Pegawai::where('nip',$nip)->first();
        return view('pegawai.diklat')->with('pegawai',$pegawai);
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
    public function store(Request $request, $id)
    {
        $request->validate([
            'nama_diklat' => 'required',
            'tempat' => 'required',
            'tanggal_diklat'=> 'required | date_format:Y-m-d',
            'deskripsi' => 'required',
        ]);

        try {
            $diklat = new RiwayatDiklat();
            $diklat->pegawai_id = $id;
            $diklat->nama_diklat = $request->nama_diklat;
            $diklat->tempat = $request->tempat;
            $diklat->tanggal_diklat = $request->tanggal_diklat;
            $diklat->deskripsi = $request->deskripsi;
            $diklat->save();
        } catch (\Exception $e) {
            return redirect()->back()->with('errors','DIklat Gagal Disimpan');
        }
        return redirect()->back()->with('sukses','DIklat Berhasil Disimpan');
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
        $request->validate([
            'nama_diklat' => 'required',
            'tempat' => 'required',
            'tanggal_diklat'=> 'required | date_format:Y-m-d',
            'deskripsi' => 'required',
        ]);

        try {
            $diklat = RiwayatDiklat::find($id);
            $diklat->nama_diklat = $request->nama_diklat;
            $diklat->tempat = $request->tempat;
            $diklat->tanggal_diklat = $request->tanggal_diklat;
            $diklat->deskripsi = $request->deskripsi;
            $diklat->save();
        } catch (\Exception $e) {
            return redirect()->back()->with('errors','DIklat Gagal Disimpan');
        }
        return redirect()->back()->with('sukses','DIklat Berhasil Disimpan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $diklat = RiwayatDiklat::find($id);
            $diklat->delete();
        } catch (\Throwable $th) {
            return redirect()->back()->with('errors','Diklat Gagal Dihapus');
        }
        return back()->with('sukses','Diklat Berhasil Dihapus');
    }
}
