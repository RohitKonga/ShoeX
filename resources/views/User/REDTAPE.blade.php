@extends('user.layouts.main')
@section('shoeX')
    <link rel="stylesheet" href="{{ asset('userscss/nike.css') }}" />
    <link rel="stylesheet" href="{{ asset('userscss/redtape.css') }}" />
    <title>RedTape Shoes</title>
    <!-- Hero Section -->
    <section class="hero">
        <img class="hero" src="{{ asset('storage/banners/redtapBanner.jpg') }}" alt="MainBanner" />
    </section>

    <!-- Product Grid -->
    {{-- <div class="container">
        <div class="product-box">
            <img src="images/redtape 1.webp" alt="Extreme Super" />
            <div class="tag"># Desert Boots in Brown</div>

        </div>

        <div class="product-box">
            <img src="images/redtape 2.webp" alt="Desert Boots" />
            <div class="tag"># Desert Boots in Brown</div>
        </div>

        <div class="product-box">
            <img src="images/redtape 3.webp" alt="Chelsea Boots" />
            <div class="tag"># Chelsea Boots in Suede</div>
        </div>

        <div class="product-box">
            <img src="images/redtape 4.webp" alt="Originals" />
            <div class="tag"># Originals Superstar Trainers</div>
        </div>

        <div class="product-box">
            <img src="images/redtape 5.webp" alt="Slippers" />
            <div class="tag"># Slippers in Grey with Faux</div>
        </div>

        <div class="product-box">
            <img src="images/redtape 6.webp" alt="Super Skinny" />
            <div class="tag"># Desert Boots in Brown</div>

        </div>
    </div> --}}

    <!-- Section 2: Men & Women + Kids -->
    <section class="section" style="background-color: #f4f1f1">
        <div class="section-title">Explore Categories</div>

        <div class="flex-row">
            <div class="half-block">
                <a href="{{ route('category.show', ['category' => 'Men']) }}"><img
                        src="{{ asset('images/redtape 7.webp') }}" alt="Men Shoes" /></a>
                <h2>Men's Shoes</h2>
                <p>
                    Trendy and durable designs for every occasion. Discover RedTape for
                    men.
                </p>
            </div>
            <div class="half-block">
                <a href="{{ route('category.show', ['category' => 'Women']) }}"><img
                        src="{{ asset('images/redtape 9.webp') }}" alt="Women Shoes" /></a>
                <h2>Women's Shoes</h2>
                <p>Chic, stylish, and comfortable footwear designed just for you.</p>
            </div>
            <div class="half-block">
                <a href="{{ route('category.show', ['category' => 'Kids']) }}"><img
                        src="{{ asset('images/redtape 10.webp') }}" alt="Kids Shoes" /></a>
                <h2>Kids' Shoes</h2>
                <p>
                    Fun, playful, and safe shoes for growing feet. Explore our kids'
                    collection!
                </p>
            </div>
        </div>

    </section>

    <!-- Section 3: Bottom Shoe Listings -->
    <section class="section">
        <div class="section-title">Trending Shoe Collections</div>
        <div class="product-grid">
            @foreach ($products as $product)
                <x-product-card :product="$product" />
            @endforeach
            {{-- <div class="product-card">
                <img src="images/redtape 11.webp" alt="Product 1" />
                <div class="product-title">Originals Superstar 80’s Trainers</div>
                <div class="price">₹1200.00</div>
                <div class="stars">★★★★★</div>
            </div> --}}
        </div>
    </section>
@endsection
