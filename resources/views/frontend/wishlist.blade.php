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
                                <p>Quantity</p>
                            </div>
                            <div class="subtotal">
                                <p>SubTotal</p>
                            </div>
                            <div class="button-area">

                            </div>
                        </div>
                        <div class="single-cart-area-list main  item-parent">
                            <div class="product-main-cart">
                                <div class="close section-activation">
                                    <img src="assets/images/shop/01.png" alt="shop">
                                </div>
                                <div class="thumbnail">
                                    <img src="assets/images/shop/02.png" alt="shop">
                                </div>
                                <div class="information">
                                    <h6 class="title">SunChips Minis, Garden Salsa Flavored Canister, Multigrain Chips</h6>
                                    <span>SKU:BG-1001</span>
                                </div>
                            </div>
                            <div class="price">
                                <p>$550.00</p>
                            </div>
                            <div class="quantity">
                                <div class="quantity-edit">
                                    <input type="text" class="input" value="1">
                                    <div class="button-wrapper-action">
                                        <button class="button"><i class="fa-regular fa-chevron-down"></i></button>
                                        <button class="button plus">+<i class="fa-regular fa-chevron-up"></i></button>
                                    </div>
                                </div>
                            </div>
                            <div class="subtotal">
                                <p>$550.00</p>
                            </div>
                            <div class="button-area">
                                <a href="#" class="rts-btn btn-primary radious-sm with-icon">
                                    <div class="btn-text">
                                        Add To Cart
                                    </div>
                                    <div class="arrow-icon">
                                        <i class="fa-regular fa-cart-shopping"></i>
                                    </div>
                                    <div class="arrow-icon">
                                        <i class="fa-regular fa-cart-shopping"></i>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="single-cart-area-list main  item-parent">
                            <div class="product-main-cart">
                                <div class="close section-activation">
                                    <img src="assets/images/shop/01.png" alt="shop">
                                </div>
                                <div class="thumbnail">
                                    <img src="assets/images/shop/05.png" alt="shop">
                                </div>
                                <div class="information">
                                    <h6 class="title">SunChips Minis, Garden Salsa Flavored Canister, Multigrain Chips</h6>
                                    <span>SKU:BG-1001</span>
                                </div>
                            </div>
                            <div class="price">
                                <p>$550.00</p>
                            </div>
                            <div class="quantity">
                                <div class="quantity-edit">
                                    <input type="text" class="input" value="1">
                                    <div class="button-wrapper-action">
                                        <button class="button"><i class="fa-regular fa-chevron-down"></i></button>
                                        <button class="button plus">+<i class="fa-regular fa-chevron-up"></i></button>
                                    </div>
                                </div>
                            </div>
                            <div class="subtotal">
                                <p>$550.00</p>
                            </div>
                            <div class="button-area">
                                <a href="#" class="rts-btn btn-primary radious-sm with-icon">
                                    <div class="btn-text">
                                        Add To Cart
                                    </div>
                                    <div class="arrow-icon">
                                        <i class="fa-regular fa-cart-shopping"></i>
                                    </div>
                                    <div class="arrow-icon">
                                        <i class="fa-regular fa-cart-shopping"></i>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="single-cart-area-list main  item-parent">
                            <div class="product-main-cart">
                                <div class="close section-activation">
                                    <img src="assets/images/shop/01.png" alt="shop">
                                </div>
                                <div class="thumbnail">
                                    <img src="assets/images/shop/04.png" alt="shop">
                                </div>
                                <div class="information">
                                    <h6 class="title">SunChips Minis, Garden Salsa Flavored Canister, Multigrain Chips</h6>
                                    <span>SKU:BG-1001</span>
                                </div>
                            </div>
                            <div class="price">
                                <p>$550.00</p>
                            </div>
                            <div class="quantity">
                                <div class="quantity-edit">
                                    <input type="text" class="input" value="1">
                                    <div class="button-wrapper-action">
                                        <button class="button"><i class="fa-regular fa-chevron-down"></i></button>
                                        <button class="button plus">+<i class="fa-regular fa-chevron-up"></i></button>
                                    </div>
                                </div>
                            </div>
                            <div class="subtotal">
                                <p>$550.00</p>
                            </div>
                            <div class="button-area">
                                <a href="#" class="rts-btn btn-primary radious-sm with-icon">
                                    <div class="btn-text">
                                        Add To Cart
                                    </div>
                                    <div class="arrow-icon">
                                        <i class="fa-regular fa-cart-shopping"></i>
                                    </div>
                                    <div class="arrow-icon">
                                        <i class="fa-regular fa-cart-shopping"></i>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="single-cart-area-list main  item-parent">
                            <div class="product-main-cart">
                                <div class="close section-activation">
                                    <img src="assets/images/shop/01.png" alt="shop">
                                </div>
                                <div class="thumbnail">
                                    <img src="assets/images/shop/06.png" alt="shop">
                                </div>
                                <div class="information">
                                    <h6 class="title">SunChips Minis, Garden Salsa Flavored Canister, Multigrain Chips
                                    </h6>
                                    <span>SKU:BG-1001</span>
                                </div>
                            </div>
                            <div class="price">
                                <p>$550.00</p>
                            </div>
                            <div class="quantity">
                                <div class="quantity-edit">
                                    <input type="text" class="input" value="1">
                                    <div class="button-wrapper-action">
                                        <button class="button"><i class="fa-regular fa-chevron-down"></i></button>
                                        <button class="button plus">+<i class="fa-regular fa-chevron-up"></i></button>
                                    </div>
                                </div>
                            </div>
                            <div class="subtotal">
                                <p>$550.00</p>
                            </div>
                            <div class="button-area">
                                <a href="#" class="rts-btn btn-primary radious-sm with-icon">
                                    <div class="btn-text">
                                        Add To Cart
                                    </div>
                                    <div class="arrow-icon">
                                        <i class="fa-regular fa-cart-shopping"></i>
                                    </div>
                                    <div class="arrow-icon">
                                        <i class="fa-regular fa-cart-shopping"></i>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- rts cart area end -->

@endsection
