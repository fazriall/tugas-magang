<?php

// PenginapanController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PenginapanController extends Controller
{
    public function index()
    {
        return view('penginapan.index');
    }
}
