@extends('user.layouts.main')
@section('shoeX')
    <title>Checkout - ShoeX</title>
    <link rel="stylesheet" href="{{ asset('userscss/nike.css') }}">
    <link rel="stylesheet" href="{{ asset('userscss/checkout.css') }}">
    <div id="header-container"></div>

    <div class="checkout-container">
        {{-- <div class="checkout-progress">
            <div class="progress-step active">
                <div class="step-number">1</div>
                <div class="step-title">Shipping</div>
            </div>
            <div class="progress-step">
                <div class="step-number">2</div>
                <div class="step-title">Payment</div>
            </div>
            <div class="progress-step">
                <div class="step-number">3</div>
                <div class="step-title">Review</div>
            </div>
        </div> --}}

        <div class="checkout-content">
            <div class="checkout-form">
                <h2>Shipping Information</h2>
                <form action="{{ route('customers.update', $user->id) }}" method="POST">
                    @method('PUT')
                    @csrf
                    <div class="form-group">
                        <label for="fullname">Name</label>
                        <input type="text" id="name" name="name" value="{{ $user->name }}"
                            placeholder="Enter your full name">
                        @error('name')
                            <label for="error">
                                {{ $message }}
                            </label>
                        @enderror
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label for="email">Email Address</label>
                            <input type="text" id="email" name="email" value="{{ $user->email }}"
                                placeholder="Enter your email">
                            @error('email')
                                <label for="error">
                                    {{ $message }}
                                </label>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone Number</label>
                            <input type="tel" id="phone" name="phone" value="{{ $user->phone }}"
                                placeholder="Enter your phone number">
                            @error('phone')
                                <label for="error">
                                    {{ $message }}
                                </label>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="address">Street Address</label>
                        <input type="text" id="address" name="address" placeholder="Enter your street address"
                            value="{{ $user->address }}">
                        @error('address')
                            <label for="error">
                                {{ $message }}
                            </label>
                        @enderror
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label for="city">City</label>
                            <input type="text" id="city" name="city" value="{{ $user->city }}"
                                placeholder="Enter your city">
                            @error('city')
                                <label for="error">
                                    {{ $message }}
                                </label>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="state">State</label>
                            <input type="text" id="state" name="state" value="{{ $user->state }}"
                                placeholder="Enter your state">
                            @error('state')
                                <label for="error">
                                    {{ $message }}
                                </label>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="postal">Postal Code</label>
                            <input type="text" id="postal_code" name="postal_code" value="{{ $user->postal_code }}"
                                placeholder="Enter Postal code">
                            @error('postal_code')
                                <label for="error">
                                    {{ $message }}
                                </label>
                            @enderror
                        </div>
                    </div>

                    {{-- <div class="form-group">
                        <label for="country">Country</label>
                        <select id="country">
                            <option value="">Select your country</option>
                            <option value="india">India</option>
                            <option value="usa">United States</option>
                            <option value="uk">United Kingdom</option>
                            <option value="canada">Canada</option>
                        </select>
                    </div> --}}

                    <div>
                        <button type="submit" class="proceed-payment"> {{ $user->addredd ? 'Save' : 'Update' }}
                            Address</button>
                    </div>

                    {{-- <div class="form-group">
                        <label class="checkbox-label">
                            <input type="checkbox" id="save-info">
                            Save this information for next time
                        </label>
                    </div> --}}
                </form>
            </div>

            <div class="order-summary">
                <h3>Order Summary</h3>
                <div class="summary-items">
                    @foreach ($items as $item)
                        <div class="summary-item">
                            <div class="item-info">
                                <img src="{{ asset('storage/' . json_decode($item->product->image_paths)[0]) }}"
                                    alt="{{ $item->product->name }}">
                                <div>
                                    <h4>{{ $item->product->name }}</h4>
                                    <p>Qty: {{ $item->quantity }}</p>
                                    {{-- <p>Size: 9 | Color: Black/White</p> --}}
                                </div>
                            </div>
                            <div class="item-price">₹{{ $item->quantity * $item->product->actual_price }}</div>
                        </div>
                    @endforeach
                    {{-- <div class="summary-item">
                        <div class="item-info">
                            <img src="images/shoe1.jpg" alt="Nike Air Max">
                            <div>
                                <h4>Nike Air Max 270</h4>
                                <p>Size: 8 | Color: Red/Black</p>
                            </div>
                        </div>
                        <div class="item-price">₹9,999</div>
                    </div> --}}
                </div>

                <div class="summary-details">
                    <div class="summary-row">
                        <span>Subtotal</span>
                        <span>₹{{ $subtotal }}</span>
                    </div>
                    <div class="summary-row">
                        <span>Shipping</span>
                        <span>Free</span>
                    </div>
                    @if ($discount != 0)
                        <div class="summary-row">
                            <span>Discount</span>
                            <span>{{ $discount }} % off</span>
                        </div>
                    @endif
                    {{-- <div class="summary-row">
                        <span>Tax</span>
                        <span>₹1,200</span>
                    </div> --}}
                    <div class="summary-row total">
                        <span>Total</span>
                        <span>₹{{ $total }}</span>
                    </div>
                </div>

                <div class="checkout-actions">
                    <a href="{{ route('cart.index') }}" class="back-to-cart">Back to Cart</a>
                    @if ($user->address)
                        <form id="placeorder" action="{{ route('orders.store') }}" method="POST">
                            @csrf
                            <input type="number" name="total_amount" id="total_amount" value="{{ $total }}" hidden>
                            <input type="text" name="payment_type" id="payment_type" value="" hidden>
                            <button class="proceed-payment" id="online">Pay Online</button>
                            <button class="proceed-payment" id="COD">COD</button>
                        </form>
                    @else
                        <label for="">Add Address to Place Order</label>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('online').addEventListener('click', function() {
                document.getElementById('payment_type').value = 'online';
                document.getElementById('placeorder').submit();
            });

            document.getElementById('COD').addEventListener('click', function() {
                document.getElementById('payment_type').value = 'COD';
                document.getElementById('placeorder').submit();
            });
        });
    </script>
@endsection
