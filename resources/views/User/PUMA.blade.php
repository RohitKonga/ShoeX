@extends('user.layouts.main')
@section('shoeX')
    <title>Puma Shoes Home</title>
    <link rel="stylesheet" href="{{ asset('userscss/nike.css') }}" />
    <link rel="stylesheet" href="{{ asset('userscss/puma.css') }}" />

    </head>

    <body>
        <section class="hero">
            <img class="hero" src="{{ asset('storage/banners/pumabanner.jpg') }}" alt="MainBanner" />
        </section>
        <section class="container">
            <h2 class="section-title">Our Collections</h2>
            <p class="section-subtitle">
                Explore the latest Puma shoes designed for ultimate comfort, style, and
                performance. Step into the future with Puma.
            </p>
            <div class="products-grid">
                @foreach ($products as $product)
                    <x-product-card :product="$product" />
                @endforeach
                {{-- <div class="product">
                    <img src="images/puma 1.avif" alt="Product 1" />
                    <p>Jungle Max Slip-on</p>
                    <p class="stars">★★★★★</p>
                </div>
                <div class="product">
                    <img src="images/puma 2.avif" alt="Product 2" />
                    <p>Cloudflex Race Sneaker</p>
                    <p class="stars">★★★★☆</p>
                </div>
                <div class="product">
                    <img src="images/puma 3.avif" alt="Product 3" />
                    <p>Low Waterproof Boot</p>
                    <p class="stars">★★★☆☆</p>
                </div>
                <div class="product">
                    <img src="images/puma 4.avif" alt="Product 4" />
                    <p>Green Cap Toe Brogue</p>
                    <p class="stars">★★★★★</p>
                </div>
                <div class="product">
                    <img src="images/puma 5.avif" alt="Product 5" />
                    <p>Durham Lexington</p>
                    <p class="stars">★★★★☆</p>
                </div>
                <div class="product">
                    <img src="images/puma 6.avif" alt="Product 6" />
                    <p>Merrell Encore Bypass</p>
                    <p class="stars">★★★★★</p>
                </div>
                <div class="product">
                    <img src="images/puma 7.avif" alt="Product 7" />
                    <p>Sperry Top-Sider</p>
                    <p class="stars">★★★★☆</p>
                </div>
                <div class="product">
                    <img src="images/puma 8.avif" alt="Product 8" />
                    <p>Puma Street Flex</p>
                    <p class="stars">★★★★★</p>
                </div> --}}
            </div>
        </section>

        {{-- <section class="highlight-section">
            <div class="highlight-content">
                <h2>2025 Puma<br />The Best Classical</h2>
                <p>
                    Elevate your game with the latest Puma collection—designed for style,
                    endurance, and all-day comfort. Make every step legendary.
                </p>
                <a href="#" class="btn">Buy Now</a>
            </div>
            <img src="images/puma 4.avif" alt="Highlight Product" style="border-radius: 30px" />
        </section>

        <section class="container three-blocks">
            <article>
                <img src="images/puma 10.avif" alt="Blog 1" />
                <h4>Get 20% OFF on Puma Air Uomo</h4>
            </article>
            <article>
                <img src="images/puma 2.avif" alt="Blog 2" />
                <h4>Best Puma Sports Shoe Ever!</h4>
            </article>
            <article>
                <img src="images/puma 3.avif" alt="Blog 3" />
                <h4>Top 20 Running Shoes for Men</h4>
            </article>
        </section>
        <section class="highlight-section">
            <img src="images/thirdsectionimg.avif" alt="Highlight Product" style="border-radius: 30px" />
            <div class="highlight-content">
                <h2>Puma Metcon 2</h2>
                <p>Your new season wardrobe just arrived.Shop now</p>
                <a href="#" class="btn">Buy Now</a>
            </div>
        </section> --}}
    @endsection
