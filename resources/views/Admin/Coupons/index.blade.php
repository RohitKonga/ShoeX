@extends('Admin.layout.main')
@section('shoeX')
    <title>All Coupons</title>
    <link rel="stylesheet" href="{{ asset('css/allCustomers.css') }}">

    <div class="home-section">

        <div class="abody">

            <div class="back">
                <section class="table-head" style="display: flex; align-items: center; justify-content: space-between;">
                    <h5>All Coupons</h5>



                    <a href="{{ route('admin.coupons.create') }}">
                        <button class="add-btn"><i class="fa-solid fa-add" style="margin-right: 10px;"></i>Add Coupon</button>
                    </a>
                </section>

                <div class="recent-orders">
                    <table class="order-table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Code</th>
                                <th>Discount</th>
                                <th>Start Date</th>
                                <th>End Date</th>
                                <th>Added Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($coupons as $coupon)
                                <tr>
                                    <td>{{ $coupon->id }}</td>
                                    <td>{{ $coupon->codename }}</td>
                                    <td>{{ $coupon->code }}</td>
                                    <td>{{ $coupon->discount }}</td>
                                    <td>{{ $coupon->start_date }}</td>
                                    <td>{{ $coupon->end_date }}</td>
                                    <td>{{ $coupon->created_at }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    </body>
@endsection
