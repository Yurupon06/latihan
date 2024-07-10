<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\Guru;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        $search = $request->input('search');
        $siswa = Siswa::where('name', 'like', '%'.$search.'%')
                     ->orWhere('jk', 'like', '%'.$search.'%')
                     ->orWhere('notelp', 'like', '%'.$search.'%')
                     ->get();
    
        return view('siswa.index', compact('siswa'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $guru = Guru::all();
        return view('siswa.create', compact('guru'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name' => 'required|max:50',
            'id_guru' => 'required',
            'jk' => 'required',
            'notelp' => 'required|min:5|max:13',
        ]);

        $siswa = new Siswa();
        $siswa->name = $request->name;
        $siswa->id_guru = $request->id_guru;
        $siswa->jk = $request->jk;
        $siswa->notelp = $request->notelp;
        $siswa->save();

        return redirect()->route('siswa.index')->with([
            'status' => 'simpan',
            'pesan' => 'data siswa dengan nama "' . $request->name . '" has been created ',
        ]);
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
        $siswa = Siswa::findOrFail($id);
        $guru = Guru::all();

        return view('siswa.edit', compact('siswa', 'guru'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $request->validate([
            'name' => 'required|max:50',
            'id_guru' => 'required',
            'jk' => 'required',
            'notelp' => 'required|min:5|max:13',
        ]);

        $siswa = siswa::findOrFail($id);
        $siswa->name = $request->name;
        $siswa->id_guru = $request->id_guru;
        $siswa->jk = $request->jk;
        $siswa->notelp = $request->notelp;
        $siswa->save();

        return redirect()->route('siswa.index')->with([
            'status' => 'simpan',
            'pesan' => 'data siswa dengan nama "' . $request->name . '" has been updated ',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $siswa = Siswa::find($id);
        $siswa->delete();
        return redirect()->route('siswa.index')->with('success', 'Siswa berhasil dihapus.');
    }
}
