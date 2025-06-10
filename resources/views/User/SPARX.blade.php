@extends('user.layouts.main')
@section('shoeX')
    <title>SPARX - Modern Footwear</title>
    <link rel="stylesheet" href="{{ asset('userscss/sparx.css') }}">
    <!-- Hero Section -->
    <section class="hero">
        <img src="{{ asset('storage/banners/sparxBanner.jpg') }}" alt="SPARX Modern Footwear" />
    </section>

    <!-- Welcome Section -->
    <section class="welcome-section">
        <div class="section-container">
            <h1 class="welcome-text">Welcome to <span>SPARX</span> Store</h1>
        </div>
    </section>

    <!-- Video Section -->
    <section class="video-section">
        <div class="video-container">
            <video autoplay muted loop>
                <source src="{{ asset('images/sparx.mp4') }}" type="video/mp4" />
                Your browser does not support the video tag.
            </video>
        </div>
    </section>

    <!-- Featured Collections -->
    {{-- <section class="featured-collections section-padding" id="featured">
        <div class="section-container">
            <h2 class="section-title">Featured Collections</h2>
            <div class="collections-grid">
                <div class="collection-card">
                    <div class="collection-image">
                        <img src="images/sparx 1.webp" alt="Winter Collection" />
                    </div>
                    <div class="collection-content">
                        <h3>Winter Collection</h3>
                        <a href="#" class="btn">Shop Now</a>
                    </div>
                </div>
                <div class="collection-card">
                    <div class="collection-image">
                        <img src="images/sparx 2.avif" alt="Performance Collection" />
                    </div>
                    <div class="collection-content">
                        <h3>Performance Collection</h3>
                        <a href="#" class="btn">Shop Now</a>
                    </div>
                </div>
                <div class="collection-card">
                    <div class="collection-image">
                        <img src="images/sparx 3.avif" alt="Casual Collection" />
                    </div>
                    <div class="collection-content">
                        <h3>Casual Collection</h3>
                        <a href="#" class="btn">Shop Now</a>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}

    <!-- Categories Section -->
    <section class="categories section-padding">
        <div class="section-container">
            <h2 class="section-title">Shop by Category</h2>
            <div class="category-grid">
                <div class="category-card men">
                    <div class="category-content">
                        <h3>Men's Footwear</h3>
                        <a href="{{ route('category.show', ['category' => 'Men']) }}" class="btn">Shop Now</a>
                    </div>
                </div>
                <div class="category-card women">
                    <div class="category-content">
                        <h3>Women's Footwear</h3>
                        <a href="{{ route('category.show', ['category' => 'Women']) }}" class="btn">Shop Now</a>
                    </div>
                </div>
                <div class="category-card kids">
                    <div class="category-content">
                        <h3>Kids Shoes</h3>
                        <a href="{{ route('category.show', ['category' => 'Kids']) }}" class="btn">Shop Now</a>
                    </div>
                </div>
                <div class="category-card sports">
                    <div class="category-content">
                        <h3>Unisex Shoes</h3>
                        <a href="{{ route('category.show', ['category' => 'Unisex']) }}" class="btn">Shop Now</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Featured Products -->
    <section class="featured-products section-padding">
        <div class="section-container">
            <h2 class="section-title">Best Sellers</h2>
            <div class="product-grid">
                @foreach ($products as $product)
                    <x-product-card :product="$product" />
                @endforeach
                {{-- <div class="product-card">
                    <div class="product-image">
                        <img src="images/sparx 7.webp" alt="SPARX Black Flex Pro" />
                        <div class="wishlist-icon">
                            <i class="far fa-heart"></i>
                        </div>
                    </div>
                    <div class="product-info">
                        <h3>SPARX</h3>
                        <p class="product-name">Black Flex Pro Training Shoes</p>
                        <div class="price-section">
                            <span class="current-price">₹799</span>
                            <span class="original-price">₹2,499</span>
                            <span class="discount">68% off</span>
                        </div>
                        <p class="delivery">Free delivery</p>
                        <button class="add-to-cart">Add to Cart</button>
                    </div>
                </div> --}}
            </div>
        </div>
    </section>

    <!-- Collaboration Section -->
    {{-- <section class="collaboration-section section-padding">
        <div class="section-container">
            <div class="collab-content">
                <h2 class="section-title">SPARX x ShoeX Collaboration</h2>
                <div class="collab-box">
                    <div class="collab-image">
                        <img src="images/sparx 5.webp" alt="SPARX Collaboration" />
                    </div>
                    <div class="collab-details">
                        <h3>Urban Style Meets Comfort</h3>
                        <p>Flat 30% off on exclusive launch products</p>
                        <div class="promo-code">
                            <span>Use Code:</span>
                            <div class="code-box">SPARX30</div>
                        </div>
                        <p class="terms">*Offer valid till this month end</p>
                        <a href="#" class="collab-button btn">Shop Now</a>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
@endsection
