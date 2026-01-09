@extends('frontend.layouts.app')

@section('title', 'Wishlist')

@section('content')

    <div class="rts-navigation-area-breadcrumb bg_light-1">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="navigator-breadcrumb-wrapper">
                        <a href="{{ route('home') }}">Home</a>
                        <i class="fa-regular fa-chevron-right"></i>
                        <a class="current" href="#">Wishlist</a>
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
                                <p>Action</p>
                            </div>
                            {{-- <div class="subtotal">
                                <p>SubTotal</p>
                            </div> --}}
                            <div class="button-area">

                            </div>
                        </div>
                        @php $wishlist = session('wishlist', []); @endphp

                        @if (count($wishlist))
                            @foreach ($wishlist as $item)
                                <div class="single-cart-area-list main wishlist-item" id="wishlist-{{ $item['id'] }}">

                                    <div class="product-main-cart">
                                        <!-- Remove -->
                                        <div class="close remove-wishlist" data-id="{{ $item['id'] }}">
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

                                    <div class="button-area">
                                        <a href="javascript:void(0)" class="rts-btn btn-primary add-to-cart"
                                            data-id="{{ $item['id'] }}">
                                            <div class="btn-text">Add To Cart</div>
                                            <div class="arrow-icon">
                                                <i class="fa-regular fa-cart-shopping"></i>
                                            </div>
                                        </a>
                                    </div>

                                </div>
                            @endforeach
                        @else
                            <div class="text-center py-5">
                                <h4>Your wishlist is empty 💔</h4>
                                <a href="{{ route('home') }}" class="rts-btn btn-primary mt-3">
                                    Continue Shopping
                                </a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- rts cart area end -->

@endsection
