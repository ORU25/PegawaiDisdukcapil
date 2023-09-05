<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use App\Models\Golongan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pegawai = Pegawai::all();
        return view('pegawai.index')->with('pegawai',$pegawai);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_lengkap' => 'required',
            'nip' => 'required | unique:pegawais',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required | date',
            'jenis' => 'required',
            'jenis_kelamin' => 'required',
            'foto' => 'image|mimes:jpg,jpeg,png|max:2048',
        ]);
        try {
            $pegawai = new Pegawai;
            $pegawai->nama_lengkap = $request->nama_lengkap;
            $pegawai->nip = $request->nip;
            if ($request->hp) {
                $pegawai->hp = $request->hp;
            }
            if ($request->email) {
                $pegawai->email = $request->email;
            }
            $pegawai->tempat_lahir = $request->tempat_lahir;
            $pegawai->tanggal_lahir = $request->tanggal_lahir;
            $pegawai->jenis = $request->jenis;
            $pegawai->jenis_kelamin = $request->jenis_kelamin;
            if ($request->alamat) {
                $pegawai->alamat = $request->alamat;
            }
            if ($request->file('foto')) {
                $filefoto = $request->file('foto');
                $fileasli = $filefoto->getClientOriginalName();
                $uploadfoto =$filefoto->move(public_path().'/foto_pegawai/',$fileasli);
                $pegawai->foto = $fileasli;
            }
            $pegawai->save();

            if($request->golongan){
                $golongan = new Golongan;
                $golongan->pegawai_id = $pegawai->id;
                $golongan->save();
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('errors','Pegawai Gagal Ditambah');
        }
        return redirect()->back()->with('sukses','Pegawai Berhasil Ditambah');
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
    // public function update(Request $request, string $id)
    // {
    //     $request->validate([
    //         'nama_lengkap' => 'required',
    //         'nip' => 'required | unique:pegawais',
    //         'tempat_lahir' => 'required',
    //         'tanggal_lahir' => 'required | date',
    //         'jenis' => 'required',
    //         'jenis_kelamin' => 'required',
    //         'foto' => 'image|mimes:jpg,jpeg,png|max:2048',
    //     ]);
    //     try {
    //         $pegawai = Pegawai::find($id);
    //         $pegawai->nama_lengkap = $request->nama_lengkap;
    //         $pegawai->nip = $request->nip;
    //         if ($request->hp) {
    //             $pegawai->hp = $request->hp;
    //         }
    //         if ($request->email) {
    //             $pegawai->email = $request->email;
    //         }
    //         $pegawai->tempat_lahir = $request->tempat_lahir;
    //         $pegawai->tanggal_lahir = $request->tanggal_lahir;
    //         $pegawai->jenis = $request->jenis;
    //         $pegawai->jenis_kelamin = $request->jenis_kelamin;
    //         if ($request->alamat) {
    //             $pegawai->alamat = $request->alamat;
    //         }
    //         if ($request->file('foto')) {
    //             $filefoto = $request->file('foto');
    //             $fileasli = $filefoto->getClientOriginalName();
    //             $uploadfoto =$filefoto->move(public_path().'/foto_pegawai/',$fileasli);
    //             $pegawai->foto = $fileasli;
    //         }
    //         $pegawai->save();
            
    //         if($request->golongan){
    //             if($pegawai->golongan){
    //                 $golongan = Golongan::where('pegawai_id',$pegawai->id);
    //                 $golongan->golongan = $request->golongan;
    //                 $golongan->save();
    
    //             }else{
    //                 $golongan = new Golongan;
    //                 $golongan->pegawai_d = $pegawai->id;
    //                 $golongan->golongan = $request->golongan;
    //                 $golongan->save();
    //             }
    //         }
    //     } catch (\Exception $e) {
    //         return redirect()->back()->with('errors','Pegawai Gagal Ditambah');
    //     }
    //     return redirect()->back()->with('sukses','Pegawai Berhasil Ditambah');
    // }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $nip)
    {
        try {
            $pegawai = Pegawai::where('nip',$nip)->first();
            if($pegawai->foto){
                File::delete(public_path('foto_pegawai/'.$pegawai->foto));
            }
            $pegawai->delete();
        } catch (\Throwable $th) {
            return redirect()->back()->with('errors','Pegawai Gagal Dihapus');
        }
        $pegawai = Pegawai::all();
        return view('pegawai.index')->with('sukses','Pegawai Berhasil Dihapus')->with('pegawai',$pegawai);
    }
}
