<?php

namespace App\Http\Controllers;

use App\Models\Jabatan;
use Illuminate\Http\Request;

class JabatanController extends Controller
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
           $jabatan = new Jabatan;
           $jabatan->pegawai_id = $id;
           $jabatan->tanggal = $request->tanggal;
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
            'tanggal' => 'required',
            'bulan' => 'required',
        ]);
        try {
           $jabatan = Jabatan::where('pegawai_id',$id)->first();
           $jabatan->pegawai_id = $id;
           $jabatan->tanggal = $request->tanggal;
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
            $jabatan = Jabatan::where('pegawai_id',$id)->first();
            $jabatan->delete();
 
         } catch (\Exception $e) {
             return redirect()->back()->with('errors','Kenaikan Jabatan Gagal Dihapus');
         }
         return redirect()->back()->with('sukses','Kenaikan Jabatan Berhasil Dihapus');
    }
}
