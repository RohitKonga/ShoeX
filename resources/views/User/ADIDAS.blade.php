@extends('user.layouts.main')
@section('shoeX')
    <title>Adidas Store</title>
    <link rel="stylesheet" href="{{ asset('userscss/adidas.css') }}" />
    <section class="hero">
        <img class="hero" src="{{ asset('storage/banners/adidasbanner.jpg') }}" alt="MainBanner" />
    </section>

    <!-- Main Section with Two Images -->
    <section class="main-section">
        <div class="image-container">
            <img src="{{ asset('images/mainimg.jpg') }}" alt="Nike Shoes" class="lazyload"
                data-src="{{ asset('images/mainimg.jpg') }}" />
        </div>
        <div class="text-content">
            <p>Just in</p>
            <h2>Elevate Your Game</h2>
            <p>
                Step into the future of footwear with our latest collection, designed
                for performance and style.
            </p>
            <a href="{{ route('home') }}"><button>Shop</button></a>
        </div>
    </section>
    <section class="shop-by-gender">
        <h2>Shop By Gender</h2>
        <div class="gender-container">
            <div class="gender-card">
                <img src="{{ asset('images/adidasshopbygender 2.avif') }}" alt="Men's Fashion" class="lazyload"
                    data-src="{{ asset('images/adidasshopbygender 2.avif') }}" />
                <a href="{{ route('category.show', ['category' => 'Men']) }}"><button>Shop Men's</button></a>
            </div>
            <div class="gender-card">
                <img src="{{ asset('images/adidasshopbygender 1.avif') }}" alt="Men's Fashion" class="lazyload"
                    data-src="{{ asset('images/adidasshopbygender 1.avif') }}" />
                <a href="{{ route('category.show', ['category' => 'Women']) }}"><button>Shop Women's</button></a>
            </div>
            <div class="gender-card">
                <img src="{{ asset('images/adidasshopbygender 3.avif') }}" alt="Men's Fashion" class="lazyload"
                    data-src="{{ asset('images/adidasshopbygender 3.avif') }}" />
                <a href="{{ route('category.show', ['category' => 'Kids']) }}"> <button>Shop Kids</button></a>
            </div>
        </div>
    </section>
    <section class="featured-section">
        <div class="featured-content">
            <h2>Featured</h2>
            <div class="video-container">
                <video autoplay loop muted playsinline>
                    <source src="{{ asset('images/3115442-hd_1920_1080_24fps.mp4') }}" type="video/mp4" />
                    Your browser does not support the video tag.
                </video>
            </div>
            {{-- <div class="featured-text">
                <h3>RACE THE NIGHT AWAY</h3>
                <p>
                    Run until you see stars all the time After Dark Turt, a nice series
                    powered by women.
                </p>
                <p>Cinnamon Cinnamon</p>
                <button>Register Now</button>
                <button>Shop Running</button>
            </div> --}}
        </div>
    </section>
    <section class="latest-section">
        <div class="section-header">
            <h2>The Latest & Greatest</h2>
            <div class="navigation-buttons">
                <h1>Shop</h1>

            </div>
        </div>
        <section class="featured-products">
            <div class="product-grid">
                @foreach ($products as $product)
                    <x-product-card :product="$product" />
                @endforeach
            </div>
        </section>
        {{-- <div class="scroll-container">
            <div class="scroll-content" id="latest1">
                <div class="item">
                    <img src="images/adidas 1.avif" alt="Nike At Max DIB" class="lazyload"
                        data-src="images/adidas 1.avif" />
                    <h3>Handball Spezial Shoes</h3>
                    <p>MRP: ₹495.00</p>
                </div>
                <div class="item">
                    <img src="images/adidas 2.avif" alt="Nike At Max DIB" class="lazyload"
                        data-src="images/adidas 2.avif" />
                    <h3>Supernova Rise 2 Running Shoes</h3>
                    <p>MRP: ₹595.00</p>
                </div>
                <div class="item">
                    <img src="images/adidas 3.avif" alt="Nike At Max DIB" class="lazyload"
                        data-src="images/adidas 3.avif" />
                    <h3>Superstar || Shoes</h3>
                    <p>MRP: ₹999.00</p>
                </div>
                <div class="item">
                    <img src="images/adidas 5.avif" alt="Nike At Max DIB" class="lazyload"
                        data-src="images/adidas 5.avif" />
                    <h3>Adizero Boston 12 Shoes</h3>
                    <p>MRP: ₹700.00</p>
                </div>
                <div class="item">
                    <img src="images/adidas 4.avif" alt="Nike At Max DIB" class="lazyload"
                        data-src="images/adidas 4.avif" />
                    <h3>Superstar || Shoes</h3>
                    <p>MRP: ₹695.00</p>
                </div>
                <div class="item">
                    <img src="images/adidas 11.avif" alt="Nike At Max DIB" class="lazyload"
                        data-src="images/adidas 11.avif" />
                    <h3>Ultraboost 5 Shoes</h3>
                    <p>MRP: ₹495.00</p>
                </div>
                <div class="item">
                    <img src="images/adidas 7.avif" alt="Nike At Max DIB" class="lazyload"
                        data-src="images/adidas 7.avif" />
                    <h3>Predator League Fold-Over Tongue</h3>
                    <p>MRP: ₹899.00</p>
                </div>
                <div class="item">
                    <img src="images/adidas 8.avif" alt="Nike At Max DIB" class="lazyload"
                        data-src="images/adidas 8.avif" />
                    <h3>Adidas At Max DIB</h3>
                    <p>MRP: ₹795.00</p>
                </div>
                <div class="item">
                    <img src="images/adidas 9.avif" alt="Nike At Max DIB" class="lazyload"
                        data-src="images/adidas 9.avif" />
                    <h3>Adidas At Max DIB</h3>
                    <p>MRP: ₹895.00</p>
                </div>
                <div class="item">
                    <img src="images/adidas 10.avif" alt="Nike At Max DIB" class="lazyload"
                        data-src="images/adidas 10.avif" />
                    <h3>Mercs Steady</h3>
                    <p>MRP: ₹455.00</p>
                </div>
            </div>
        </div> --}}
    </section>
    {{-- <section class="latest-section" style="padding: 100px 20px">
        <div class="section-header">
            <h2>Shop by Icons</h2>

        </div>
        <div class="scroll-container">
            <div class="scroll-content" id="icons">
                <div class="item">
                    <img src="images/adidas 12.avif" alt="Nike At Max DIB" class="lazyload"
                        data-src="images/adidas 12.avif" />
                    <h3>Predator Club Firm/Multi-Ground Boots</h3>
                    <p>MRP: ₹895.00</p>
                </div>
                <div class="item">
                    <img src="images/adidas 13.avif" alt="Nike At Max DIB" class="lazyload"
                        data-src="images/adidas 13.avif" />
                    <h3>Handball Spezial Shoes</h3>
                    <p>MRP: ₹495.00</p>
                </div>
                <div class="item">
                    <img src="images/adidas 14.avif" alt="Nike At Max DIB" class="lazyload"
                        data-src="images/adidas 14.avif" />
                    <h3>Supernova Rise 2 Running Shoes</h3>
                    <p>MRP: ₹795.00</p>
                </div>
                <div class="item">
                    <img src="images/adidas 15.avif" alt="Nike At Max DIB" class="lazyload"
                        data-src="images/adidas 15.avif" />
                    <h3>Adidas At Max DIB</h3>
                    <p>MRP: ₹695.00</p>
                </div>
                <div class="item">
                    <img src="images/adidas 16.avif" alt="Nike At Max DIB" class="lazyload"
                        data-src="images/adidas 16.avif" />
                    <h3>City RNR ShoesDIB</h3>
                    <p>MRP: ₹750.00</p>
                </div>
                <div class="item">
                    <img src="images/adidas 17.avif" alt="Nike At Max DIB" class="lazyload"
                        data-src="images/adidas 17.avif" />
                    <h3>City RNR Shoes</h3>
                    <p>MRP: ₹720.00</p>
                </div>
                <div class="item">
                    <img src="images/adidas 18.avif" alt="Nike At Max DIB" class="lazyload"
                        data-src="images/adidas 18.avif" />
                    <h3>Campus 00s Shoes</h3>
                    <p>MRP: ₹895.00</p>
                </div>
                <div class="item">
                    <img src="images/adidas 1.jpg" alt="Nike At Max DIB" class="lazyload"
                        data-src="images/adidas 1.jpg" />
                    <h3>Adidas At Max DIB</h3>
                    <p>MRP: ₹795.00</p>
                </div>
            </div>
        </div>
    </section>
    <section class="main-section">
        <h1 id="Dontmisstext" style="padding: 30px 0; width: 100%; max-width: 1230px">
            Don't Miss
        </h1>

        <div class="image-container">
            <img src="images/dontmiss 1.avif" alt="Nike Shoes" class="lazyload" data-src="images/dontmiss 1.avif" />
        </div>
        <div class="text-content">
            <p>Just in</p>
            <h2>Elevate Your Game</h2>
            <p>
                Step into the future of footwear with our latest collection, designed
                for performance and style.
            </p>
            <button>Shop</button>
        </div>
    </section>
    <section class="latest-section">
        <div class="section-header">
            <h2>Shop By Sport</h2>

        </div>
        <div class="scroll-container">
            <div class="scroll-content" id="sport">
                <div class="item" style="position: relative; display: inline-block">
                    <img src="images/running.jpg" alt="Nike At Max DIB" style="width: 100%; display: block"
                        class="lazyload" data-src="images/running.jpg" />

                    <p
                        style="
                position: absolute;
                bottom: 10px;
                left: 10px;
                color: white;
                background: rgba(0, 0, 0, 0.6);
                padding: 5px;
              ">
                        Running
                    </p>
                </div>
                <div class="item" style="position: relative; display: inline-block">
                    <img src="images/football.jpg" alt="Nike At Max DIB" style="width: 100%; display: block"
                        class="lazyload" data-src="images/football.jpg" />

                    <p
                        style="
                position: absolute;
                bottom: 10px;
                left: 10px;
                color: white;
                background: rgba(0, 0, 0, 0.6);
                padding: 5px;
              ">
                        Football
                    </p>
                </div>
                <div class="item" style="position: relative; display: inline-block">
                    <img src="images/basketball.jpg" alt="Nike At Max DIB" style="width: 100%; display: block"
                        class="lazyload" data-src="images/basketball.jpg" />

                    <p
                        style="
                position: absolute;
                bottom: 10px;
                left: 10px;
                color: white;
                background: rgba(0, 0, 0, 0.6);
                padding: 5px;
              ">
                        Basketball
                    </p>
                </div>
                <div class="item" style="position: relative; display: inline-block">
                    <img src="images/trainingand gym.jpg" alt="Nike At Max DIB" style="width: 100%; display: block"
                        class="lazyload" data-src="images/trainingand gym.jpg" />

                    <p
                        style="
                position: absolute;
                bottom: 10px;
                left: 10px;
                color: white;
                background: rgba(0, 0, 0, 0.6);
                padding: 5px;
              ">
                        Traning and gym
                    </p>
                </div>
                <div class="item" style="position: relative; display: inline-block">
                    <img src="images/teenis.jpg" alt="Nike At Max DIB" style="width: 100%; display: block"
                        class="lazyload" data-src="images/teenis.jpg" />

                    <p
                        style="
                position: absolute;
                bottom: 10px;
                left: 10px;
                color: white;
                background: rgba(0, 0, 0, 0.6);
                padding: 5px;
              ">
                        Tennis
                    </p>
                </div>
                <div class="item" style="position: relative; display: inline-block">
                    <img src="images/yoga.jpg" alt="Nike At Max DIB" style="width: 100%; display: block"
                        class="lazyload" data-src="images/yoga.jpg" />

                    <p
                        style="
                position: absolute;
                bottom: 10px;
                left: 10px;
                color: white;
                background: rgba(0, 0, 0, 0.6);
                padding: 5px;
              ">
                        Yoga
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section class="latest-section" style="padding: 100px 20px">
        <div class="section-header">
            <h2>Member Benefits</h2>

        </div>
        <div class="scroll-container">
            <div class="scroll-content" id="benefits">
                <div class="item" style="position: relative; display: inline-block; overflow: hidden">
                    <img src="images/memberbenefits1.jpg" alt="Nike At Max DIB" style="width: 100%; display: block"
                        class="lazyload" data-src="images/memberbenefits1.jpg" />
                    <div style="position: absolute; bottom: 20px; left: 20px">
                        <button
                            style="
                  margin-top: 10px;
                  padding: 10px 20px;
                  border: none;
                  background: white;
                  color: black;
                  font-size: 16px;
                  cursor: pointer;
                  border-radius: 30px;
                ">
                            Shop Now
                        </button>
                    </div>
                </div>
                <div class="item" style="position: relative; display: inline-block; overflow: hidden">
                    <img src="images/memberbenefits2.jpg" alt="Nike At Max DIB" style="width: 100%; display: block"
                        class="lazyload" data-src="images/memberbenefits2.jpg" />
                    <div style="position: absolute; bottom: 20px; left: 20px">
                        <button
                            style="
                  margin-top: 10px;
                  padding: 10px 20px;
                  border: none;
                  background: white;
                  color: black;
                  font-size: 16px;
                  cursor: pointer;
                  border-radius: 30px;
                ">
                            Shop Now
                        </button>
                    </div>
                </div>
                <div class="item" style="position: relative; display: inline-block; overflow: hidden">
                    <img src="images/memberbenefits3.jpg" alt="Nike At Max DIB" style="width: 100%; display: block"
                        class="lazyload" data-src="images/memberbenefits3.jpg" />
                    <div style="position: absolute; bottom: 20px; left: 20px">
                        <button
                            style="
                  margin-top: 10px;
                  padding: 10px 20px;
                  border: none;
                  background: white;
                  color: black;
                  font-size: 16px;
                  cursor: pointer;
                  border-radius: 30px;
                ">
                            Shop Now
                        </button>
                    </div>
                </div>
                <div class="item" style="position: relative; display: inline-block; overflow: hidden">
                    <img src="images/memberbenefits4.jpg" alt="Nike At Max DIB" style="width: 100%; display: block"
                        class="lazyload" data-src="images/memberbenefits4.jpg" />
                    <div style="position: absolute; bottom: 20px; left: 20px">
                        <button
                            style="
                  margin-top: 10px;
                  padding: 10px 20px;
                  border: none;
                  background: white;
                  color: black;
                  font-size: 16px;
                  cursor: pointer;
                  border-radius: 30px;
                ">
                            Shop Now
                        </button>
                    </div>
                </div>
                <div class="item" style="position: relative; display: inline-block; overflow: hidden">
                    <img src="images/memberbenefits5.jpg" alt="Nike At Max DIB" style="width: 100%; display: block"
                        class="lazyload" data-src="images/memberbenefits5.jpg" />
                    <div style="position: absolute; bottom: 20px; left: 20px">
                        <button
                            style="
                  margin-top: 10px;
                  padding: 10px 20px;
                  border: none;
                  background: white;
                  color: black;
                  font-size: 16px;
                  cursor: pointer;
                  border-radius: 30px;
                ">
                            Shop Now
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
    <script>
        // function openSidebar() {
        //     document.getElementById("sidebar").style.left = "0";
        // }

        // function closeSidebar() {
        //     document.getElementById("sidebar").style.left = "-250px";
        // }

        // function scrollRight(sectionId) {
        //     const scrollContent = document.getElementById(sectionId);
        //     scrollContent.scrollBy({
        //         left: 200,
        //         behavior: "smooth"
        //     });
        // }

        // Lazy Loading
        document.addEventListener("DOMContentLoaded", function() {
            const lazyImages = document.querySelectorAll(".lazyload");

            const lazyLoad = (target) => {
                const io = new IntersectionObserver((entries, observer) => {
                    entries.forEach((entry) => {
                        if (entry.isIntersecting) {
                            const img = entry.target;
                            img.src = img.dataset.src;
                            img.classList.add("lazyloaded");
                            observer.unobserve(img);
                        }
                    });
                });

                io.observe(target);
            };

            lazyImages.forEach(lazyLoad);
        });
    </script>
@endsection
