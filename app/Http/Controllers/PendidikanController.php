<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use Illuminate\Http\Request;
use App\Models\RiwayatPendidikan;

class PendidikanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($nip)
    {
        $pegawai = Pegawai::where('nip',$nip)->first();
        return view('pegawai.pendidikan')->with('pegawai',$pegawai);
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
            'jenis_pendidikan' => 'required',
            'institusi' => 'required',
            'tahun_lulus'=> 'required | date_format:Y'
        ]);

        try {
            $pendidikan = new RiwayatPendidikan;
            $pendidikan->pegawai_id = $id;
            $pendidikan->jenis_pendidikan = $request->jenis_pendidikan;
            $pendidikan->institusi = $request->institusi;
            $pendidikan->tahun_lulus = $request->tahun_lulus;
            $pendidikan->save();
        } catch (\Exception $e) {
            return redirect()->back()->with('errors','Pendidikan Gagal Disimpan');
        }
        return redirect()->back()->with('sukses','Pendidikan Berhasil Disimpan');
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
    public function update(Request $request, string $id )
    {
        $request->validate([
            'jenis_pendidikan' => 'required',
            'institusi' => 'required',
            'tahun_lulus'=> 'required | date_format:Y'
        ]);

        try {
            $pendidikan = RiwayatPendidikan::find($id);
            $pendidikan->jenis_pendidikan = $request->jenis_pendidikan;
            $pendidikan->institusi = $request->institusi;
            $pendidikan->tahun_lulus = $request->tahun_lulus;
            $pendidikan->save();
        } catch (\Exception $e) {
            return redirect()->back()->with('errors','Pendidikan Gagal Disimpan');
        }
        return redirect()->back()->with('sukses','Pendidikan Berhasil Disimpan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $pendidikan = RiwayatPendidikan::find($id);
            $pendidikan->delete();
        } catch (\Throwable $th) {
            return redirect()->back()->with('errors','Pendidikan Gagal Dihapus');
        }
        return back()->with('sukses','Pendidikan Berhasil Dihapus');
    }
}
