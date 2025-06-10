@extends('User.Layouts.main')
@section('shoeX')
    <link rel="stylesheet" href="{{ asset('userscss/shoex.css') }}">
    <title>ShoeX</title>
    <div id="header"></div>

    <section class="hero">
        <img class="hero" src="{{ asset('storage/banners/mainBanner.jpg') }}" alt="MainBanner">
    </section>

    <h2 class="cat">CATEGORIES</h2>
    <section class="category-section">
        <div class="category-card">
            <img src="images/men.jpg" alt="Men Shoes">
            <h2>Men</h2>
            <a href="{{ route('category.show', ['category' => 'Men']) }}">
                <button class="shop-now">Shop Now</button>
            </a>
        </div>

        <div class="category-card">
            <img src="images/women.jpg" alt="Women Shoes">
            <h2>Women</h2>
            <a href="{{ route('category.show', ['category' => 'Women']) }}">
                <button class="shop-now">Shop Now</button>
            </a>
        </div>

        <div class="category-card">
            <img src="images/unisex.jpg" alt="Kids Shoes">
            <h2>Unisex</h2>
            <a href="{{ route('category.show', ['category' => 'Unisex']) }}">
                <button class="shop-now">Shop Now</button>
            </a>
        </div>

        <div class="category-card">
            <img src="images/kids.jpg" alt="Kids Shoes">
            <h2>Kids</h2>
            <a href="{{ route('category.show', ['category' => 'Kids']) }}">
                <button class="shop-now">Shop Now</button>
            </a>
        </div>
    </section>

    <section class="featured-products">
        <h2>Featured Products</h2>
        <div class="product-grid">
            @foreach ($featuredProducts as $product)
                <x-product-card :product="$product" />
            @endforeach
        </div>
    </section>

    <!--What our Customer Says-->
    <section class="testimonials">
        <h2>What Our Customers Say</h2>
        <div class="testimonial-slider">
            <div class="testimonial">
                <div class="testimonial-header">
                    <img src="images/john.jpg" alt="John D." class="testimonial-img">
                    <div>
                        <h3>John D.</h3>
                        <div class="stars">★★★★★</div>
                    </div>
                </div>
                <p>
                    "I've purchased many shoes over the years, but these are by far the most comfortable ones I've ever
                    owned.
                    I can walk in them all day without any discomfort. The design is stylish and modern, and I receive
                    compliments
                    every time I wear them."
                </p>
            </div>

            <div class="testimonial">
                <div class="testimonial-header">
                    <img src="images/sarah.jpg" alt="Sarah L." class="testimonial-img">
                    <div>
                        <h3>Sarah L.</h3>
                        <div class="stars">★★★★☆</div>
                    </div>
                </div>
                <p>
                    "The attention to detail and quality of these shoes blew me away. The fit is just perfect, and I
                    love how lightweight
                    they are. I wear them to work and casual outings, and they never fail to impress, The attention to
                    detail and quality of these shoes blew me away. The fit is just perfect, and I love how lightweight
                    they are. I wear them to work and casual outings, and they never fail to impress."
                </p>
            </div>

            <div class="testimonial">
                <div class="testimonial-header">
                    <img src="images/michael.jpg" alt="Michael K." class="testimonial-img">
                    <div>
                        <h3>Michael K.</h3>
                        <div class="stars">★★★★★</div>
                    </div>
                </div>
                <p>
                    "These shoes exceeded my expectations! From the moment I put them on, I could tell they were built
                    to last.
                    The craftsmanship is superb, and the materials feel premium, These shoes exceeded my expectations!
                    From the moment I put them on, I could tell they were built to last.
                    The craftsmanship is superb, and the materials feel premium"
                </p>
            </div>

            <div class="testimonial">
                <div class="testimonial-header">
                    <img src="images/priya.jpg" alt="Priya S." class="testimonial-img">
                    <div>
                        <h3>Priya S.</h3>
                        <div class="stars">★★★★☆</div>
                    </div>
                </div>
                <p>
                    "I was skeptical at first, but after receiving my shoes, I was beyond impressed. The delivery was
                    quick, and the shoes
                    fit perfectly. They are now my go-to footwear for any occasion, I was skeptical at first, but after
                    receiving my shoes, I was beyond impressed. The delivery was quick, and the shoes
                    fit perfectly. They are now my go-to footwear for any occasion."
                </p>
            </div>

            <div class="testimonial">
                <div class="testimonial-header">
                    <img src="images/sarah.jpg" alt="Arjun M." class="testimonial-img">
                    <div>
                        <h3>Arjun M.</h3>
                        <div class="stars">★★★★★</div>
                    </div>
                </div>
                <p>
                    "Fantastic experience from start to finish! The ordering process was smooth, and the shoes arrived
                    in perfect condition.
                    They are incredibly comfortable, even after wearing them for long hours, Fantastic experience from
                    start to finish! The ordering process was smooth, and the shoes arrived in perfect condition.
                    They are incredibly comfortable, even after wearing them for long hours."
                </p>
            </div>

            <div class="testimonial">
                <div class="testimonial-header">
                    <img src="images/john.jpg" alt="Lisa R." class="testimonial-img">
                    <div>
                        <h3>Lisa R.</h3>
                        <div class="stars">★★★★☆</div>
                    </div>
                </div>
                <p>
                    "The shoes are amazing! I love how versatile they are—I can pair them with jeans, dresses, and even
                    formal outfits.
                    These are definitely my new favorite pair of shoes!"
                </p>
            </div>

        </div>
    </section>

    <section class="newsletter">
        <h2>Stay Updated</h2>
        <p>Subscribe for exclusive deals & updates.</p>
        <input type="email" placeholder="Enter your email"><br />
        <button>Subscribe</button>
    </section>
@endsection
