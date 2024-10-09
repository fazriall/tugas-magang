<?php

namespace App\Http\Controllers\Admin;

use App\Models\Galeri;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Http\Requests\Admin\GaleriRequest;
use App\Models\Penginapan;

class GaleriController extends Controller
{
    /**
     * Store a newly created resource in storage for Travel Package.
    
     */
    public function store(GaleriRequest $request, Penginapan $penginapan)
    {
        // Validasi dan simpan gambar
        $images = $request->file('images')->store('penginapan/gallery', 'public');

        Galeri::create(array_merge($request->except('images'), [
            'images' => $images,
            'penginapan_id' => $penginapan->id
        ]));

        return redirect()->route('admin.penginapans.edit', $penginapan->id)->with([
            'message' => 'Success Created!',
            'alert-type' => 'success'
        ]);
    }
    
    /**
     * Edit for Travel Package.
     */
    public function edit(Penginapan $penginapan, Galeri $galeri)
    {
        return view('admin.galeries.edit', compact('penginapan', 'galeri'));
    }


    /**
     * Update the specified resource in storage for Travel Package.
     */
    public function update(GaleriRequest $request, Penginapan $penginapan, Galeri $galeri)
    {
        if ($request->hasFile('images')) {
            // Hapus gambar lama
            File::delete(public_path('storage/' . $penginapan->images));

            // Simpan gambar baru
            $images = $request->file('images')->store('penginapan/galeri', 'public');
            $galeri->update(array_merge($request->validated(), [
                'images' => $images,
                'penginapan_id' => $penginapan->id
            ]));
        } else {
            $galeri->update($request->validated());
        }

        return redirect()->route('admin.penginapans.edit', $penginapan->id)->with([
            'message' => 'Success Updated!',
            'alert-type' => 'info'
        ]);
    }

   

    /**
     * Remove the specified resource from storage for Travel Package.
     */
    public function destroy(Penginapan $penginapan, Galeri $galeri)
    {
        // Hapus gambar dari storage
        File::delete(public_path('storage/' . $galeri->images));
        $galeri->delete();

        return redirect()->back()->with([
            'message' => 'Success Deleted!',
            'alert-type' => 'danger'
        ]);
    }

    }

