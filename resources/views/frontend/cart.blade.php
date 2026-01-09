@extends('frontend.layouts.app')

@section('title', 'Cart')

@section('content')

    <div class="rts-navigation-area-breadcrumb bg_light-1">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="navigator-breadcrumb-wrapper">
                        <a href="{{ route('home') }}">Home</a>
                        <i class="fa-regular fa-chevron-right"></i>
                        <a class="current" href="#">Cart</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="section-seperator bg_light-1">
        <div class="container">
            <hr class="section-seperator">
        </div>
    </div>



    <!-- rts cart area start -->
    <div class="rts-cart-area rts-section-gap bg_light-1">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-12">
                    <div class="rts-cart-list-area wishlist">
                        <div class="single-cart-area-list head">
                            <div class="product-main">
                                <P>Products</P>
                            </div>
                            <div class="price">
                                <p>Price</p>
                            </div>
                            <div class="quantity">
                                <p>Quantity</p>
                            </div>
                            <div class="subtotal">
                                <p>SubTotal</p>
                            </div>
                            <div class="button-area">

                            </div>
                        </div>
                        @php
                            $cart = session('cart', []);
                            $total = 0;
                        @endphp

                        @foreach ($cart as $item)
                            @php
                                $subtotal = $item['price'] * $item['quantity'];
                                $total += $subtotal;
                            @endphp

                            <div class="single-cart-area-list main" id="cart-{{ $item['id'] }}">
                                <div class="product-main-cart">
                                    <!-- REMOVE -->
                                    <div class="close remove-cart" data-id="{{ $item['id'] }}">
                                        <i class="fa-regular fa-xmark"></i>
                                    </div>

                                    <div class="thumbnail">
                                        <img src="{{ asset('storage/' . $item['image']) }}">
                                    </div>

                                    <div class="information">
                                        <h6>{{ $item['name'] }}</h6>
                                    </div>
                                </div>

                                <div class="price">₹{{ $item['price'] }}</div>

                                <div class="quantity">
                                    <div class="quantity-edit">
                                        <button class="qty-btn minus" data-id="{{ $item['id'] }}"><i
                                                class="fa-regular fa-chevron-down"></i></button>

                                        <input type="text" class="qty" value="{{ $item['quantity'] }}"
                                            data-id="{{ $item['id'] }}" readonly>

                                        <button class="qty-btn plus" data-id="{{ $item['id'] }}"><i
                                                class="fa-regular fa-chevron-up"></i></button>
                                    </div>
                                </div>


                                <div class="subtotal subtotal-{{ $item['id'] }}">
                                    ₹{{ $subtotal }}
                                </div>
                            </div>
                        @endforeach
                        @if (count($cart))
                            <div class="row mt-4">
                                <div class="col-lg-4 offset-lg-8">
                                    <div class="cart-total-area">
                                        <h5>Cart Total</h5>
                                        <h3>₹ <span id="cart-total">{{ $total }}</span></h3>

                                        <a href="#" class="rts-btn btn-primary w-100 mt-3">
                                            Proceed to Checkout
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- rts cart area end -->

@endsection
