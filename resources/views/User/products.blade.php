@extends('user.layouts.main')
@section('shoeX')
    <link rel="stylesheet" href="{{ asset('userscss/allproducts.css') }}" />
    <title>Products</title>
    <div class="scrollable-content">
        <div class="product-page">
            <div class="product-list">
                <div class="sort-section">
                    <label for="sort">Sort By:</label>
                    <select id="sort" class="dropDown-list">
                        <option value="recommended">Recommended</option>
                        <option value="newest">Newest</option>
                        <option value="priceLowHigh">Price (Low to High)</option>
                        <option value="priceHighLow">Price (High to Low)</option>
                        <option value="nameAZ">Name (A-Z)</option>
                        <option value="nameZA">Name (Z-A)</option>
                    </select>
                </div>
                <div class="product-grid">
                    @foreach ($products as $product)
                        <x-product-card :product="$product" />
                    @endforeach
                </div>
            </div>
        </div>


    </div>
@endsection
