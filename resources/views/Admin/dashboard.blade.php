@extends('Admin.layout.main')
@section('shoeX')
    <title>Dashboard</title>
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
    <div class="home-section">

        <div class="abody">

            <div class="back">
                <section class="table-head">
                    <h5>Dashboard</h5>
                </section>
                <section class="table-body">
                    <div class="home">
                        <div class="first">
                            <i class="fa-solid fa-cart-shopping icon"></i>
                            <div class="icon-text">
                                <p class="text">New Orders</p>
                                <p class="number">{{ $placedOrders }}</p>
                            </div>
                        </div>
                        <div class="first">
                            <i class="fa-solid fa-clock icon"></i>
                            <div class="icon-text">
                                <p class="text">Pending Orders</p>
                                <p class="number">{{ $pendingOrders }}</p>
                            </div>
                        </div>
                        <div class="first">
                            <i class="fa-solid fa-basket-shopping icon"></i>
                            <div class="icon-text">
                                <p class="text">Total Orders</p>
                                <p class="number">{{ $orders }}</p>
                            </div>
                        </div>
                        <div class="first">
                            <i class="fa-solid fa-code-branch icon"></i>
                            <div class="icon-text">
                                <p class="text">Total Brands</p>
                                <p class="number">{{ total_brands() }}</p>
                            </div>
                        </div>
                        <div class="first">
                            <i class="fa-solid fa-box icon"></i>
                            <div class="icon-text">
                                <p class="text">Total Products</p>
                                <p class="number">{{ $productCount }}</p>
                            </div>
                        </div>
                        <div class="first">
                            <i class="fa-solid fa-users icon"></i>
                            <div class="icon-text">
                                <p class="text">Total Customers</p>
                                <p class="number">{{ $customerCount }}</p>
                            </div>
                        </div>
                    </div>
                </section>
                <div class="chart-section">
                    <div class="piechart-container">
                        <canvas id="ordersPieChart"></canvas>
                    </div>
                    <div class="barchart-container">
                        <canvas id="ordersBarChart"></canvas>
                    </div>
                </div>
                <div class="recent-orders">
                    <h3>Recent Orders</h3>
                    <table class="order-table">
                        <thead>
                            <tr>
                                <th>Sr No.</th>
                                <th>Order ID</th>
                                <th>Order Item</th>
                                <th>Customer Name</th>
                                <th>Price</th>
                                <th>Address</th>
                                <th>Status</th>
                                <th>Edit</th>
                                <th>View</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($newOrders as $index => $order)
                                <tr>
                                    <td>#{{ $index + 1 }}</td>
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
                                    </td>
                                    <td><a href="{{ route('admin.orders.show', $order->id) }}"><i
                                                class="fa fa-eye edit"></i></a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script>
        const pieCtx = document.getElementById('ordersPieChart').getContext('2d');
        new Chart(pieCtx, {
            type: 'doughnut',
            data: {
                labels: ['New Orders', 'Pending Orders', 'Canceled Orders'],
                datasets: [{
                    data: [{{ $placedOrders }},
                        {{ $pendingOrders }},
                        {{ $cancelledOrders }}
                    ],
                    backgroundColor: ['#10161D', '#212a36', '#3b4859', '#576678'],
                }]
            },
        });

        const barCtx = document.getElementById('ordersBarChart').getContext('2d');
        new Chart(barCtx, {
            type: 'bar',
            data: {
                labels: ['New Orders', 'Pending Orders', 'Canceled Orders'],
                datasets: [{
                    label: 'Orders Overview',
                    data: [{{ $placedOrders }},
                        {{ $pendingOrders }},
                        {{ $cancelledOrders }}
                    ],
                    backgroundColor: ['#10161D', '#212a36', '#3b4859', '#576678'],
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
@endsection
