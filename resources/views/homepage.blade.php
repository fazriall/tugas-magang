@extends('layouts.frontend')

@php
    function convertToIDR($amountInUSD)
    {
        $exchangeRate = 15000; // Contoh nilai tukar USD ke IDR
        $amountInIDR = $amountInUSD * $exchangeRate;
        return $amountInIDR;
    }
@endphp

@section('content')
    <!--==================== HOME ====================-->
    <section>
        <div class="swiper-container">
            <div>
                <section class="islands">
                    <img src="{{ asset('frontend/assets/img/hero.jpeg') }}" alt="" class="islands__bg" />
                    <div class="bg__overlay">
                        <div class="islands__container container">
                            <div class="islands__data" style="z-index: 99; position: relative">
                                <h1 class="islands__title">
                                    PADANG
                                </h1>
                                <p class="islands__description">
                                    Selamat datang di wisata Kota Padang
                                </p>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </section>



    <!--==================== POPULAR ====================-->
    <section class="section" id="popular">
        <div class="container">

            <h2 class="section__title" style="text-align: center">
                Tempat Populer
            </h2>

            <div class="popular__container swiper">
                <div class="swiper-wrapper">
                    @foreach ($travel_packages as $travel_package)
                        <article class="popular__card swiper-slide">
                            <a href="{{ route('travel_package.show', $travel_package->slug) }}">
                                <img src="{{ Storage::url($travel_package->galleries->first()->images) }}" alt=""
                                    class="popular__img" />
                                <div class="popular__data">

                                    <h3 class="popular__title">
                                        {{ $travel_package->location }}
                                    </h3>
                                    <p class="popular__description">{{ $travel_package->type }}</p>
                                </div>
                            </a>
                        </article>
                    @endforeach
                </div>

                <div class="swiper-button-next">
                    <i class="bx bx-chevron-right"></i>
                </div>
                <div class="swiper-button-prev">
                    <i class="bx bx-chevron-left"></i>
                </div>
            </div>
        </div>
    </section>

    <!--==================== VALUE ====================-->
    <section class="value section" id="value">
        <div class="value__container container grid">
            <div class="value__images">
                <div class="value__orbe"></div>

                <div class="value__img">
                    <img src="{{ asset('frontend/assets/img/team.jpg') }}" alt="" />
                </div>
            </div>

            <div class="value__content">
                <div class="value__data">
                    <h2 class="section__title">
                        Memberikan pelayaan informasi sebaik mungkin Kepada Anda
                    </h2>
                    <p class="value__description">
                        Kami selalu siap melayani dengan memberikan pelayanan terbaik untuk Anda.
                        Kami membuat pilihan yang baik untuk bepergian ke seluruh wisata yang ada di kota padang.
                    </p>
                </div>

                <div class="value__accordion">
                    <div class="value__accordion-item">
                        <header class="value__accordion-header">
                            <i class="bx bxs-shield-x value-accordion-icon"></i>
                            <h3 class="value__accordion-title">
                                Tempat terbaik di padang
                            </h3>
                            <div class="value__accordion-arrow">
                                <i class="bx bxs-down-arrow"></i>
                            </div>
                        </header>

                        <div class="value__accordion-content">
                            <p class="value__accordion-description">
                                Kami menyediakan tempat-tempat terbaik di sekitar
                                kota pdang dan memiliki kualitas yang baik
                                di sana.
                            </p>
                        </div>
                        
                    </div>
                    <div class="value__accordion-item">
                        <header class="value__accordion-header">
                            <i class="bx bxs-x-square value-accordion-icon"></i>
                            <h3 class="value__accordion-title">
                                Temukan fasilitas akomodasi terbaik di kota padang
                            </h3>
                            <div class="value__accordion-arrow">
                                <i class="bx bxs-down-arrow"></i>
                            </div>
                        </header>

                        <div class="value__accordion-content">
                            <p class="value__accordion-description">
                                Kami mencoba membuat perjalanan anda di kota padang senyaman da sebaik mungkin.
                            </p>
                        </div>
                    </div>
                    <div class="value__accordion-item">
                        <header class="value__accordion-header">
                            <i class="bx bxs-x-square value-accordion-icon"></i>
                            <h3 class="value__accordion-title">
                                bantuan contact center 24 jam
                            </h3>
                            <div class="value__accordion-arrow">
                                <i class="bx bxs-down-arrow"></i>
                            </div>
                        </header>

                        <div class="value__accordion-content">
                            <p class="value__accordion-description">
                                Kami mencoba membuat perjalanan anda di kota padang senyaman da sebaik mungkin.
                            </p>
                        </div>
                    </div>
                    <div class="value__accordion-item">
                        <header class="value__accordion-header">
                            <i class="bx bxs-check-square value-accordion-icon"></i>
                            <h3 class="value__accordion-title">
                                temukan oleh-ileh khas padang
                            </h3>
                            <div class="value__accordion-arrow">
                                <i class="bx bxs-down-arrow"></i>
                            </div>
                        </header>

                        <div class="value__accordion-content">
                            <p class="value__accordion-description">
                                memastikan bahwa layanan kami memiliki
                                keamanan yang sangat baik.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
