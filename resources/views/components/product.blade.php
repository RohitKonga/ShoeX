<div class="product-card">
    <div class="product-image">
        <a href="{{ route('products.show', $product->id) }}">
            <img src="{{ asset('storage/' . json_decode($product->image_paths)[0]) }}" alt="{{ $product->name }}">
        </a>
        @if ($product->wished)
            <form action="{{ route('wishlist.destroy', $product->wished) }}" method="POST">
                @csrf
                @method('DELETE')
                <div class="wishlist-icon" onclick="this.closest('form').submit()" style="color: red">♥
                </div>
            </form>
        @else
            <form action="{{ route('wishlist.store') }}" method="POST">
                @csrf
                @method('POST')
                <input type="number" name="product_id" value="{{ $product->id }}" hidden>
                <div class="wishlist-icon" onclick="this.closest('form').submit()" style="color:black">♥</div>
            </form>
        @endif
    </div>
    <div class="product-info">
        <h3>{{ $product->brand }}</h3>
        <p class="product-name">{{ $product->name }}</p>

        <div class="price-section">
            <span class="current-price">₹{{ $product->actual_price }}</span>
            <span class="original-price">₹{{ $product->mrp }}</span>
            @php
                $discount = (($product->mrp - $product->actual_price) / $product->mrp) * 100;
            @endphp
            <span class="discount">{{ round($discount, 2) }}% off</span>
        </div>

        <p class="delivery">Free delivery</p>
        <form action="{{ route('cart.store') }}" method="POST">
            @csrf
            <input type="number" name="product_id" value="{{ $product->id }}" hidden>
            <button class="add-to-cart" type="submit">Add to Cart</button>
        </form>
    </div>
</div>
