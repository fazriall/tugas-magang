<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penginapan;

class PenginapanController extends Controller
{
    public function index()
    {
        $penginapans = Penginapan::with('galeries')->get();

        return view('penginapans.index', compact('penginapans'));
        
    }

    public function show(Penginapan $penginapan)
    {
        $penginapans = Penginapan::where('id', '!=', $penginapan->id)->get();

        return view('penginapans.show', compact('penginapan', 'penginapans'));
    }

    
}
