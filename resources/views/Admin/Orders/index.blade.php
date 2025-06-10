@extends('admin.layout.main')
@section('shoeX')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Orders</title>
    <link rel="stylesheet" href="{{ asset('css/orders.css') }}">
    <div class="home-section">

        <div class="abody">

            <div class="back">
                <section class="table-head" style="display: flex; align-items: center; justify-content: space-between;">
                    <h5>All Orders</h5>

                    <!-- Search Bar -->
                    <div class="search-container">
                        <form action="{{ route('admin.orders.search') }}" method="GET">
                            <input type="text" name="query" class="search-bar" placeholder="Search orders..."
                                value="{{ request('query') }}">
                            <button type="submit"><i class="fa fa-search"></i></button>
                        </form>

                    </div>
                    <!-- Filter Dropdowns -->
                    <div class="filters">
                        <p style="font-size: 12px;">Status :</p>
                        <select id="stock-filter" name="order_status" class="filter-dropdown">
                            <option selected value="">All</option>
                            <option value="placed">Placed</option>
                            <option value="pending">Pending </option>
                            <option value="delivered">Delivered</option>
                            <option value="cancelled">Cancelled</option>
                        </select>
                    </div>
                    <div class="filters">
                        <p style="font-size: 12px;">Date :</p>
                        <select id="date-sort" name="dateSort" class="filter-dropdown">
                            <option selected value="none">Default</option>
                            <option value="latest">Latest</option>
                            <option value="oldest">Oldest</option>
                        </select>
                    </div>
                </section>


                <div class="recent-orders">
                    <table class="order-table">
                        <thead>
                            <tr>
                                <th>Order</th>
                                <th>Date</th>
                                <th>Customer</th>
                                <th>total</th>
                                <th>items</th>
                                <th>status</th>
                                <th>edit</th>
                                <th>view</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $order)
                                <tr>
                                    <td>{{ $order->id }}</td>
                                    <td>{{ $order->created_at }}</td>
                                    <td>{{ $order->customer->name ?? 'Unknown' }}</td>
                                    <td>₹{{ $order->total_amount }}</td>
                                    <td>
                                        @foreach ($order->orderItems as $item)
                                            {{ $item->product->name }} - {{ $item->product->brand }} -
                                            {{ $item->product->type }}
                                            ({{ $item->quantity }})
                                            <br>
                                        @endforeach
                                    </td>
                                    <td class="status" data-status="{{ $order->order_status }}">
                                        {{ $order->order_status }}</td>
                                    <td>
                                        @if ($order->order_status == 'placed' || $order->order_status == 'pending')
                                            <form action="{{ route('admin.orders.update', $order->id) }}" method="POST"
                                                style="display:inline;">
                                                @csrf
                                                @method('PUT')
                                                <button type="submit" class="edit"
                                                    style="border: none; background: none;">
                                                    <i class="fa-solid fa-circle-check"></i>
                                                </button>
                                            </form>
                                            <form action="{{ route('admin.orders.destroy', $order->id) }}" method="POST"
                                                style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="edit"
                                                    style="border: none; background: none;">
                                                    <i class="fa-solid fa-ban"></i>
                                                </button>
                                            </form>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.orders.show', $order->id) }}" class="view-btn">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach


                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.filter-dropdown').change(function() {
                let order_status = $('select[name="order_status"]').val();
                let dateSort = $('select[name="dateSort"]').val();

                $.ajax({
                    url: "{{ route('admin.orders.filter') }}",
                    type: "GET",
                    data: {
                        order_status: order_status,
                        dateSort: dateSort
                    },
                    success: function(response) {
                        const csrfToken = document.querySelector('meta[name="csrf-token"]')
                            .getAttribute('content');

                        let tableBody = $('.order-table tbody');
                        tableBody.empty();
                        // if (Array.isArray(response)) {
                        response.forEach(order => {

                            let row = `<tr>
                                    <td>${order.id}</td>
                                    <td>${order.created_at}</td>
                                    <td>${order.customer?.name ?? 'Unknown'}</td>
                                    <td>₹${order.total_amount}</td>
                                    <td>`;
                            // if (order && Array.isArray(order.order_items)) {
                            order.order_items.forEach(item => {
                                row +=
                                    `${item?.product?.name || ''} - ${item?.product?.brand || ''} - ${item?.product?.type || ''} (${item?.quantity || 0})<br>`;
                            });
                            // } else {
                            //     row += 'No items available<br>';
                            // }

                            row += `</td>
                                    <td class="status" data-status="${order.order_status}">
                                        ${order.order_status}
                                    </td>
                                    <td>`;

                            if (order.order_status === 'placed' || order
                                .order_status === 'pending') {
                                row +=
                                    `<form action="/admin/orders/${order.id}" method="POST" style="display:inline;">
                                            @method('PUT')
                                            <input type="hidden" name="_token" value="${csrfToken}">
                                            <input type="hidden" name="_method" value="PUT">
                                            <button type="submit" class="edit" style="border: none; background: none;">
                                                <i class="fa-solid fa-circle-check"></i>
                                            </button>
                                        </form>
                                        <form action="/admin/orders/${order.id}" method="POST" style="display:inline;">
                                            <input type="hidden" name="_token" value="${csrfToken}">
                                            @method('DELETE')
                                            <button type="submit" class="edit" style="border: none; background: none;">
                                                <i class="fa-solid fa-ban"></i>
                                            </button>
                                        </form>`
                            }

                            row += `</td>
                                                        <td>
                                                            <a href="orders/${order.id}" class="view-btn">
                                                                <i class="fa fa-eye"></i>
                                                            </a>
                                                        </td>
                                                    </tr>`;

                            tableBody.append(row);
                        });
                        // }
                    }
                });
            });
        });
    </script>
@endsection
