<?php

namespace App\Http\Controllers;

use App\Models\Gaji;
use Illuminate\Http\Request;

class GajiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
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
            'tanggal' => 'required',
            'bulan' => 'required',
        ]);
        try {
           $gaji = new Gaji;
           $gaji->pegawai_id = $id;
           $gaji->tanggal = $request->tanggal;
           $gaji->bulan = $request->bulan;
           $gaji->save();

        } catch (\Exception $e) {
            return redirect()->back()->with('errors','Kenaikan Gaji Gagal Ditambah');
        }
        return redirect()->back()->with('sukses','Kenaikan Gaji Berhasil Ditambah');

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
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'tanggal' => 'required',
            'bulan' => 'required',
        ]);
        try {
           $gaji = Gaji::where('pegawai_id',$id)->first();
           $gaji->pegawai_id = $id;
           $gaji->tanggal = $request->tanggal;
           $gaji->bulan = $request->bulan;
           $gaji->save();

        } catch (\Exception $e) {
            return redirect()->back()->with('errors','Kenaikan Gaji Gagal Diubah');
        }
        return redirect()->back()->with('sukses','Kenaikan Gaji Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $jabatan = Gaji::where('pegawai_id',$id)->first();
            $jabatan->delete();
 
         } catch (\Exception $e) {
             return redirect()->back()->with('errors','Kenaikan Jabatan Gagal Dihapus');
         }
         return redirect()->back()->with('sukses','Kenaikan Jabatan Berhasil Dihapus');
    }
}
