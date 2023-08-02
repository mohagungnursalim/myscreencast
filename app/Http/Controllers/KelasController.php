<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       
        $kelas = Kelas::latest()->paginate(4);


        return view('dashboard.kelas.index',compact('kelas'));
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
        $validatedData = $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
            'thumbnail' => 'required|image'      
        ]);

        if($request->file('thumbnail')){
            $validatedData['thumbnail'] = $request->file('thumbnail')->store('kelas-thumbnail','public');
        }

        Kelas::create($validatedData);
       
        return redirect('/kelas')->with(['success' => 'Kelas berhasil dibuat!']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Kelas $kelas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kelas $kelas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
       $kelas = Kelas::find($id);

        $validatedData = $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required'     
        ]);

        if($request->file('thumbnail')){
            $validatedData['thumbnail'] = $request->file('thumbnail')->store('kelas-thumbnail','public');
        }

        $kelas->update($validatedData);
       
        return redirect('/kelas')->with(['success' => 'Kelas berhasil diperbaharui!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $kelas = Kelas::find($id);

        $kelas->delete();

        return redirect('/kelas')->with(['success' => 'Kelas berhasil dihapus!']);
    }
}
