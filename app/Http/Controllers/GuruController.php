<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use App\Models\Guru;
use Illuminate\Http\Request;

class GuruController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        $guru = Guru::where('name', 'like', '%'.$search.'%')
                     ->orWhere('jk', 'like', '%'.$search.'%')
                     ->orWhere('notelp', 'like', '%'.$search.'%')
                     ->get();
    
        return view('guru.index', compact('guru'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('guru.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:50',
            'jk' => 'required',
            'notelp' => 'required|min:5|max:13',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        $guru = new Guru();
        $guru->name = $request->name;
        $guru->jk = $request->jk;
        $guru->notelp = $request->notelp;
        if ($request->hasFile('foto')) {
            $guru->foto = $request->file('foto')->store('Guru');
        }
        $guru->save();
    
        return redirect()->route('guru.index')->with([
            'status' => 'simpan',
            'pesan' => 'data guru dengan nama "' . $request->name . '" has been created ',
        ]);
    }
    

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Implement this method if needed
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $guru = Guru::findOrFail($id);
        return view('guru.edit', compact('guru'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|max:50',
            'jk' => 'required',
            'notelp' => 'required|min:5|max:13',
            'foto' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $guru = Guru::findOrFail($id);
        $guru->name = $request->name;
        $guru->jk = $request->jk;
        $guru->notelp = $request->notelp;
        if ($request->hasFile('foto')) {
            // Delete old photo
            if (Storage::exists($guru->foto)) {
                Storage::delete($guru->foto);
            }
            $guru->foto = $request->file('foto')->store('Guru');
        }
        $guru->save();

        return redirect()->route('guru.index')->with([
            'status' => 'simpan',
            'pesan' => 'data guru dengan nama "' . $request->name . '" has been updated ',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $guru = Guru::findOrFail($id);

        // Delete photo if exists
        if (Storage::exists($guru->foto)) {
            Storage::delete($guru->foto);
        }
    
        $guru->delete();
    
        return redirect()->route('guru.index')->with('success', 'Guru berhasil dihapus.');
    }
}
