@extends('layouts.frontend')

@push('style-alt')
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
        integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <style>
        /* Ukuran dan tampilan peta */
        #map {
            height: 500px;
            width: 100%;
            margin: 0 auto;
        }
    </style>
@endpush

@section('content')
    <!--==================== HOME ====================-->
    <section class="blog section" id="LokasiWisata">
        <div class="blog__container container">
            <div class="blog__content">
                <section class="islands swiper-slide">
                    <div id="map"></div>
                </section>

                <!-- Modal untuk menampilkan informasi wisata -->
                <div class="modal fade" id="wisataModal" tabindex="-1" role="dialog" aria-labelledby="wisataModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="wisataModalLabel">Informasi Wisata</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <h3 id="modal-title"></h3>
                                <p id="modal-description"></p>
                                <p><strong>Fasilitas Umum:</strong> <span id="modal-fasilitas"></span></p>
                                <img id="modal-image" src="" alt="" style="max-width: 100%; height: auto; border-radius: 8px;">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('script-alt')
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
        integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        // Membuat peta dengan koordinat kota Padang
        const map = L.map('map').setView([-0.9470836, 100.417181], 12);

        // Menggunakan tile dari OpenStreetMap
        const tiles = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
        }).addTo(map);

        // Data popup wisata dan fasilitas di kota Padang
        const popups = [
            {
                position: [-0.967603, 100.360976],
                title: 'Pantai Padang',
                description: 'Pantai Padang adalah salah satu destinasi wisata populer di kota Padang dengan pemandangan indah dan lokasi yang strategis.',
                image: 'path/to/pantai-padang.jpg',
                fasilitas: 'Tersedia toilet umum, area parkir, dan warung makanan.'
            },
            {
                position: [-0.957014, 100.358688],
                title: 'Jembatan Siti Nurbaya',
                description: 'Jembatan ini terkenal karena menjadi simbol dari legenda Siti Nurbaya yang melegenda di Sumatera Barat.',
                image: 'path/to/jembatan-siti-nurbaya.jpg',
                fasilitas: 'Tersedia area parkir, penerangan malam, dan area duduk.'
            },
            {
                position: [-1.002377, 100.372581],
                title: 'Pantai Air Manis',
                description: 'Pantai Air Manis adalah tempat legendaris di mana terdapat Batu Malin Kundang yang melegenda.',
                image: '{{ asset('images/team.jpg') }}',
                fasilitas: 'Tersedia toilet umum, area parkir, dan warung makanan.'
            }
        ];

        // Loop untuk menambahkan marker dan event click pada marker untuk membuka modal
        popups.forEach(popup => {
            const marker = L.marker(popup.position).addTo(map)
                .bindPopup(popup.title);

            // Menangani event click pada marker
            marker.on('click', function() {
                // Update konten modal
                document.getElementById('modal-title').innerText = popup.title;
                document.getElementById('modal-description').innerText = popup.description;
                document.getElementById('modal-fasilitas').innerText = popup.fasilitas;
                document.getElementById('modal-image').src = popup.image;

                // Menampilkan modal
                $('#wisataModal').modal('show');
            });
        });
    </script>
@endpush
