<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description"
        content="Ekomart-Grocery-Store(e-Commerce) HTML Template: A sleek, responsive, and user-friendly HTML template designed for online grocery stores.">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="Grocery, Store, stores">
    <title>@yield('title', 'E Website')</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/images/fav.png') }}">
    <!-- plugins css -->
    <link rel="stylesheet preload" href="{{ asset('assets/css/plugins.css') }}" as="style">
    <link rel="stylesheet preload" href="{{ asset('assets/css/style.css') }}" as="style">


</head>

<body class="shop-main-h">



    <!-- rts header area start -->
    @include('frontend.includes.header')
    <!-- rts header area end -->
    <main>
        @yield('content')
    </main>


    @include('frontend.includes.footer')
    <!-- plugins js -->
    <script defer src="{{ asset('assets/js/plugins.js') }}"></script>

    <!-- custom js -->
    <script defer src="{{ asset('assets/js/main.js') }}"></script>
    <!-- header style two End -->
    <script>
        document.querySelectorAll('.swiper').forEach(function(swiperEl) {
            new Swiper(swiperEl, {
                spaceBetween: 16,
                slidesPerView: 6,
                navigation: {
                    nextEl: swiperEl.querySelector('.swiper-button-next'),
                    prevEl: swiperEl.querySelector('.swiper-button-prev'),
                },
                breakpoints: {
                    0: {
                        slidesPerView: 1
                    },
                    480: {
                        slidesPerView: 2
                    },
                    768: {
                        slidesPerView: 3
                    },
                    1024: {
                        slidesPerView: 4
                    },
                    1200: {
                        slidesPerView: 5
                    }
                }
            });
        });
    </script>

</body>

</html>
