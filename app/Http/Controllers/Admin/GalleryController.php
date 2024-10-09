<?php

namespace App\Http\Controllers\Admin;

use App\Models\Gallery;
use Illuminate\Http\Request;
use App\Models\TravelPackage;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Http\Requests\Admin\GalleryRequest;
use App\Models\Penginapan;

class GalleryController extends Controller
{
    /**
     * Store a newly created resource in storage for Travel Package.
    
     */
    public function store(GalleryRequest $request, TravelPackage $travel_package)
    {
        // Validasi dan simpan gambar
        $images = $request->file('images')->store('travel_package/gallery', 'public');

        Gallery::create(array_merge($request->except('images'), [
            'images' => $images,
            'travel_package_id' => $travel_package->id
        ]));

        return redirect()->route('admin.travel_packages.edit', $travel_package->id)->with([
            'message' => 'Success Created!',
            'alert-type' => 'success'
        ]);
    }
    
    /**
     * Edit for Travel Package.
     */
    public function edit(TravelPackage $travel_package, Gallery $gallery)
    {
        return view('admin.galleries.edit', compact('travel_package', 'gallery'));
    }


    /**
     * Update the specified resource in storage for Travel Package.
     */
    public function update(GalleryRequest $request, TravelPackage $travel_package, Gallery $gallery)
    {
        if ($request->hasFile('images')) {
            // Hapus gambar lama
            File::delete(public_path('storage/' . $gallery->images));

            // Simpan gambar baru
            $images = $request->file('images')->store('travel_package/gallery', 'public');
            $gallery->update(array_merge($request->validated(), [
                'images' => $images,
                'travel_package_id' => $travel_package->id
            ]));
        } else {
            $gallery->update($request->validated());
        }

        return redirect()->route('admin.travel_packages.edit', $travel_package->id)->with([
            'message' => 'Success Updated!',
            'alert-type' => 'info'
        ]);
    }

   

    /**
     * Remove the specified resource from storage for Travel Package.
     */
    public function destroy(TravelPackage $travel_package, Gallery $gallery)
    {
        // Hapus gambar dari storage
        File::delete(public_path('storage/' . $gallery->images));
        $gallery->delete();

        return redirect()->back()->with([
            'message' => 'Success Deleted!',
            'alert-type' => 'danger'
        ]);
    }

    }

