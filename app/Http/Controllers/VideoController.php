<?php

namespace App\Http\Controllers;

use App\Models\Video;
use App\Models\Kelas;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       
        $videos = Video::latest()->paginate(10);
        $kelas = Kelas::select('judul')->latest()->get();

        return view('dashboard.video.index',compact('videos','kelas'));
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
            'kelas' => 'exists:kelas,judul',
            'judul' => 'required',
            'deskripsi' => 'required',
            'video' => 'required',
            'durasi' => 'required|date_format:H:i'      
        ]);

        
        Video::create($validatedData);
       
        return redirect('/video')->with(['success' => 'Video berhasil ditambahkan']);
   
    }

    /**
     * Display the specified resource.
     */
    public function show(Video $video)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Video $video)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {

        $video = Video::find($id);

        $validatedData = $request->validate([
            'kelas' => 'exists:kelas,judul',
            'judul' => 'required',
            'deskripsi' => 'required',
            'video' => 'required',
            'durasi' => 'required|date_format:H:i'      
        ]);

        
        $video->update($validatedData);
       
        return redirect('/video')->with(['success' => 'Video berhasil diperbaharui!']);
   
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $video = Video::find($id);

        $video->delete();

        return redirect('/video')->with(['success' => 'Video berhasil dihapus!']);
    }
}
