@extends('Admin.layout.main')
@section('shoeX')
    <link rel="stylesheet" href="{{ asset('css/products.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <title>Shoes</title>
    <div class="home-section">
        <div class="abody">
            <div class="back">
                <section class="table-head" style="display: flex; align-items: center; justify-content: space-between;">
                    <h5>All products</h5>

                    <!-- Search Bar -->
                    <div class="search-container">
                        <form action="{{ route('admin.products.search') }}" method="GET">
                            <input type="text" name="query" class="search-bar" placeholder="Search products..."
                                value="{{ request('query') }}">
                            <button type="submit"><i class="fa fa-search"></i></button>
                        </form>

                    </div>



                    <a href="{{ route('admin.products.create') }}">
                        <button class="add-btn"><i class="fa-solid fa-add" style="margin-right: 10px;"></i>Add
                            Product</button>
                    </a>
                </section>
                <section class="table-head" style="display: flex; align-items: center; justify-content: space-between;">
                    <!-- Filter Dropdowns -->
                    <div class="filters">
                        <p style="font-size: 12px;">Stock :</p>
                        <select id="stock-filter" name="stock" class="filter-dropdown">
                            <option selected value="All">All</option>
                            <option value="inStock">In stock</option>
                            <option value="OutOfStock">Out of Stock</option>
                        </select>
                    </div>
                    <div class="filters">
                        <p style="font-size: 12px;">Brand :</p>
                        <select id="brand-filter" name="brand" class="filter-dropdown">
                            <option value="All">All</option>
                            @foreach (getBrands() as $brand)
                                <option value="{{ $brand }}">{{ $brand }}</option>
                            @endforeach
                        </select>

                    </div>
                    <div class="filters">
                        <p style="font-size: 12px;">Price :</p>
                        <select id="price-sort" name="priceSort" class="filter-dropdown">
                            <option selected value="none">Default</option>
                            <option value="low_to_high">Low to High</option>
                            <option value="high_to_low">High to Low</option>
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
                                <th>Product_Id</th>
                                <th>Name</th>
                                <th>Brand</th>
                                <th>Type</th>
                                <th>MRP</th>
                                <th>Price</th>
                                <th>Stock</th>
                                <th>Image</th>
                                <th>Edit</th>
                                <th style="text-align: center;">Delete</th>
                            </tr>
                        </thead>
                        <tbody id="product-list">
                            @foreach ($products as $product)
                                <tr>
                                    <td>{{ $product->id }}</td>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->brand }}</td>
                                    <td>{{ $product->type }}</td>
                                    <td>{{ $product->mrp }}</td>
                                    <td>{{ $product->actual_price }}</td>
                                    <td>{{ $product->stock }}</td>
                                    <td>
                                        @php $images = json_decode($product->image_paths, true); @endphp
                                        @if (!empty($images) && is_array($images))
                                            <img src="{{ asset('storage/' . $images[0]) }}" width="40" height="40"
                                                alt="{{ $product->brand }}">
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.products.edit', $product) }}" class="edit-btn">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                    </td>
                                    <td style="text-align: center;">
                                        {{-- <a href="{{ route('admin.products.delete', $product) }}"class="delete-link"
                                            style="color:#f25055;">
                                            <i class="fa-solid fa-trash"></i>
                                        </a> --}}

                                        <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST"
                                            style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <i type="submit" class="fa-solid fa-ban btn-delete"
                                                onclick="this.closest('form').submit();"></i>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            let deleteLinks = document.querySelectorAll(".delete-link");
            deleteLinks.forEach(function(link) {
                link.addEventListener("click", function(event) {
                    event.preventDefault(); // Stop the default action
                    let confirmDelete = confirm("Are you sure you want to delete this product?");
                    if (confirmDelete) {
                        window.location.href = this.href; // Proceed with deletion
                    }
                });
            });
        });
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.filter-dropdown').change(function() {
                let brand = $('select[name="brand"]').val();
                let stock = $('select[name="stock"]').val();
                let priceSort = $('select[name="priceSort"]').val();
                let dateSort = $('select[name="dateSort"]').val();

                $.ajax({
                    url: "{{ route('admin.products.filter') }}",
                    type: "GET",
                    data: {
                        brand: brand,
                        stock: stock,
                        priceSort: priceSort,
                        dateSort: dateSort
                    },
                    success: function(response) {
                        let tableBody = $('.order-table tbody');
                        tableBody.empty();

                        response.forEach(product => {
                            let imagePath = "";

                            // Ensure image_paths is properly parsed and is an array
                            if (product.image_paths) {
                                let images = JSON.parse(product.image_paths);
                                if (Array.isArray(images) && images.length > 0) {
                                    imagePath =
                                        `/storage/${images[0]}`; // Get first image
                                }
                            }

                            let row = `<tr>
                        <td>${product.id}</td>
                        <td>${product.brand}</td>
                        <td>${product.type}</td>
                        <td>${product.mrp}</td>
                        <td>${product.actual_price}</td>
                        <td>${product.stock}</td>
                        <td><img src="${imagePath}" width="40" height="40"></td>
                        <td style="text-align: center;"><a href="/admin/products/${product.id}/edit" class="edit-btn"><i class="fa fa-edit"></i></a></td>
                        <td><a href="admin/products/delete/${product.id}" class="delete-link"><i class="fa-solid fa-trash" style="color: #f25055;"></i></a></td>
                    </tr>`;

                            tableBody.append(row);
                        });
                    }
                });
            });
        });
    </script>
@endsection
