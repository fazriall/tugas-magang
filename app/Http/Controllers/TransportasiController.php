<?php

// TransportasiController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TransportasiController extends Controller
{
    public function index()
    {
        return view('transportasi.index');
    }

    public function transpadang()
    {
        return view('transportasi.transpadang'); // pastikan Anda memiliki file ini
    }
}
