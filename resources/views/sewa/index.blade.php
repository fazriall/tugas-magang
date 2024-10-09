@extends('layouts.frontend')

@section('content')

<section class="section" id="popular">
    <div class="container">

        <h2 class="section__title" style="text-align: center">
            Penginapan Populerr
        </h2>

        <div class="popular__container swiper">
            <div class="swiper-wrapper">
                @foreach ($penginapans as $penginapan)
                    <article class="popular__card swiper-slide">
                        <a href="{{ route('penginapan.show', $penginapan->slug) }}">
                            <!-- Cek apakah ada galeri dan cek apakah galeri berisi data -->
                            @if ($penginapan->galleries && $penginapan->galleries->isNotEmpty())
                                <img src="{{ Storage::url($penginapan->galleries->first()->images) }}" alt="{{ $penginapan->name }}" class="popular__img" />
                            @else
                                <!-- Gambar default jika tidak ada galeri -->
                                <img src="{{ asset('path/to/default/image.jpg') }}" alt="Default Image" class="popular__img" />
                            @endif

                            <div class="popular__data">
                                <h3 class="popular__title">
                                    {{ $penginapan->name }}
                                </h3>
                                <p class="popular__description">{{ $penginapan->location }}</p>
                                <p class="popular__price">Rp{{ number_format($penginapan->price, 0, ',', '.') }}</p>
                            </div>
                        </a>
                    </article>
                @endforeach
            </div>

            <!-- Swiper Navigation Buttons -->
            <div class="swiper-button-next">
                <i class="bx bx-chevron-right"></i>
            </div>
            <div class="swiper-button-prev">
                <i class="bx bx-chevron-left"></i>
            </div>
        </div>
    </div>
</section>

@endsection
