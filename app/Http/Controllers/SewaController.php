<?php

// TransportasiController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SewaController extends Controller
{
    public function index()
    {
        return view('sewa.index');
    }

    public function transpadang()
    {
        return view('sewa.index'); 
    }
    
    
}
