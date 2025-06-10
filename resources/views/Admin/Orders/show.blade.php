@extends('admin.layout.main')
@section('shoeX')
    <title>Order Details</title>
    <link rel="stylesheet" href="{{ asset('css/orderDetails.css') }}">

    <div class="container">
        <div class ="head">
            <h3>Oders Id:</h3>
            <p style="color: #10161D ;">#{{ $order->id }}</p>
            <p style="font-size: 14px;">{{ $order->created_at }}</p>
        </div>
        <div class ="main-container">
            <div class="left-container">
                <div class="order-items">
                    <h4>Order items</h4>
                    @foreach ($order->orderItems as $item)
                        <div class="item">
                            @php
                                $images = json_decode($item->product->image_paths, true);
                            @endphp
                            <img src="{{ asset('storage/' . $images[0]) }}" alt="{{ $item->product->name }}" width="200"
                                height="200" onclick="openModal({{ $item->product->id }})">
                            <!-- Full-Screen Image Dialog -->
                            <div class="imageModal" id='{{ $item->product->id }}'>
                                <button class="closeBtn" onclick="closeModal({{ $item->product->id }})">X</button>
                                <img class="modalImage" src="{{ asset('storage/' . $images[0]) }}"
                                    alt="{{ $item->product->name }}">
                            </div>
                            <div class ="item-details">
                                <label>Shoe id :</label>
                                <label>Brand :</label>
                                <label>Type :</label>
                                <label>Size :</label>
                                <label>MRP :</label>
                                <label>SellingPrice:</label>
                                <label>Quantity :</label>
                                <label>Discription:</label>
                            </div>
                            <div class = "item-details2">
                                <label>{{ $item->product->id }}</label>
                                <label>{{ $item->product->brand }}</label>
                                <label>{{ $item->product->type }}</label>
                                <label>{{ $item->product_size }}</label>
                                <label>{{ $item->product->mrp }}</label>
                                <label>{{ $item->product->actual_price }}</label>
                                <label>{{ $item->quantity }}</label>
                                <label>{{ $item->product->description }}</label>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="payment-details">
                    <h4>Payment Details</h4>
                    <div class="item">
                        <div class ="item-details">
                            <label>Sub total</label>
                            <label>Discount</label>
                            <label style="font-weight: bold;">Total</label>
                            <label>Discount Percentage</label>
                        </div>
                        <div class = "item-details2">
                            <label>₹{{ $subtotal }}</label>
                            <label>-₹{{ $discount }}</label>
                            <label style="font-weight: bold;">₹{{ $total }}</label>
                            <label>{{ $discountPercentage }}%</label>

                        </div>
                    </div>
                </div>
            </div>
            <div class="right-container">
                <div class="customer-details1">
                    <label style="font-size: 16px; font-weight: bold;">Costomers</label><br><br>
                    <label>Customer id:</label>
                    <p>{{ $order->customer->id }}</p>
                    <label>Customer Name:</label>
                    <p>{{ $order->customer->name }}</p>
                </div>
                <div class="customer-details2">
                    <label style="font-size: 16px; font-weight: bold;">Contact Details</label><br><br>
                    <label>phone:</label>
                    <p>{{ $order->customer->phone }}</p>
                    <label>Email id</label>
                    <p>{{ $order->customer->email }}</p>
                </div>
                <div class="customer-details3">
                    <label style="font-size: 16px; font-weight: bold;">Address</label><br><br>
                    <p>{{ $order->customer->city }}</p>
                    <p>{{ $order->customer->state }}</p>
                    <p>{{ $order->customer->postal_code }}</p>
                </div>
                <div class="customer-details3">
                    <label style="font-size: 16px; font-weight: bold;">Order Status</label><br><br>
                    {{ $order->order_status }}<br>
                    @if ($order->order_status == 'placed' || $order->order_status == 'pending')
                        <form action="{{ route('admin.orders.update', $order->id) }}" method="POST"
                            style="display:inline;">
                            @csrf
                            @method('PUT')
                            <button type="submit" class="edit" style="border: none; background: none;">
                                <i class="fa-solid fa-circle-check"></i>
                            </button>
                        </form>
                        <form action="{{ route('admin.orders.destroy', $order->id) }}" method="POST"
                            style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="edit" style="border: none; background: none;">
                                <i class="fa-solid fa-ban"></i>
                            </button>
                        </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <script>
        function openModal(id) {
            document.getElementById(id).style.display = "flex";
        }

        function closeModal(id) {
            document.getElementById(id).style.display = "none";
        }
    </script>
@endsection
