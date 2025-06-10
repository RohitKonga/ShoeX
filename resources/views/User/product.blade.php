@extends('user.layouts.main')
@section('shoeX')
    <title>Product Details - Nike Store</title>
    <link rel="stylesheet" href="{{ asset('userscss/product.css') }}">
    <div class="product-detail-container">
        <div class="product-images">
            <div class="main-image">
                <img src="{{ asset('storage/' . json_decode($product->image_paths)[0]) }}" alt="Nike Air Max" id="mainImage">
            </div>
            <div class="thumbnail-images">
                @foreach (json_decode($product->image_paths) as $image)
                    <img src="{{ asset('storage/' . $image) }}" alt="{{ $product->name }}" class="thumbnail"
                        onclick="changeImage(this.src)">
                @endforeach
                {{-- <img src="images/shoe2.jpg" alt="Nike Air Max" class="thumbnail active" onclick="changeImage(this.src)">
                <img src="images/shoe4.jpg" alt="Nike Air Max" class="thumbnail" onclick="changeImage(this.src)">
                <img src="images/shoe5.jpg" alt="Nike Air Max" class="thumbnail" onclick="changeImage(this.src)"> --}}
            </div>
        </div>

        <div class="product-info">
            <h1 class="product-title">{{ $product->name }} - {{ $product->brand }}</h1>
            <div class="product-rating">
                @for ($i = 0; $i < floor($product->reviews_avg_rating); $i++)
                    <i class="fas fa-star"></i>
                @endfor
                @if (floor($product->reviews_avg_rating) < $product->reviews_avg_rating)
                    <i class="fas fa-star-half-alt"></i>
                @endif
                <span>({{ round($product->reviews_avg_rating, 1) }}/5)</span>
            </div>

            <div class="price-section">
                <span class="current-price">₹{{ $product->actual_price }}</span>
                <span class="original-price">₹{{ $product->mrp }}</span>
                @php
                    $discount = (($product->mrp - $product->actual_price) / $product->mrp) * 100;
                @endphp
                <span class="discount">{{ round($discount, 2) }}% off</span>
            </div>

            {{-- <div class="size-options">
                <h3>Select Size:</h3>
                <div class="size-buttons">
                    <button class="size-btn active">7</button>
                    <button class="size-btn">8</button>
                    <button class="size-btn">9</button>
                    <button class="size-btn">10</button>
                </div>
            </div> --}}

            <div class="product-actions">
                <div class="primary-actions">
                    @if($product->stock>0)
                        <form action="{{ route('cart.store') }}" method="POST">
                            @csrf
                            <input type="number" name="product_id" value="{{ $product->id }}" hidden>
                            {{-- <button class="add-to-cart" type="submit">Add to Cart</button> --}}
                            <button class="add-to-cart-btn">Add to Cart</button>
                        </form>
                    @endif
                    {{-- <button class="buy-now-btn">Buy Now</button> --}}
                </div>
                @if ($product->wished)
                    <form action="{{ route('wishlist.destroy', $product->wished) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        {{-- <div class="wishlist-icon" onclick="this.closest('form').submit()" style="color: red">♥
                        </div> --}}
                        <button class="wishlist-btn" onclick="this.closest('form').submit()"><i class="far fa-heart"></i>
                            Remove from
                            Wishlist</button>
                    </form>
                @else
                    <form action="{{ route('wishlist.store') }}" method="POST">
                        @csrf
                        @method('POST')
                        <input type="number" name="product_id" value="{{ $product->id }}" hidden>
                        <button class="wishlist-btn" onclick="this.closest('form').submit()"><i class="far fa-heart"></i>
                            Save to
                            Wishlist</button>
                        {{-- <div class="wishlist-icon" onclick="this.closest('form').submit()" style="color:black">♥</div> --}}
                    </form>
                @endif

            </div>

            <div class="product-description">
                <h3>Product Description</h3>
                <p>{{ $product->description }}</p>
            </div>

            <div class="product-features">
                <h3>Key Features</h3>
                <ul>
                    <li><i class="fas fa-check"></i> Large Air unit for maximum cushioning</li>
                    <li><i class="fas fa-check"></i> Breathable mesh upper</li>
                    <li><i class="fas fa-check"></i> React foam midsole</li>
                    <li><i class="fas fa-check"></i> Rubber outsole for traction</li>
                </ul>
            </div>

            <div class="product-offers">
                <h3>Special Offers</h3>
                <ul>
                    <li><i class="fas fa-gift"></i> Free delivery</li>
                    <li><i class="fas fa-undo"></i> 30 days easy returns</li>
                    <li><i class="fas fa-shield-alt"></i> 1 year warranty</li>
                </ul>
            </div>
        </div>
    </div>

    <div class="testimonials">
        <h3>Customer Reviews</h3>
        <div class="testimonial-grid">
            @if ($canReview)
                <div class="testimonial-card">
                    <div class="testimonial-content">
                        <i class="fas fa-quote-left"></i>
                        <div style="display: flex;justify-content: space-between;">
                            @for ($i = 0; $i < 5; $i++)
                                <i class="fas fa-star" style="color:orange"></i>
                            @endfor
                        </div>
                        <form action="{{ route('reviews.store') }}" method="POST">
                            @csrf
                            <input type="number" name="product_id" id="product_id" value="{{ $product->id }}" hidden>
                            <input type="range" name="rating" id="rating" min="1" max="5"
                                style="width:100%" value="{{ $review->rating ?? 5 }}">
                            <textarea name="review_text" id="review_text" cols="30" rows="10">{{ $review->review_text ?? '' }}</textarea>
                            <button type="submit" class="save-btn">{{ $review ? 'Update' : 'Add' }} Review</button>
                        </form>
                    </div>
                </div>
            @endif
            @foreach ($product->reviews as $r)
                @if ($r->display == 'show')
                    <div class="testimonial-card">
                        <div class="testimonial-content">
                            <i>{{ $r->rating }}<i class="fas fa-star"></i></i><br>
                            <i class="fas fa-quote-left"></i>
                            <p>"{{ $r->review_text }}"</p>
                        </div>
                        <div class="testimonial-author">
                            <div class="author-info">
                                <h4>{{ $r->customer->name }}</h4>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
    <div class="recommended-products">
        <h2>Recommended Products</h2>

        <div class="product-grid">
            @foreach ($products as $product)
                <x-product-card :product="$product" />
            @endforeach
            {{-- <div class="product-card">
                <div class="product-image">
                    <img src="images/shoe1.jpg" alt="Killer Navy Walking Shoes">
                    <div class="wishlist-icon">♥</div>
                </div>
                <div class="product-info">
                    <h3>KILLER</h3>
                    <p class="product-name">Dunk Low Next Nature "White/Black" sneakers</p>
                    <div class="price-section">
                        <span class="current-price">₹999</span>
                        <span class="original-price">₹1,999</span>
                        <span class="discount">50% off</span>
                    </div>
                    <p class="delivery">Free delivery</p>
                    <button class="add-to-cart">Add to Cart</button>
                </div>
            </div> --}}
        </div>
    </div>

    <script>
        function changeImage(src) {
            document.getElementById('mainImage').src = src;
            document.querySelectorAll('.thumbnail').forEach(thumb => {
                thumb.classList.remove('active');
                if (thumb.src === src) {
                    thumb.classList.add('active');
                }
            });
        }

        document.querySelectorAll('.size-btn').forEach(btn => {
            btn.addEventListener('click', function() {
                document.querySelectorAll('.size-btn').forEach(b => b.classList.remove('active'));
                this.classList.add('active');
            });
        });
    </script>
@endsection
