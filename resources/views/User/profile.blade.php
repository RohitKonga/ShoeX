@extends('user.layouts.main')
@section('shoeX')
    <title>{{ $user->name }} - ShoeX</title>
    <link rel="stylesheet" href="{{ asset('userscss/profile.css') }}">
    <div class="profile-container">
        <div class="profile-content">
            <div class="profile-sidebar">

                <h2>{{ $user->name }}</h2>
                <p class="member-since">Member since {{ $user->created_at->format('Y') }}</p>
                <nav class="profile-nav">
                    <ul>
                        <li class="active" data-target="profileSection"><a href="#"><i class="fas fa-user"></i>
                                Personal
                                Info</a></li>
                        {{-- <li data-target="addressSection"><a href="#"><i class="fas fa-map-marker-alt"></i>
                                Addresses</a>
                        </li> --}}
                        <li data-target="ordersSection"><a href="#"><i class="fas fa-shopping-bag"></i> Orders</a>
                        </li>
                        <li><a href="{{ route('wishlist.index') }}"><i class="fas fa-heart"></i> Wishlist</a></li>
                        <li><a href="{{ route('logout') }}" class="logout-link"><i class="fas fa-sign-out-alt"></i>
                                Logout</a></li>
                    </ul>
                </nav>
            </div>

            <div id="profileSection" class="profile-main active">
                <div class="profile-section">
                    <h3>Personal Information</h3>
                    <form class="profile-form" action="{{ route('customers.update', $user->id) }}" method="POST">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label for="fullname">Full Name</label>
                            <input type="text" id="fullname" name="name" value="{{ $user->name }}">
                            @error('name')
                                <label for="error">
                                    {{ $message }}
                                </label>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="email">Email Address</label>
                            <input type="text" id="email" name="email" value="{{ $user->email }}">
                            @error('email')
                                <label for="error">
                                    {{ $message }}
                                </label>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone Number</label>
                            <input type="tel" id="phone" name="phone" value="{{ $user->phone }}">
                            @error('phone')
                                <label for="error">
                                    {{ $message }}
                                </label>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="address">Address</label>
                            <textarea name="address" id="" name="address" cols="30" rows="10">{{ $user->address }}</textarea>
                            @error('address')
                                <label for="error">
                                    {{ $message }}
                                </label>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="city">City</label>
                            <input type="text" id="city" name="city" value="{{ $user->city }}">
                            @error('city')
                                <label for="error">
                                    {{ $message }}
                                </label>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="state">State</label>
                            <input type="text" id="state" name="state" value="{{ $user->state }}">
                            @error('state')
                                <label for="error">
                                    {{ $message }}
                                </label>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="postal_code">Postal Code</label>
                            <input type="text" id="postal_code" name="postal_code" value="{{ $user->postal_code }}">
                            @error('postal_code')
                                <label for="error">
                                    {{ $message }}
                                </label>
                            @enderror
                        </div>
                        {{-- 
                        <div class="form-group">
                            <label>Gender</label>
                            <div class="radio-group">
                                <label>
                                    <input type="radio" name="gender" value="male" checked>
                                    Male
                                </label>
                                <label>
                                    <input type="radio" name="gender" value="female">
                                    Female
                                </label>
                                <label>
                                    <input type="radio" name="gender" value="other">
                                    Other
                                </label>
                            </div>
                        </div> --}}
                        <div class="form-actions">
                            {{-- <button type="button" class="cancel-btn">Cancel</button> --}}
                            <button type="submit" class="save-btn">{{ $user->addredd ? 'Save' : 'Update' }}
                                Address</button>
                        </div>
                    </form>
                </div>

                <div class="profile-section">
                    <h3>Change Password</h3>
                    <form class="password-form">
                        <div class="form-group">
                            <label for="current-password">Current Password</label>
                            <input type="password" id="current-password">
                        </div>
                        <div class="form-group">
                            <label for="new-password">New Password</label>
                            <input type="password" id="new-password">
                        </div>
                        <div class="form-group">
                            <label for="confirm-password">Confirm New Password</label>
                            <input type="password" id="confirm-password">
                        </div>
                        <div class="form-actions">
                            <button type="submit" class="save-btn">Update Password</button>
                        </div>
                    </form>
                </div>
            </div>
            <div id="addressSection" class="profile-main">
                <div class="addresses-header">
                    <h3>My Addresses</h3>
                </div>

                <div class="addresses-grid">
                    <div class="address-card">
                        <div class="address-content">
                            <p>{{ $user->address }}</p>
                            <p>{{ $user->city }}</p>
                            <p>{{ $user->state }}</p>
                            <p>{{ $user->postal_code }}</p>
                        </div>
                        <div class="address-actions">
                            <button class="edit-address">
                                <i class="fas fa-edit"></i> Edit
                            </button>

                        </div>
                    </div>


                </div>
            </div>
            <div id="ordersSection" class="profile-main">
                <div class="orders-header">
                    <h3>My Orders</h3>
                </div>

                <div class="orders-list">
                    @foreach ($orders as $order)
                        <div class="order-card">
                            <div class="order-header">
                                <div class="order-info">
                                    <span class="order-id">Order #{{ $order->id }}</span>
                                    <span class="order-date">Placed on {{ $order->created_at->format('d-M-Y') }}</span>
                                </div>
                                <div class="order-status {{ $order->order_status }}">
                                    <i class="fas fa-check-circle"></i>
                                    {{ $order->order_status }}
                                </div>
                            </div>
                            <div class="order-items">
                                @php
                                    $subtotal = 0;
                                    $total = 0;
                                @endphp
                                @foreach ($order->orderItems as $item)
                                    <div class="order-item">
                                        <a href="{{ route('products.show', $item->product->id) }}">
                                            <img src="{{ asset('storage/' . json_decode($item->product->image_paths)[0]) }}"
                                                alt="{{ $item->product->name }}">
                                        </a>
                                        <div class="item-details">
                                            <h4>{{ $item->product->name }} - {{ $item->product->brand }}</h4>
                                            {{-- <p>Size: 10 | Color: Black/White</p> --}}
                                            <p>Quantity: {{ $item->quantity }}</p>
                                        </div>
                                        <div class="item-price">
                                            ₹{{ round($item->quantity * $item->product->actual_price, 2) }}</div>
                                        @php
                                            $subtotal += $item->quantity * $item->product->actual_price;
                                            $total += $item->subtotal;
                                        @endphp
                                    </div>
                                @endforeach
                            </div>
                            <div class="order-summary">
                                <div class="summary-row">
                                    <span>Subtotal</span>
                                    <span>₹{{ round($subtotal, 2) }}</span>
                                </div>
                                <div class="summary-row">
                                    <span>Discount</span>
                                    <span>₹{{ round(abs($total - $subtotal), 2) }}</span>
                                </div>
                                <div class="summary-row">
                                    <span>Shipping</span>
                                    <span>Free</span>
                                </div>
                                <div class="summary-row total">
                                    <span>Total</span>
                                    <span>₹{{ round($total, 2) }}</span>
                                </div>
                            </div>
                            <div class="order-actions">
                                {{-- <button class="track-order">
                                <i class="fas fa-truck"></i>
                                Track Order
                            </button> --}}
                                {{-- <button class="track-order">
                                    <i class="fas fa-shopping-cart"></i>
                                    Buy Again
                                </button> --}}
                            </div>
                        </div>
                    @endforeach


                </div>
            </div>

        </div>
    </div>
    <script>
        const navItems = document.querySelectorAll('.profile-nav li[data-target]');
        const sections = document.querySelectorAll('.profile-main');

        navItems.forEach(item => {
            item.addEventListener('click', () => {
                // Remove active class from all nav items
                navItems.forEach(nav => nav.classList.remove('active'));
                item.classList.add('active');

                // Hide all sections
                sections.forEach(sec => sec.classList.remove('active'));

                // Show the targeted section
                const targetId = item.getAttribute('data-target');
                document.getElementById(targetId).classList.add('active');
            });
        });
    </script>
@endsection
