<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!--=============== BOXICONS ===============-->
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />

    <!--=============== SWIPER CSS ===============-->
    <link rel="stylesheet" href="{{ asset('frontend/assets/libraries/swiper-bundle.min.css') }}" />

    <!--=============== CSS ===============-->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/style.css') }}" />
    @stack('style-alt')
    <title>Keliling padang</title>
</head>

<body>
    <!--==================== HEADER ====================-->
    <header class="header" id="header">
        <nav class="nav container">
            <a href="{{ route('homepage') }}" class="nav__logo">KELILING<i class="bx bxs-map"></i>PADANG</a>

            <div class="nav__menu">
                <ul class="nav__list">
                    <li class="nav__item">
                        <a href="{{ route('homepage') }}"
                            class="nav__link {{ request()->is('/') ? ' active-link' : '' }}">
                            <i class="bx bx-home-alt"></i>
                            <span>Home</span>
                        </a>
                    </li>

                    <div class="nav__menu">
                        <ul class="nav__list">
                            <li class="nav__item">
                                <a href="{{ route('homepage') }}"
                                    class="nav__link {{ request()->is('/') ? ' active-link' : '' }}">
                                    <i class="bx bx-home-alt"></i>
                                    <span>Market place</span>
                                </a>
                            </li>
                            <div class="nav__item">
                                <ul class="nav__list">
                                    <li class="nav__item">
                                        <a href="#" class="nav__link {{ request()->is('/') ? ' active-link' : '' }}" id="akomodasi-link">
                                            <i class="bx bx-award"></i>
                                            <span>Akomodasi</span>
                                        </a>
                                        <!-- Submenu -->
                                        <ul class="submenu" id="akomodasi-submenu" style="display: none;">
                                            <li><a href="{{ route('transportasi.index') }}">Transportasi</a></li>
                                            <li><a href="{{ route('penginapan.index') }}">Penginapan</a></li> 
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                            
                            
                    <li class="nav__item">
                        <a href="{{ route('location.index') }}"
                            class="nav__link {{ request()->is('locations') || request()->is('locations/*') ? ' active-link' : '' }}">
                            <i class="bx bx-award"></i>
                            <span>Destinasi</span>
                        </a>
                        <li class="nav__item">
                            <a href="{{ route('location.index') }}"
                                class="nav__link {{ request()->is('locations') || request()->is('locations/*') ? ' active-link' : '' }}">
                                <i class="bx bx-award"></i>
                                <span>Event</span>
                            </a>   
                    </li>
                    <li class="nav__item">
                        <a href="{{ route('contact') }}"
                            class="nav__link {{ request()->is('contact') ? ' active-link' : '' }}">
                            <i class="bx bx-phone"></i>
                            <span>Contact</span>
                        </a>
                    </li>
                </ul>
            </div>

            <!-- theme -->
           
    </header>

    <!--==================== MAIN ====================-->
    <main class="main">
        @yield('content')
    </main>

    <!--==================== FOOTER ====================-->
    <footer class="footer section">
        <div class="footer__container container grid">
            <div>
                <a href="{{ route('homepage') }}" class="footer__logo">
                    KELLILING<i class="bx bxs-map"></i>PADANG
                </a>
                <p class="footer__description">
                    Visi kami adalah membantu orang menemukan <br />
                    Tempat wisata di kota padang terbaik untuk <br> bepergian dengan keamanan tinggi.
                </p>
            </div>

            <div class="footer__content">
                <div>
                    <h3 class="footer__title">About</h3>

                    <ul class="footer__links">
                        <li>
                            <a href="#" class="footer__link">About Us</a>
                        </li>
                        <li>
                            <a href="#" class="footer__link">Features </a>
                        </li>
                        <li>
                            <a href="#" class="footer__link">News & Blog</a>
                        </li>
                    </ul>
                </div>
                <div>

                    <h3 class="footer__title">Dinas</h3>

                    <ul class="footer__links">
                        <li>
                            <a href="#" class="footer__link">H
                            </a>
                        </li>
                        <li>
                        <a href="#" class="footer__link">Capital </a>
                        </li>
                        <li>
                            <a href="#" class="footer__link"> Security</a>
                        </li>
                    </ul>
                </div>
                <div>
                    <h3 class="footer__title">Support</h3>

                    <ul class="footer__links">
                        <li>

                         <a href="#" class="footer__link">FAQs </a>
                        </li>
                        <li>
                            <a href="#" class="footer__link">Support center
                            </a>
                        </li>
                        <li>
                            <a href="#" class="footer__link"> Contact Us</a>
                        </li>
                    </ul>
                </div>
                <div>
                    <h3 class="footer__title">Follow us</h3>

                    <ul class="footer__social">
                        <a href="#" class="footer__social-link">
                            <i class="bx bxl-facebook-circle"></i>
                        </a>
                        <a href="#" class="footer__social-link">
                            <i class="bx bxl-instagram-alt"></i>
                        </a>
                        <a href="#" class="footer__social-link">
                            <i class="bx bxl-pinterest"></i>
                 
                        </a>
                    </ul>
                </div>
                
            </div>
        </div>
    </footer>
    <div class="footer__watermark" style="text-align: center; padding: 15px 0; font-size: 14px; color: #fff; background-color: #333;">
        <p style="margin: 0;">© 2024 Dinas Pariwisata Kota Padang - All Rights Reserved</p>
    </div>
</footer>

    <!--========== SCROLL UP ==========-->
    <a href="#" class="scrollup" id="scroll-up">
        <i class="bx bx-chevrons-up"></i>
    </a>

    <!--=============== SCROLLREVEAL ===============-->
    <script src="{{ asset('frontend/assets/libraries/scrollreveal.min.js') }}"></script>

    <script>
        document.getElementById('akomodasi-link').addEventListener('click', function(event) {
            event.preventDefault(); // Mencegah link melakukan navigasi
            const submenu = document.getElementById('akomodasi-submenu');
            submenu.style.display = submenu.style.display === 'none' || submenu.style.display === '' ? 'block' : 'none';
        });
    </script>

    <!--=============== SWIPER JS ===============-->
    <script src="{{ asset('frontend/assets/libraries/swiper-bundle.min.js') }}"></script>

    <!--=============== MAIN JS ===============-->
    <script src="{{ asset('frontend/assets/js/main.js') }}"></script>
    @stack('script-alt')
</body>

</html>
