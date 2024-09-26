@extends('layouts.frontend')

@section('content')
<div class="container">
    <h1 class="text-center mt-5">Rekomendasi Penginapan di Kota Padang</h1>
    <p class="text-center mb-4">Nikmati kenyamanan menginap di beberapa penginapan terbaik di Kota Padang yang menawarkan fasilitas lengkap dan akses mudah ke berbagai destinasi wisata.</p>

    <div class="row">
        <!-- Penginapan 1 -->
        <div class="col-md-4">
            <div class="card">
                <img src="{{ asset('images/penginapan1.jpg') }}" class="card-img-top" alt="Hotel Padang View">
                <div class="card-body">
                    <h5 class="card-title">Hotel Padang View</h5>
                    <p class="card-text">Hotel mewah dengan pemandangan indah Pantai Padang, fasilitas kolam renang, restoran, dan akses cepat ke pusat kota.</p>
                    <button class="btn btn-primary" onclick="showPopup('popup1')">Lihat Detail</button>
                </div>
            </div>
        </div>

        <!-- Pop-up Detail Penginapan 1 -->
        <div id="popup1" class="popup">
            <div class="popup-content">
                <span class="close" onclick="hidePopup('popup1')">&times;</span>
                <h2>Hotel Padang View</h2>
                <img src="{{ asset('images/penginapan1.jpg') }}" class="img-fluid mb-3" alt="Hotel Padang View">
                <p>Hotel mewah dengan pemandangan indah Pantai Padang, fasilitas kolam renang, restoran, dan akses cepat ke pusat kota. Nikmati layanan premium dan kenyamanan maksimal selama Anda menginap di sini.</p>
                <p><strong>Fasilitas:</strong></p>
                <ul>
                    <li>Kolam renang</li>
                    <li>Restoran</li>
                    <li>Parkir gratis</li>
                    <li>Wi-Fi gratis</li>
                </ul>
                <p><strong>Harga:</strong> Mulai dari Rp 750.000 per malam</p>
                <a href="#" class="btn btn-primary">Pesan Sekarang</a>
            </div>
        </div>

        <!-- Penginapan 2 -->
        <div class="col-md-4">
            <div class="card">
                <img src="{{ asset('images/penginapan2.jpg') }}" class="card-img-top" alt="Homestay Siti Nurbaya">
                <div class="card-body">
                    <h5 class="card-title">Homestay Siti Nurbaya</h5>
                    <p class="card-text">Penginapan nyaman dengan nuansa rumah lokal, cocok untuk keluarga, terletak dekat dengan Jembatan Siti Nurbaya.</p>
                    <button class="btn btn-primary" onclick="showPopup('popup2')">Lihat Detail</button>
                </div>
            </div>
        </div>

        <!-- Pop-up Detail Penginapan 2 -->
        <div id="popup2" class="popup">
            <div class="popup-content">
                <span class="close" onclick="hidePopup('popup2')">&times;</span>
                <h2>Homestay Siti Nurbaya</h2>
                <img src="{{ asset('images/penginapan2.jpg') }}" class="img-fluid mb-3" alt="Homestay Siti Nurbaya">
                <p>Homestay nyaman dengan nuansa rumah lokal, cocok untuk keluarga, terletak dekat dengan Jembatan Siti Nurbaya.</p>
                <p><strong>Fasilitas:</strong></p>
                <ul>
                    <li>Wi-Fi gratis</li>
                    <li>Parkir gratis</li>
                    <li>Dapur umum</li>
                    <li>Area bermain anak</li>
                </ul>
                <p><strong>Harga:</strong> Mulai dari Rp 350.000 per malam</p>
                <a href="#" class="btn btn-primary">Pesan Sekarang</a>
            </div>
        </div>

        <!-- Tambahkan penginapan lainnya dengan pola yang sama -->
    </div>
</div>
@endsection

@push('style-alt')
    <style>
        /* Styling untuk Pop-up */
        .popup {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
        }

        .popup-content {
            background-color: #fff;
            margin: 10% auto;
            padding: 20px;
            border-radius: 8px;
            width: 50%;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
        }

        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
            cursor: pointer;
        }

        .close:hover, .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }

        .popup-content img {
            width: 100%;
            border-radius: 8px;
        }

        @media (max-width: 768px) {
            .popup-content {
                width: 90%;
            }
        }
    </style>
@endpush

@push('script-alt')
    <script>
        // Fungsi untuk menampilkan pop-up
        function showPopup(id) {
            document.getElementById(id).style.display = "block";
        }

        // Fungsi untuk menyembunyikan pop-up
        function hidePopup(id) {
            document.getElementById(id).style.display = "none";
        }
    </script>
@endpush
