<?php

namespace App\Http\Controllers;

use App\Models\Keluarga;
use Illuminate\Http\Request;

class KeluargaController extends Controller
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
    public function store(Request $request, $id)
    {
        $request->validate([
            'nama_anggota_keluarga' => 'required',
            'hubungan_keluarga' => 'required'
        ]);

        try {
            $keluarga = new Keluarga;
            $keluarga->pegawai_id = $id;
            $keluarga->nama_anggota_keluarga = $request->nama_anggota_keluarga;
            $keluarga->hubungan_keluarga = $request->hubungan_keluarga;
            $keluarga->save();
        } catch (\Throwable $th) {
            return redirect()->back()->with('errors','Keluarga Gagal Ditambah');
        }
        return back()->with('sukses','Keluarga Berhasil Ditambah');
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
            'nama_anggota_keluarga' => 'required',
            'hubungan_keluarga' => 'required'
        ]);

        try {
            $keluarga = Keluarga::find($id);
            $keluarga->nama_anggota_keluarga = $request->nama_anggota_keluarga;
            $keluarga->hubungan_keluarga = $request->hubungan_keluarga;
            $keluarga->save();
        } catch (\Throwable $th) {
            return redirect()->back()->with('errors','Keluarga Gagal Disimpan');
        }
        return back()->with('sukses','Keluarga Berhasil Disimpan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $keluarga = Keluarga::find($id);
            $keluarga->delete();
        } catch (\Throwable $th) {
            return redirect()->back()->with('errors','Keluarga Gagal Dihapus');
        }
        return back()->with('sukses','Keluarga Berhasil Dihapus');
    }
}
