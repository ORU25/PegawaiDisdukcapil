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
        $jabatan = Jabatan::all();
        return view('jabatan.index')->with('jabatan',$jabatan);
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
        try{
            $jabatan = new Jabatan;
            $jabatan->nama_jabatan = $request->nama_jabatan;
            $jabatan->save();
        } catch (\Exception $e) {
            return redirect()->back()->with('errors','Jabatan Gagal Ditambah');
        }
        return redirect()->back()->with('sukses','Jabatan Berhasil Ditambah');
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
        try{
            $jabatan = Jabatan::find($id);
            $jabatan->nama_jabatan = $request->nama_jabatan;
            $jabatan->save();
        } catch (\Exception $e) {
            return redirect()->back()->with('errors','Jabatan Gagal Diedit');
        }
        return redirect()->back()->with('sukses','Jabatan Berhasil Diedit');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try{
            $jabatan = Jabatan::find($id);
            $jabatan->delete();
        } catch (\Exception $e) {
            return redirect()->back()->with('errors','Jabatan Gagal Dihapus');
        }
        return redirect()->back()->with('sukses','Jabatan Berhasil Dihapus');
    }
}
