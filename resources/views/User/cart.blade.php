@extends('user.layouts.main')
@section('shoeX')
    <title>Shopping Cart - ShoeX</title>
    <link rel="stylesheet" href="{{ asset('userscss/cart.css') }}">
    <div class="cart-container">
        @php
            $subtotal = 0;
        @endphp
        <h2>Shopping Cart</h2>
        <div class="cart-content">
            <div class="cart-items">
                @foreach ($items as $item)
                    <div class="cart-item">
                        <div class="item-image">
                            <img src="{{ asset('storage/' . json_decode($item->product->image_paths)[0]) }}"
                                alt="Nike Air Max">
                        </div>
                        <div class="item-details">
                            <h3>{{ $item->product->name }}</h3>

                            <div class="item-price">
                                <span class="current-price">₹{{ $item->product->actual_price }}</span>
                                <span class="original-price">₹{{ $item->product->mrp }}</span>

                                @php
                                    $discount =
                                        (($item->product->mrp - $item->product->actual_price) / $item->product->mrp) *
                                        100;
                                @endphp
                                <span class="discount">{{ round($discount, 2) }}% off</span>
                            </div>
                        </div>
                        <div class="item-quantity">
                            <form action="{{ route('cart.update', $item->id) }}" method="POST">
                                @method('PUT')
                                @csrf
                                <input type="number" name="product_id" id="product_id" value="{{ $item->product->id }}"
                                    hidden>
                                <button type="submit" class="quantity-btn minus">-</button>
                            </form>
                            <span class="quantity">{{ $item->quantity }}</span>
                            @if ($item->quantity < $item->product->stock)
                                <form action="{{ route('cart.store') }}" method="POST">
                                    @csrf
                                    <input type="number" name="product_id" hidden value="{{ $item->product->id }}">
                                    <button type="submit" class="quantity-btn plus">+</button>
                                </form>
                            @endif
                        </div>
                        <div class="item-total">
                            @php
                                $total = $item->product->actual_price * $item->quantity;
                                $subtotal += $total;
                            @endphp
                            <span>₹{{ $total }}</span>
                        </div>
                        <form action="{{ route('cart.destroy', $item->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="remove-item"><i class="fas fa-trash"></i></button>
                        </form>
                    </div>
                @endforeach
            </div>
            @if (count($items) > 0)
                <form action="{{ route('checkout') }}" method="POST">
                    @csrf
                    <div class="cart-summary">
                        <h3>Order Summary</h3>
                        <div class="summary-details">
                            <div class="summary-row">
                                <span>Subtotal</span>
                                <span>₹<span id="subtotal"
                                        data-subtotal="{{ $subtotal }}">{{ $subtotal }}</span></span>
                            </div>
                            <div class="summary-row">
                                <span>Shipping</span>
                                <span>Free</span>
                            </div>
                            {{-- <div class="summary-row">
                        <span>Tax</span>
                        <span>₹1,200</span>
                        </div> --}}
                            <div class="summary-row" style="display: flex; flex-direction: column;">
                                <h3>Offers</h3>
                                @foreach ($coupons as $coupon)
                                    <label for=""><input type="radio" name="coupon" class="coupon"
                                            data-discount="{{ $coupon->discount }}" value="{{ $coupon->id }}">
                                        {{ $coupon->code }} - {{ $coupon->discount }}% Off
                                    </label>
                                @endforeach
                            </div>
                            <div class="summary-row total">
                                <span>Total</span>
                                <span id="total">₹{{ $subtotal }}</span>
                            </div>
                        </div>
                        {{-- <div class="promo-code">
                        <input type="text" placeholder="Enter promo code">
                        <button class="apply-btn">Apply</button>
                    </div> --}}
                        <div class="checkout-actions">
                            <a href="{{ route('home') }}" class="continue-shopping">Continue Shopping</a>
                            <button type="submit" class="proceed-checkout">Proceed to Checkout</button>
                        </div>
                    </div>
                </form>
            @endif
        </div>
    </div>
    <script>
        document.querySelectorAll('.coupon').forEach(coupon => {
            coupon.addEventListener('change', function() {
                const subtotalElement = document.getElementById('subtotal');
                const totalElement = document.getElementById('total');
                const subtotal = parseFloat(subtotalElement.dataset.subtotal);

                const discount = parseFloat(this.dataset.discount);
                const discountedAmount = subtotal * (discount / 100);
                const total = subtotal - discountedAmount;

                totalElement.textContent = `Total: $${total.toFixed(2)}`;
            });
        });
    </script>
@endsection
