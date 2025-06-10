@extends('user.layouts.main')
@section('shoeX')
    <title>Nike Store</title>
    <link rel="stylesheet" href="{{ asset('userscss/nike.css') }}" />
    <section class="hero">
        <img class="hero" src="{{ asset('storage/banners/nikebanner.jpg') }}" alt="Nike" />
    </section>

    <section class="welcome-section">
        <h1 class="welcome-text">Welcome to Nike Store</h1>
    </section>

    <section class="video-section">
        <div class="video-container">
            <video autoplay muted loop>
                <source src="{{ asset('images/nike.mp4') }}" type="video/mp4" />
                Your browser does not support the video tag.
            </video>
        </div>
    </section>
    <!-- Categories Section -->
    <section class="categories section-padding">
        <h2 class="section-title">Shop by Category</h2>
        <div class="category-grid section-container">
            <div class="category-card men card-hover">
                <div class="category-content">
                    <h3>Men's Collection</h3>
                    <a href="{{ route('category.show', ['category' => 'Men']) }}" class="category-link btn-hover">Shop
                        Now</a>
                </div>
            </div>
            <div class="category-card women card-hover">
                <div class="category-content">
                    <h3>Women's Collection</h3>
                    <a href="{{ route('category.show', ['category' => 'Women']) }}" class="category-link btn-hover">Shop
                        Now</a>
                </div>
            </div>
            <div class="category-card kids card-hover">
                <div class="category-content">
                    <h3>Kids Collection</h3>
                    <a href="{{ route('category.show', ['category' => 'Kids']) }}" class="category-link btn-hover">Shop
                        Now</a>
                </div>
            </div>
            <div class="category-card sports card-hover">
                <div class="category-content">
                    <h3>Unisex</h3>
                    <a href="{{ route('category.show', ['category' => 'Unisex']) }}" class="category-link btn-hover">Shop
                        Now</a>
                </div>
            </div>
        </div>
    </section>
    <!-- Featured Products Section -->
    <section class="featured-products section-padding">
        <h2 class="section-title">Featured Products</h2>
        <div class="product-grid section-container">
            @foreach ($products as $product)
                <x-product-card :product="$product" />
            @endforeach
        </div>
    </section>



    <!-- Featured Collections Section -->
    {{-- <section class="featured-collections section-padding">
        <h2 class="section-title">Featured Collections</h2>
        <div class="collections-grid section-container">
            <div class="collection-card card-hover">
                <div class="collection-image">
                    <img src="images/shoe5.jpg" alt="Summer Collection" class="image-hover" />
                </div>
                <div class="collection-content">
                    <h3>Summer Collection</h3>
                    <a href="#" class="collection-link btn-hover">Shop Now</a>
                </div>
            </div>

            <div class="collection-card card-hover">
                <div class="collection-image">
                    <img src="images/shoe6.jpg" alt="Running Collection" class="image-hover" />
                </div>
                <div class="collection-content">
                    <h3>Running Collection</h3>
                    <a href="#" class="collection-link btn-hover">Shop Now</a>
                </div>
            </div>

            <div class="collection-card card-hover">
                <div class="collection-image">
                    <img src="images/shoe7.jpg" alt="Lifestyle Collection" class="image-hover" />
                </div>
                <div class="collection-content">
                    <h3>Lifestyle Collection</h3>
                    <a href="#" class="collection-link btn-hover">Shop Now</a>
                </div>
            </div>
        </div>
    </section> --}}

    <!-- Collaboration Section -->
    {{-- <section class="collaboration-section section-padding">
        <div class="section-container">
            <div class="collab-content">
                <h2 class="section-title">Nike x ShoeX Collaboration</h2>
                <div class="collab-box card-hover">
                    <div class="collab-image">
                        <img src="images/shoe8.jpg" alt="ShoeX x Nike Collaboration" class="image-hover" />
                    </div>
                    <div class="collab-details">
                        <h3>Exclusive Collection</h3>
                        <p>Get up to 30% off on your first purchase</p>
                        <div class="promo-code">
                            <span>Use Code:</span>
                            <div class="code-box">SHOEX30</div>
                        </div>
                        <p class="terms">*Valid on first purchase only</p>
                        <a href="#" class="collab-button btn-hover">Shop Now</a>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
@endsection
