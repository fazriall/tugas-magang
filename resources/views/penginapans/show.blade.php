@extends('layouts.frontend')

@section('content')
    <!--==================== HOME ====================-->
    <section>
        <div class="swiper-container gallery-top">
            <div class="swiper-wrapper">
                @foreach ($penginapan->galeries as $galeri)
                    <section class="islands swiper-slide">
                        <img src="{{ Storage::url($galeri->images) }}" alt="" class="islands__bg" />

                        <div class="islands__container container">
                            <div class="islands__data">
                                <h2 class="islands__subtitle">Explore</h2>
                                <h1 class="islands__title">{{ $galeri->name }}</h1>
                            </div>
                        </div>
                    </section>
                @endforeach
            </div>
        </div>

        <!--========== CONTROLS ==========-->
        <div class="controls galeri-thumbs">
            <div class="controls__container swiper-wrapper">
                @foreach ($penginapan->galeries as $galeri)
                    <img src="{{ Storage::url($galeri->images) }}" alt="" class="controls__img swiper-slide" />
                @endforeach
            </div>
        </div>
    </section>

    <section class="blog section" id="blog">
        <div class="blog__container container">
            <div class="content__container">
                <div class="blog__detail">
                    {!! $penginapan->description !!}
                </div>
                <div class="package-penginapan">
                    <h3>Booking sekarang</h3>
                    <div class="card">
                        <form action="{{ route('booking.store') }}" method="post">
                            @csrf
                            <input type="hidden" name="penginapan_id" value="{{ $penginapan->id }}">
                            <input type="text" name="name" placeholder="Your Name" required />
                            <input type="email" name="email" placeholder="Your Email" required />
                            <input type="number" name="number_phone" placeholder="Your Number" required />
                            <input placeholder="Pick Your Date" class="textbox-n" type="text" name="date"
                                onfocus="(this.type='date')" id="date" required />
                            <button type="submit" class="button button-booking">Send</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section" id="popular">
        <div class="container">
            <span class="section__subtitle" style="text-align: center">Penginapan</span>
            <h2 class="section__title" style="text-align: center">
                The Best Accommodation For You
            </h2>

            <div class="popular__all">
                @foreach ($penginapans as $penginapan)
                    <article class="popular__card">
                        <a href="{{ route('penginapan.show', $penginapan->slug) }}">
                            <img src="{{ Storage::url($penginapan->galeries->first()->images) }}" alt=""
                                class="popular__img" />
                            <div class="popular__data">
                                <h2 class="popular__price"><span>Rp</span>{{ number_format($penginapan->price, 2, ',', '.') }}</h2>
                                <h3 class="popular__title">{{ $penginapan->location }}</h3>
                                <p class="popular__description">{{ $penginapan->type }}</p>
                            </div>
                        </a>
                    </article>
                @endforeach
            </div>
        </div>
    </section>

    @if (session()->has('message'))
        <div id="alert" class="alert">
            {{ session()->get('message') }}
            <i class='bx bx-x alert-close' id="close"></i>
        </div>
    @endif
@endsection

@push('style-alt')
    <style>
        .alert {
            position: absolute;
            top: 120px;
            left: 0;
            right: 0;
            background-color: var(--second-color);
            color: white;
            padding: 1rem;
            width: 70%;
            z-index: 99;
            margin: auto;
            border-radius: .25rem;
            text-align: center;
        }

        .alert-close {
            font-size: 1.5rem;
            color: #090909;
            position: absolute;
            top: .25rem;
            right: .5rem;
            cursor: pointer;
        }

        blockquote {
            border-left: 8px solid #b4b4b4;
            padding-left: 1rem;
        }

        .blog__detail ul li {
            list-style: initial;
        }
    </style>
@endpush

@push('script-alt')
    <script>
        let galleryThumbs = new Swiper('.gallery-thumbs', {
            spaceBetween: 0,
            slidesPerView: 0,
        });

        let galleryTop = new Swiper('.gallery-top', {
            effect: 'fade',
            loop: true,

            thumbs: {
                swiper: galleryThumbs,
            },
        });

        const close = document.getElementById('close');
        const alert = document.getElementById('alert');
        if (close) {
            close.addEventListener('click', function() {
                alert.style.display = 'none';
            })
        }
    </script>
@endpush
