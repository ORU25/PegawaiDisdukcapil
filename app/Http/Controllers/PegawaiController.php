<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use Illuminate\Http\Request;

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
            'nip' => 'required',
            'hp' => 'required',
            'email' => 'required | email',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required | date',
            'jenis' => 'required',
            'jenis_kelamin' => 'required',
            'alamat' => '',
            'foto' => 'image|mimes:jpg,jpeg,png|max:2048',
        ]);
        try {
            $pegawai = new Pegawai;
            $pegawai->nama_lengkap = $request->nama_lengkap;
            $pegawai->nip = $request->nip;
            $pegawai->hp = $request->hp;
            $pegawai->email = $request->email;
            $pegawai->tempat_lahir = $request->tempat_lahir;
            $pegawai->tanggal_lahir = $request->tanggal_lahir;
            $pegawai->jenis = $request->jenis;
            $pegawai->jenis_kelamin = $request->jenis_kelamin;
            $pegawai->alamat = $request->alamat;
            if ($request->file('foto')) {
                # code...
                $filefoto = $request->file('foto');
                $fileasli = $filefoto->getClientOriginalName();
                $uploadfoto =$filefoto->move(public_path().'/foto_pegawai/',$fileasli);
                $pegawai->foto = $fileasli;
            }

            $pegawai->save();
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
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $nip)
    {
        try {
            $pegawai = Pegawai::where('nip',$nip)->first();
            $pegawai->delete();
        } catch (\Throwable $th) {
            return redirect()->back()->with('errors','Pegawai Gagal Dihapus');
        }
        return redirect()->back()->with('sukses','Pegawai Berhasil Dihapus');
    }
}
