<?php

namespace App\Http\Controllers\Admin;

use App\Models\Galeri;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Penginapan;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PenginapanRequest;

class PenginapanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $penginapans = Penginapan::paginate(10);

        return view('admin.penginapans.index', compact('penginapans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.penginapans.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(penginapanRequest $request)
    {
        if($request->validated()) {
            $slug = Str::slug($request->location, '-');
            $penginapan = Penginapan::create($request->validated() + ['slug' => $slug ]);
        }

        return redirect()->route('admin.penginapans.edit', [$penginapan])->with([
            'message' => 'Success Created !',
            'alert-type' => 'success'
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Penginapan $penginapan)
    {
        $galeries = Galeri::where('penginapan_id', $penginapan->id)->paginate(10); // Mengambil galeri yang berhubungan dengan penginapan
    
        return view('admin.penginapans.edit', compact('penginapan', 'galeries')); // Menampilkan form edit
    }
    

    /**
     * Update the specified resource in storage.
     */
    public function update(penginapan $request, penginapan $penginapan)
    {
        if($request->validated()) {
            $slug = Str::slug($request->location, '-');
            $penginapan->update($request->validated() + ['slug' => $slug]);
        }

        return redirect()->route('admin.penginapans.index')->with([
            'message' => 'Success Updated !',
            'alert-type' => 'info'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Penginapan $penginapan)
    {
        $penginapan->delete();

        return redirect()->back()->with([
            'message' => 'Success Deleted !',
            'alert-type' => 'danger'
        ]);
    }
}
