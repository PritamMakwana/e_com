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
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @stack('styles')
    <style>
        .remove-wishlist {
            cursor: pointer;
            color: #ff4d4f;
            font-size: 18px;
        }

        .remove-wishlist:hover {
            color: #d9363e;
        }

        .remove-cart {
            cursor: pointer;
            color: #ff4d4f;
            font-size: 18px;
        }

        .remove-cart:hover {
            color: #d9363e;
        }

        .cart-total-area {
            background: #fff;
            padding: 20px;
            border-radius: 6px;
        }

        .quantity-edit {
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .qty-btn {
            width: 32px;
            height: 32px;
            border: 1px solid #ddd;
            background: #f7f7f7;
            font-size: 18px;
            cursor: pointer;
        }

        .qty {
            width: 40px;
            text-align: center;
            border: 1px solid #ddd;
            background: #fff;
        }
    </style>
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

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    @stack('scripts')

    <script>
        /* add from Wishlist */
        $('.add-to-wishlist').click(function() {
            let productId = $(this).data('id');

            $.post("{{ route('wishlist.add') }}", {
                _token: "{{ csrf_token() }}",
                product_id: productId
            }, function() {
                alert('Added to wishlist');
            });
        });

        /* Remove from Wishlist */
        $(document).on('click', '.remove-wishlist', function() {
            let productId = $(this).data('id');

            $.post("{{ route('wishlist.remove') }}", {
                _token: "{{ csrf_token() }}",
                product_id: productId
            }, function() {
                $('#wishlist-' + productId).fadeOut(300, function() {
                    $(this).remove();
                });
            });
        });

        /* Add to Cart */
        $('.add-to-cart').click(function() {
            let productId = $(this).data('id');

            $.post("{{ route('cart.add') }}", {
                _token: "{{ csrf_token() }}",
                product_id: productId
            }, function(res) {
                alert('Added to cart');
            });
        });
        /* Remove item */
        $(document).on('click', '.remove-cart', function() {
            let id = $(this).data('id');

            $.post("{{ route('cart.remove') }}", {
                _token: "{{ csrf_token() }}",
                id: id
            }, function() {
                $('#cart-' + id).fadeOut(300, function() {
                    $(this).remove();
                    location.reload(); // recalculates total
                });
            });
        });

        /* Update quantity */
        function updateCart(id, qty) {
            $.post("{{ route('cart.update') }}", {
                _token: "{{ csrf_token() }}",
                id: id,
                quantity: qty
            }, function() {
                location.reload(); // recalculates subtotal & total
            });
        }

        /* PLUS */
        $(document).on('click', '.plus', function() {
            let id = $(this).data('id');
            let input = $('.qty[data-id="' + id + '"]');
            let qty = parseInt(input.val()) + 1;

            input.val(qty);
            updateCart(id, qty);
        });

        /* MINUS */
        $(document).on('click', '.minus', function() {
            let id = $(this).data('id');
            let input = $('.qty[data-id="' + id + '"]');
            let qty = parseInt(input.val());

            if (qty > 1) {
                qty--;
                input.val(qty);
                updateCart(id, qty);
            }
        });
    </script>

</body>

</html>
