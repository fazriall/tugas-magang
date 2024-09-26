@extends('layouts.frontend')

@section('content')
<div class="container">
    <h1>Transportasi di Kota Padang</h1>
    
    <h2>Trayek Peta TransPadang</h2> 
    <p>TransPadang adalah sistem transportasi publik yang melayani wilayah Kota Padang dengan trayek yang telah ditentukan. Berikut adalah beberapa trayek yang tersedia:</p>

    <h2>Peta Halte dan Rute TransPadang</h2>
    <div id="map" style="height: 500px;"></div>

    <!-- Menambahkan legenda warna -->
    <h3>Legenda Warna Rute</h3>
    <ul>
        <li><span style="color:blue;">■</span> Koridor I: Pasar Raya – Batas Kota – Terminal Anak Air</li>
        <li><span style="color:red;">■</span> Koridor II: RTH Imam Bonjol – Bungus Teluk Kabung</li>
        <li><span style="color:green;">■</span> Koridor III: RTH Imam Bonjol – Pusat Pemerintahan Air Pacah</li>
        <li><span style="color:orange;">■</span> Koridor IV: Terminal Anak Air – Teluk Bayur</li>
        <li><span style="color:purple;">■</span> Koridor V: Pasar Raya – Indarung</li>
        <li><span style="color:yellow;">■</span> Koridor VI: Pasar Raya – Kampus Unand</li>
    </ul>
</div>

<!-- Include Leaflet, Leaflet Routing Machine, and Leaflet CSS -->
<script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js"></script>
<script src="https://unpkg.com/leaflet-routing-machine@3.2.12/dist/leaflet-routing-machine.js"></script>
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css" />

<script>
    // Inisialisasi peta
    var map = L.map('map').setView([-0.9471, 100.4172], 13); // Koordinat pusat Kota Padang

    // Menambahkan tile dari OpenStreetMap
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);

    // Data Halte TransPadang dan koordinat rutenya
    var ruteData = {
        "Koridor I": {
            "halte": [
                { "name": "Pasar Raya", "lat": -0.949855, "lng": 100.359716 },
                { "name": "Terminal Anak Air", "lat": -0.795485, "lng": 100.315529 }
            ],
            "color": "blue"
        },
        "Koridor II": {
            "halte": [
                { "name": "RTH Imam Bonjol", "lat": -0.952344, "lng": 100.361400 },
                { "name": "Bungus Teluk Kabung", "lat": -1.07291, "lng": 100.41504 }
            ],
            "color": "red"
        },
        "Koridor III": {
            "halte": [
                { "name": "RTH Imam Bonjol", "lat": -0.952344, "lng": 100.361400 },
                { "name": "Pusat Pemerintahan Air Pacah", "lat": -0.89432, "lng": 100.42225 }
            ],
            "color": "green"
        },
        "Koridor IV": {
            "halte": [
                { "name": "Terminal Anak Air", "lat": -0.795485, "lng": 100.315529 },
                { "name": "Teluk Bayur", "lat": -0.99035, "lng": 100.38234 }
            ],
            "color": "orange"
        },
        "Koridor V": {
            "halte": [
                { "name": "Pasar Raya", "lat": -0.949855, "lng": 100.359716 },
                { "name": "Indarung", "lat": -0.95637, "lng": 100.46791 }
            ],
            "color": "purple"
        },
        "Koridor VI": {
            "halte": [
                { "name": "Pasar Raya", "lat": -0.949855, "lng": 100.359716 },
                { "name": "Kampus UNAND", "lat": -0.92221, "lng": 100.44980 }
            ],
            "color": "yellow"
        }
    };

    // Data wisata terdekat untuk setiap halte
    var wisataTerdekat = {
        "Pasar Raya": ["Museum Adityawarman", "Pantai Padang"],
        "Terminal Anak Air": ["Air Terjun Lubuk Hitam", "Wisata Gunung Padang"],
        "RTH Imam Bonjol": ["Tugu Gempa", "Jembatan Siti Nurbaya"],
        "Bungus Teluk Kabung": ["Pantai Carolina", "Pantai Nirwana"],
        "Pusat Pemerintahan Air Pacah": ["Pantai Air Manis", "Miniatur Makkah"],
        "Teluk Bayur": ["Pantai Padang", "Benteng Pasar Baru"],
        "Indarung": ["Danau Cimpago", "Museum Goedang Ransoem"],
        "Kampus UNAND": ["Air Terjun Sarasah", "Bukit Nobita"]
    };

    // Fungsi untuk menambahkan rute dan marker pada peta
    function addRoute(koridor, data) {
        var waypoints = data.halte.map(function(halte) {
            return L.latLng(halte.lat, halte.lng);
        });

        // Routing berdasarkan jalur jalan (Leaflet Routing Machine)
        var control = L.Routing.control({
            waypoints: waypoints,
            lineOptions: {
                styles: [{ color: data.color, weight: 4 }]
            },
            createMarker: function(i, waypoint, n) {
                // Mengambil nama halte dan wisata terdekat
                var halteName = data.halte[i].name;
                var wisataList = wisataTerdekat[halteName] || [];
                var wisataHTML = wisataList.length > 0 ? "<br><b>Wisata Terdekat:</b> <ul>" + wisataList.map(function(wisata) {
                    return "<li>" + wisata + "</li>";
                }).join('') + "</ul>" : "<br><b>Wisata Terdekat:</b> Tidak ada data wisata terdekat.";

                // Mengembalikan marker dengan popup berisi informasi halte dan wisata terdekat
                return L.marker(waypoint.latLng).bindPopup("<b>Halte:</b> " + halteName + "<br><b>Koridor:</b> " + koridor + wisataHTML);
            },
            addWaypoints: false,
            draggableWaypoints: false
        }).addTo(map);
    }

    // Menambahkan rute untuk setiap koridor
    Object.keys(ruteData).forEach(function(koridor) {
        addRoute(koridor, ruteData[koridor]);
    });

</script>
@endsection
