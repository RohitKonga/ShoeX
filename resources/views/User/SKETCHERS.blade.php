@extends('user.layouts.main')
@section('shoeX')
    <title>Skechers - Top Collections</title>
    <link rel="stylesheet" href="{{ asset('userscss/nike.css') }}" />
    <link rel="stylesheet" href="{{ asset('userscss/skechers.css') }}" />

    <section class="hero">
        <img class="hero" src="{{ asset('storage/banners/sketchersBanner.jpg') }}" alt="MainBanner" />
    </section>
    <!-- Main Header -->
    {{-- <header class="main-header">
        <div class="container">
            <h1>Top Collections</h1>
            <nav class="categories-nav">
                <a href="#" class="category-item">
                    <img src="https://images.unsplash.com/photo-1549298916-b41d501d3772?ixlib=rb-1.2.1&auto=format&fit=crop&w=400&q=80"
                        alt="Slippers" class="category-image" />
                    <div>Silpers</div>
                </a>
                <a href="#" class="category-item">
                    <img src="https://images.unsplash.com/photo-1560769629-975ec94e6a86?ixlib=rb-1.2.1&auto=format&fit=crop&w=400&q=80"
                        alt="Formal Shoes" class="category-image" />
                    <div>Formal</div>
                </a>
                <a href="#" class="category-item">
                    <img src="images/redtape 8.webp" alt="Ankle Boots" class="category-image" />
                    <div>Ankle Boots</div>
                </a>
                <a href="#" class="category-item">
                    <img src="images/redtape 1.webp" alt="Sneakers" class="category-image" />
                    <div>Sneckers</div>
                </a>
            </nav>
        </div>
    </header> --}}

    <div class="container" style="text-align: center">
        <h1 style="padding: 20px">Catagories</h1>
        <nav class="categories-nav">
            <a href="{{ route('category.show', ['category' => 'Men']) }}" class="category-item">
                <img src="{{ asset('images/womens.webp') }}" alt="Slippers" class="category-image" />
                <div>Mens</div>
            </a>
            <a href="{{ route('category.show', ['category' => 'Women']) }}" class="category-item">
                <img src="{{ asset('images/mens.jpg') }}" alt="Formal Shoes" class="category-image" />
                <div>Womens</div>
            </a>
            <a href="{{ route('category.show', ['category' => 'Kids']) }}" class="category-item">
                <img src="{{ asset('images/kids1.jpg') }}" alt="Ankle Boots" class="category-image" />
                <div>Kids</div>
            </a>
        </nav>
    </div>
    <!-- New Arrivals Section -->
    <section class="container">
        <h2 class="section-title">New Arrivals</h2>
        <div class="products-grid">
            @foreach ($products as $product)
                <x-product-card :product="$product" />
            @endforeach
            {{-- <div class="product-card">
                <img src="images/redtape 2.webp" alt="RedTape Runner" class="product-image" />
                <div class="product-info">
                    <h3 class="product-title">RedTape Runner</h3>
                    <div class="product-price">₹1,799</div>
                    <div class="rating">★★★★★</div>
                    <button class="add-to-cart">TO CART</button>
                </div>
            </div> --}}
        </div>
    </section>

    {{-- <section class="container">
        <h2 class="section-title">Featured Products</h2>
        <div class="products-grid">
            <div class="product-card">
                <img src="images/redtape 10.webp" alt="Somsonite GearPack" class="product-image" />
                <div class="product-info">
                    <h3 class="product-title">Somsonite GearPack</h3>
                    <div class="product-price">₹560</div>
                    <div class="rating">★★★★★</div>
                    <button class="add-to-cart">TO CART</button>
                </div>
            </div>

            <div class="product-card">
                <img src="images/redtape 11.webp" alt="AquaShield Bag" class="product-image" />
                <div class="product-info">
                    <h3 class="product-title">AquaShield Bag</h3>
                    <div class="product-price">₹660</div>
                    <div class="rating">★★★★★</div>
                    <button class="add-to-cart">TO CART</button>
                </div>
            </div>

            <div class="product-card">
                <img src="images/redtape 12.webp" alt="StormGuard Backpack" class="product-image" />
                <div class="product-info">
                    <h3 class="product-title">StormGuard Backpack</h3>
                    <div class="product-price">₹660</div>
                    <div class="rating">★★★★★</div>
                    <button class="add-to-cart">TO CART</button>
                </div>
            </div>

            <div class="product-card">
                <img src="images/redtape 13.webp" alt="TrekMate Rucksack" class="product-image" />
                <div class="product-info">
                    <h3 class="product-title">TrekMate Rucksack</h3>
                    <div class="product-price">₹660</div>
                    <div class="rating">★★★★★</div>
                    <button class="add-to-cart">TO CART</button>
                </div>
            </div>

            <div class="product-card">
                <img src="images/redtape 14.webp" alt="UrbanPack Classic" class="product-image" />
                <div class="product-info">
                    <h3 class="product-title">UrbanPack Classic</h3>
                    <div class="product-price">₹660</div>
                    <div class="rating">★★★★★</div>
                    <button class="add-to-cart">TO CART</button>
                </div>
            </div>

            <div class="product-card">
                <img src="images/redtape 15.webp" alt="RainGuard Travel Bag" class="product-image" />
                <div class="product-info">
                    <h3 class="product-title">RainGuard Travel Bag</h3>
                    <div class="product-price">₹660</div>
                    <div class="rating">★★★★★</div>
                    <button class="add-to-cart">TO CART</button>
                </div>
            </div>

            <div class="product-card">
                <img src="images/redtape 16.webp" alt="DailyCommute Pack" class="product-image" />
                <div class="product-info">
                    <h3 class="product-title">DailyCommute Pack</h3>
                    <div class="product-price">₹660</div>
                    <div class="rating">★★★★★</div>
                    <button class="add-to-cart">TO CART</button>
                </div>
            </div>

            <div class="product-card">
                <img src="images/redtape 17.webp" alt="AllWeather Backpack" class="product-image" />
                <div class="product-info">
                    <h3 class="product-title">AllWeather Backpack</h3>
                    <div class="product-price">₹660</div>
                    <div class="rating">★★★★★</div>
                    <button class="add-to-cart">TO CART</button>
                </div>
            </div>
        </div>
    </section> --}}
@endsection
