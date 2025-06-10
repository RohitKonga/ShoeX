@extends('admin.layout.main')
@section('shoeX')
    <title>Banners</title>
    <link rel="stylesheet" href="{{ asset('css/allCustomers.css') }}">
    <div class="home-section">

        <div class="abody">

            <div class="back">
                <section class="table-head" style="display: flex; align-items: center; justify-content: space-between;">
                    <h5>Reviews</h5>
                </section>
            </div>
            <div class="recent-orders">
                <div class="recent-orders">
                    <table class="order-table">
                        <thead>
                            <tr>
                                <th>Date Time</th>
                                <th>Product</th>
                                <th>Customer</th>
                                <th>Rating</th>
                                <th>Review Text</th>
                                <th>Display</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($reviews as $review)
                                <tr>
                                    <td>{{ $review->created_at }}</td>
                                    <td>{{ $review->product->name }}</td>
                                    <td>{{ $review->customer->name }}</td>
                                    <td>{{ $review->rating }}</td>
                                    <td>{{ $review->review_text }}</td>
                                    <td>{{ $review->display }}</td>
                                    <td>
                                        <form action="{{ route('admin.reviews.update', $review->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <i class="fa {{ $review->display == 'hide' ? ' fa-eye ' : ' fa-eye-slash ' }}"
                                                onclick="this.closest('form').submit()"></i>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            {{-- @foreach ($banners as $banner)
                                <tr>
                                    <td><img src="{{ asset('storage/banners/' . $banner->image) }}"
                                            alt="{{ $banner->page_name }}" width="200px" style="border-radius: 10px">
                                    </td>
                                    <td>{{ $banner->page_name }}</td>
                                    <td>
                                        <form action="{{ route('admin.banners.update', $banner->id) }}"
                                            enctype="multipart/form-data" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <input type="file" accept="image/*" name="image" style="display: none;"
                                                class="updateBannerImage" />
                                            <i class="fa fa-edit edit-btn"></i>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach --}}
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('.edit-btn').forEach(function(editBtn) {
                editBtn.addEventListener('click', function() {
                    const form = this.closest('form');
                    const fileInput = form.querySelector('.updateBannerImage');
                    fileInput.click();
                });
            });

            document.querySelectorAll('.updateBannerImage').forEach(function(fileInput) {
                fileInput.addEventListener('change', function() {
                    if (this.files.length > 0) {
                        this.closest('form').submit();
                    }
                });
            });
        });
    </script>
@endsection
