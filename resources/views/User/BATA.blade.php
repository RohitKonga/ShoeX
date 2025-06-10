@extends('user.layouts.main')
@section('shoeX')
    <title>Bata Shoes Home</title>
    <link rel="stylesheet" href="{{ asset('userscss/bata.css') }}">
    <link rel="stylesheet" href="{{ asset('userscss/nike.css') }}">
    <!-- Hero Banner -->
    <section class="hero">
        <img src="{{ asset('storage/banners/batabanner.jpg') }}" alt="Main Banner" />
    </section>

    <div class="container">
        <!-- Features Section -->
        <section class="features">
            <div class="feature">
                <i class="fas fa-shoe-prints"></i>
                <h4>Best Shoes Available</h4>
                <p>Stylish, durable, and trending footwear.</p>
            </div>
            <div class="feature">
                <i class="fas fa-star"></i>
                <h4>Top Quality Guaranteed</h4>
                <p>Crafted with premium materials and care.</p>
            </div>
            <div class="feature">
                <i class="fas fa-tags"></i>
                <h4>Affordable Prices</h4>
                <p>Great shoes that don’t break the bank.</p>
            </div>
            <div class="feature">
                <i class="fas fa-exchange-alt"></i>
                <h4>Easy Returns</h4>
                <p>Simple return policy for hassle-free shopping.</p>
            </div>
        </section>

        <!-- Promo Grid -->
        {{-- <section class="promo-grid">
            <div class="promo-box" id="justarrived">
                <p class="promo-text">JUST ARRIVED</p>
                <p class="promo-subtext">Special Offer 15% Starting ₹99</p>
            </div>
            <div class="promo-box">
                <img src="images/bata 1.jpeg" alt="Promo Image 1" />
            </div>
            <div class="promo-box">
                <img src="images/bata 2.jpeg" alt="Sale Shoes" />
            </div>
            <div class="promo-box" id="shopsnewcollection">
                <p class="promo-text">SHOES NEW COLLECTION</p>
                <p class="promo-subtext">Get up to 70% Off</p>
            </div>
            <div class="promo-box" id="readyforeach">
                <p class="promo-text">Ready for Each Moment</p>
            </div>
            <div class="promo-box" id="basiccaptoe">
                <p class="promo-text">Basic Captoe Sandals</p>
                <p class="promo-subtext">
                    Polished shoe laces, genuine material, stylish & elegant
                </p>
            </div>
        </section> --}}

        <!-- Categories Section -->
        <section class="categories">
            <h2>Shop by Category</h2>
            <div class="category-grid">
                <a href="{{ route('category.show', ['category' => 'Men']) }}">
                    <div class="category-box">
                        <img src="{{ asset('images/bata 8.jpeg') }}" alt="Men Category" />
                        <div class="category-info">
                            <h3>Men's Collection</h3>
                            <p>Modern styles for every man</p>
                            <button>Explore Men</button>
                        </div>
                    </div>
                </a>

                <a href="{{ route('category.show', ['category' => 'Women']) }}">
                    <div class="category-box">
                        <img src="{{ asset('images/bata 9.jpeg') }}" alt="Women Category" />
                        <div class="category-info">
                            <h3>Women's Collection</h3>
                            <p>Chic & elegant shoes for her</p>
                            <button>Explore Women</button>
                        </div>
                    </div>
                </a>

                <a href="{{ route('category.show', ['category' => 'Kids']) }}">
                    <div class="category-box">
                        <img src="{{ asset('images/bata 10.jpeg') }}" alt="Kids Category" />
                        <div class="category-info">
                            <h3>Kids' Collection</h3>
                            <p>Fun, comfort, and style for little feet</p>
                            <button>Explore Kids</button>
                        </div>
                    </div>
                </a>
            </div>
        </section>
        <!-- Trending Products -->
        <section class="trending-products">
            <h2>Trending Products</h2>
            <div class="product-grid">
                @foreach ($products as $product)
                    <x-product-card :product="$product" />
                @endforeach
                {{-- <div class="product">
                    <img src="images/bata 3.jpeg" alt="Monk Strap Shoes" />
                    <h4>Monk Strap Shoes</h4>
                    <div class="stars">⭐⭐⭐⭐⭐</div>
                    <div class="price">₹809</div>
                </div> --}}
            </div>
        </section>
    </div>
@endsection
