@extends('admin.layout.main')
@section('shoeX')
    <title>Customer Details</title>
    <link rel="stylesheet" href="{{ asset('css/editCustomer.css') }}">
    <div class="container">
        <div class ="head">
            <h3>User id: {{ $customer->id }}</h3>
            <p style="color: #10161D ;">{{ $customer->customer_id }}</p><br>
            <p style="font-size: 14px;">Registered on:</p>
            <p style="font-size: 14px;">{{ $customer->created_at }}</p>
        </div>
        <div class ="main-container">
            <div class="left-container">
                <div class="order-items">
                    <h5>Profile</h5>
                    <div class="item">
                        <img src="https://img.freepik.com/free-vector/blue-circle-with-white-user_78370-4707.jpg?semt=ais_hybrid"
                            alt="Nike Shoes" width="200" height="200" onclick="openModal()">

                        <div id="imageModal">
                            <button class="closeBtn" onclick="closeModal()">X</button>
                            <img id="modalImage"
                                src="https://img.freepik.com/free-vector/blue-circle-with-white-user_78370-4707.jpg?semt=ais_hybrid"
                                alt="Nike Shoes">
                        </div>
                    </div>
                </div>
                <div class="payment-details">
                    <h4>All Orders</h4>
                    <div class="item">
                        <table class="order-table">
                            <thead>
                                <tr>
                                    <th>Order ID</th>
                                    <th>Order Item</th>
                                    <th>Customer Name</th>
                                    <th>Price</th>
                                    <th>Address</th>
                                    <th>Status</th>
                                    <th>Edit</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $order)
                                    <tr>
                                        <td>{{ $order->id }}</td>
                                        <td>
                                            @foreach ($order->orderItems as $item)
                                                {{ $item->product->name }} - {{ $item->product->brand }} -
                                                {{ $item->product->type }}
                                                ({{ $item->quantity }})
                                                <br>
                                            @endforeach
                                        </td>
                                        <td>{{ $order->customer->name }}</td>
                                        <td>₹{{ $order->total_amount }}</td>
                                        <td>{{ $order->customer->address }}</td>
                                        <td class="status" data-status="{{ $order->order_status }}">
                                            {{ $order->order_status }}</td>
                                        <td>
                                            @if ($order->order_status == 'placed' || $order->order_status == 'pending')
                                                <form action="{{ route('admin.orders.update', $order->id) }}"
                                                    method="POST" style="display:inline;">
                                                    @csrf
                                                    @method('PUT')
                                                    <button type="submit" class="edit"
                                                        style="border: none; background: none;">
                                                        <i class="fa-solid fa-circle-check"></i>
                                                    </button>
                                                </form>
                                                <form action="{{ route('admin.orders.destroy', $order->id) }}"
                                                    method="POST" style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="edit"
                                                        style="border: none; background: none;">
                                                        <i class="fa-solid fa-ban"></i>
                                                    </button>
                                                </form>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="right-container">
                <div class="customer-details1">
                    <label style="font-size: 16px; font-weight: bold;">Costomers</label><br><br>
                    <label>Customer id:</label>
                    <p>{{ $customer->id }}</p>
                    <label>Customer Name:</label>
                    <p>{{ $customer->name }}</p>
                </div>
                <div class="customer-details2">
                    <label style="font-size: 16px; font-weight: bold;">Contact Details</label><br><br>
                    <label>phone:</label>
                    <p>{{ $customer->phone }}</p>
                    <label>Email id</label>
                    <p>{{ $customer->email }}</p>
                </div>
                <div class="customer-details3">
                    <label style="font-size: 16px; font-weight: bold;">Address</label><br><br>
                    <label>City: </label>
                    <p>{{ $customer->city }}</p>
                    <label>State: </label>
                    <p>{{ $customer->state }}</p>
                    <label>Postal Code: </label>
                    <p>{{ $customer->postal_code }}</p>
                </div>
            </div>
        </div>
    </div>
    <script>
        function openModal() {
            document.getElementById("imageModal").style.display = "flex";
        }

        function closeModal() {
            document.getElementById("imageModal").style.display = "none";
        }
    </script>
@endsection
