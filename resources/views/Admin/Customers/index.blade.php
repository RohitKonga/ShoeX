@extends('Admin.layout.main')
@section('shoeX')
    <title>All Customers</title>
    <link rel="stylesheet" href="{{ asset('css/allCustomers.css') }}">

    <div class="home-section">

        <div class="abody">

            <div class="back">
                <section class="table-head" style="display: flex; align-items: center; justify-content: space-between;">
                    <h5>All Customers</h5>

                    <!-- Search Bar -->
                    <div class="search-container">
                        <form action="{{ route('admin.customers.search') }}" method="GET">
                            <input type="text" name="query" class="search-bar" placeholder="Search products..."
                                value="{{ request('query') }}">
                            <button type="submit"><i class="fa fa-search"></i></button>
                        </form>

                    </div>
                    <!-- Filter Dropdowns -->

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
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>City</th>
                                <th>State</th>
                                <th>Registered at</th>
                                <th>View</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($customers as $customer)
                                <tr>
                                    <td>{{ $customer->id }}</td>
                                    <td>{{ $customer->name }}</td>
                                    <td>{{ $customer->email }}</td>
                                    <td>{{ $customer->phone }}</td>
                                    <td>{{ $customer->city }}</td>
                                    <td>{{ $customer->state }}</td>
                                    <td>{{ $customer->created_at }}</td>
                                    <td>
                                        <a href="{{ route('admin.customers.show', $customer->id) }}" class="edit-btn">
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

    </body>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        $(document).ready(function() {
            $('.filter-dropdown').change(function() {
                let dateSort = $('select[name="dateSort"]').val();

                $.ajax({
                    url: "{{ route('admin.customers.filter') }}",
                    type: "GET",
                    data: {
                        dateSort: dateSort
                    },
                    success: function(response) {
                        let tableBody = $('.order-table tbody');
                        tableBody.empty();

                        response.forEach(customer => {
                            console.log(customer);
                            let row = `<tr>
                            <td>${customer.id}</td>
                            <td>${customer.name}</td>
                            <td>${customer.email}</td>
                            <td>${customer.phone}</td>
                            <td>${customer.city}</td>
                            <td>${customer.state}</td>
                            <td>${customer.created_at}</td>
                            <td><a href="customers/${customer.id}" class="edit-btn"><i class="fa fa-eye"></i></a></td>
                        </tr>`;

                            tableBody.append(row);
                        });
                    }
                });
            });
        });
    </script>
@endsection
