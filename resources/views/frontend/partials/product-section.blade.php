@if ($products->count())
    <div class="rts-grocery-feature-area rts-section-gapBottom">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="title-area-between">
                        <h2 class="title-left">
                            {{ $title }}
                        </h2>

                        <div class="next-prev-swiper-wrapper">
                            <div class="swiper-button-prev swiper-prev-{{ $slug }}">
                                <i class="fa-regular fa-chevron-left"></i>
                            </div>
                            <div class="swiper-button-next swiper-next-{{ $slug }}">
                                <i class="fa-regular fa-chevron-right"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- PRODUCTS -->
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="category-area-main-wrapper-one">

                        <div class="swiper mySwiper-{{ $slug }} swiper-data"
                            data-swiper='{
                            "spaceBetween":16,
                            "slidesPerView":6,
                            "speed":700,
                            "navigation":{
                                "nextEl":".swiper-next-{{ $slug }}",
                                "prevEl":".swiper-prev-{{ $slug }}"
                            },
                            "breakpoints":{
                                "0":{"slidesPerView":1},
                                "480":{"slidesPerView":2},
                                "640":{"slidesPerView":2},
                                "840":{"slidesPerView":3},
                                "1140":{"slidesPerView":5},
                                "1540":{"slidesPerView":5},
                                "1840":{"slidesPerView":6}
                            }
                        }'>

                            <div class="swiper-wrapper">

                                @foreach ($products as $product)
                                    <div class="swiper-slide">
                                        <div class="single-shopping-card-one">

                                            <!-- Image -->
                                            <div class="image-and-action-area-wrapper">
                                                <a href="#" class="thumbnail-preview">

                                                    @if ($product->discount_price)
                                                        <div class="badge">
                                                            <span>
                                                                {{ round((($product->price - $product->discount_price) / $product->price) * 100) }}%
                                                                <br> Off
                                                            </span>
                                                            <i class="fa-solid fa-bookmark"></i>
                                                        </div>
                                                    @endif

                                                    <img src="{{ asset('storage/' . $product->image) }}"
                                                        alt="{{ $product->name }}" style="height: 250px; width: 250px;">
                                                </a>
                                            </div>

                                            <!-- Body -->
                                            <div class="body-content">
                                                <h4 class="title">{{ $product->name }}</h4>
                                                <span class="availability">{{ $product->weight }}</span>

                                                <div class="price-area">
                                                    <span class="current">
                                                        ₹{{ $product->discount_price ?? $product->price }}
                                                    </span>

                                                    @if ($product->discount_price)
                                                        <div class="previous">
                                                            ₹{{ $product->price }}
                                                        </div>
                                                    @endif
                                                </div>

                                                <div class="cart-counter-action">
                                                    @if ($product->stock_status === 'in_stock')
                                                        <a href="#"
                                                            class="rts-btn btn-primary radious-sm with-icon">
                                                            <div class="btn-text">Add</div>
                                                            <div class="arrow-icon">
                                                                <i class="fa-regular fa-cart-shopping"></i>
                                                            </div>
                                                        </a>
                                                    @else
                                                        <span class="text-danger">Out of Stock</span>
                                                    @endif


                                                    {{-- Wishlist --}}
                                                    <a href="#"
                                                        class="rts-btn btn-secondary radious-sm with-icon wishlist-btn"
                                                        data-product-id="{{ $product->id }}" title="Add to Wishlist">
                                                        <div class="btn-text">
                                                            <i class="fa-regular fa-heart"></i>
                                                        </div>
                                                    </a>

                                                </div>


                                            </div>

                                        </div>
                                    </div>
                                @endforeach

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endif
