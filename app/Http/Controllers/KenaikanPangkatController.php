<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\kenaikanPangkat;

class KenaikanPangkatController extends Controller
{
    public function index()
    {
        //
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
    public function store(Request $request,$id)
    {
        $request->validate([
            'tahun' => 'required',
            'bulan' => 'required',
        ]);
        try {
           $jabatan = new kenaikanPangkat;
           $jabatan->pegawai_id = $id;
           $jabatan->tahun = $request->tahun;
           $jabatan->bulan = $request->bulan;
           $jabatan->save();

        } catch (\Exception $e) {
            return redirect()->back()->with('errors','Kenaikan Jabatan Gagal Ditambah');
        }
        return redirect()->back()->with('sukses','Kenaikan Jabatan Berhasil Ditambah');
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
            'tahun' => 'required',
            'bulan' => 'required',
        ]);
        try {
           $jabatan = kenaikanPangkat::where('pegawai_id',$id)->first();
           $jabatan->pegawai_id = $id;
           $jabatan->tahun = $request->tahun;
           $jabatan->bulan = $request->bulan;
           $jabatan->save();

        } catch (\Exception $e) {
            return redirect()->back()->with('errors','Kenaikan Jabatan Gagal Diubah');
        }
        return redirect()->back()->with('sukses','Kenaikan Jabatan Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $jabatan = kenaikanPangkat::where('pegawai_id',$id)->first();
            $jabatan->delete();
 
         } catch (\Exception $e) {
             return redirect()->back()->with('errors','Kenaikan Jabatan Gagal Dihapus');
         }
         return redirect()->back()->with('sukses','Kenaikan Jabatan Berhasil Dihapus');
    }
}
