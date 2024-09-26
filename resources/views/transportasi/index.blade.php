@extends('layouts.frontend')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

@section('content')
<div class="container">
    <h1 class="text-center mb-4">Transportasi di Kota Padang</h1>
    
    <h2 class="text-center mb-3">Pilih Jenis Transportasi:</h2>
    <ul class="list-group">
        <li class="list-group-item d-flex justify-content-between align-items-center" style="font-size: 1.5rem; margin-bottom: 15px;">
            <a href="{{ route('transportasi.transpadang') }}" class="text-decoration-none">TransPadang</a>
            <i class="fas fa-bus fa-lg"></i> <!-- Ikon untuk TransPadang -->
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-center" style="font-size: 1.5rem; margin-bottom: 15px;">
            <a href="">Taksi</a>
            <i class="fas fa-taxi fa-lg"></i> <!-- Ikon untuk Taksi -->
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-center" style="font-size: 1.5rem; margin-bottom: 15px;">
            <a href="">Bis</a>
            <i class="fas fa-bus fa-lg"></i> <!-- Ikon untuk Bis -->
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-center" style="font-size: 1.5rem; margin-bottom: 15px;">
            <a href="">Ojek</a>
            <i class="fas fa-motorcycle fa-lg"></i> <!-- Ikon untuk Ojek -->
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-center" style="font-size: 1.5rem; margin-bottom: 15px;">
            <a href="">Sewa Mobil</a>
            <i class="fas fa-car fa-lg"></i> <!-- Ikon untuk Sewa Mobil -->
        </li>
    </ul>
</div>
@endsection
