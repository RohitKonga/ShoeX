@extends('user.layouts.main')
@section('shoeX')
    <link rel="stylesheet" href="{{ asset('userscss/wishlist.css') }}">
    {{-- <link rel="stylesheet" href="{{ asset('userscss/nike.css') }}"> --}}
    <title>Wishlist - ShoeX</title>
    <div class="wishlist-container">
        <h2>My Wishlist</h2>
        <div class="wishlist-content">
            <div class="wishlist-items">
                @foreach ($items as $item)
                    <div class="wishlist-item">
                        <div class="item-image">
                            <img src="{{ asset('storage/' . json_decode($item->product->image_paths)[0]) }}" alt="Nike React">
                        </div>
                        <div class="item-details">
                            <h3>{{ $item->product->name }} - {{ $item->product->brand }}</h3>
                            <div class="item-price">
                                <span class="current-price">₹{{ $item->product->actual_price }}</span>
                                <span class="original-price">₹{{ $item->product->mrp }}</span>
                                @php
                                    $discount =
                                        (($item->product->mrp - $item->product->actual_price) / $item->product->mrp) *
                                        100;
                                @endphp
                                <span class="discount">{{ round($discount, 2) }}% OFF</span>
                            </div>
                        </div>
                        <div class="item-actions">
                            <form id="1_{{ $item->id }}" action="{{ route('cart.store') }}" method="POST">
                                @csrf
                                <input type="number" name="product_id" value="{{ $item->product->id }}" hidden>
                            </form>
                            <form id="2_{{ $item->id }}" action="{{ route('wishlist.destroy', $item->id) }}"
                                method="POST">
                                @csrf
                                @method('DELETE')
                            </form>
                            <button class="add-to-cart" onclick="AddCardDeleteWishlist({{ $item->id }})">Add to
                                Cart</button>
                            <form action="{{ route('wishlist.destroy', $item->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="remove-item" onclick="this.closest.(form).submit()"><i
                                        class="fas fa-trash"></i> Remove from
                                    Wishlist</button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <script>
        function AddCardDeleteWishlist(id) {
            document.getElementById('1_' + id).submit();
            document.getElementById('2_' + id).submit();
        }
    </script>
@endsection
