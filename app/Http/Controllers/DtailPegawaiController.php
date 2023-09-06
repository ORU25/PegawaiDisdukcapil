<?php

namespace App\Http\Controllers;

use App\Models\Jabatan;
use App\Models\Pegawai;
use App\Models\Golongan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class DtailPegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($nip)
    {
        $pegawai = Pegawai::where('nip', $nip)->first();
        $jabatan = Jabatan::all();
        return view('pegawai.dtail')->with('pegawai',$pegawai)->with('jabatan',$jabatan);
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
        $request->validate([
            'nama_lengkap' => 'required',
            // 'nip' => 'unique:pegawais',
            'jabatan' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required | date',
            'jenis' => 'required',
            'jenis_kelamin' => 'required',
            'foto' => 'image|mimes:jpg,jpeg,png|max:2048',
        ]);
        try {
            $pegawai = Pegawai::findOrFail($id);
            $pegawai->nama_lengkap = $request->nama_lengkap;
            // if($pegawai->nip == $request->nip){
                $pegawai->nip = $request->nip;
                $pegawai->jabatan_id = $request->jabatan;
                // }
                if ($request->hp) {
                    $pegawai->nik = $request->nik;
                }
            if ($request->hp) {
                $pegawai->hp = $request->hp;
            }else{
                $pegawai->hp = null;
            }
            if ($request->email) {
                $pegawai->email = $request->email;
            }else{
                $pegawai->email = null;
            }
            $pegawai->tempat_lahir = $request->tempat_lahir;
            $pegawai->tanggal_lahir = $request->tanggal_lahir;
            $pegawai->jenis = $request->jenis;
            $pegawai->jenis_kelamin = $request->jenis_kelamin;
            if ($request->alamat) {
                $pegawai->alamat = $request->alamat;
            }else{
                $pegawai->alamat = null;
            }
            if ($request->file('foto')) {
                if($pegawai->foto){
                    File::delete(public_path('foto_pegawai/'.$pegawai->foto));
                }
                $filefoto = $request->file('foto');
                $fileasli = $filefoto->getClientOriginalName();
                $uploadfoto =$filefoto->move(public_path().'/foto_pegawai/',$fileasli);
                $pegawai->foto = $fileasli;
            }
            $pegawai->save();
            
            if($request->golongan){
                if($pegawai->golongan){
                    $golongan = $pegawai->golongan;
                    $golongan->golongan = $request->golongan;
                    $golongan->pangkat = $request->pangkat;
                    $golongan->save();
    
                }else{
                    $golongan = new Golongan;
                    $golongan->pegawai_id = $pegawai->id;
                    $golongan->golongan = $request->golongan;
                    $golongan->pangkat = $request->pangkat;
                    $golongan->save();
                }
            }else{
                if ($pegawai->golonga) {
                    $golongan = $pegawai->golongan;
                    $golongan->delete();
                }
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('errors','Pegawai Gagal Diedit');
        }
        return redirect()->route('dtail', ['nip' => $pegawai->nip])->with('sukses','Pegawai Berhasil Diedit');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
