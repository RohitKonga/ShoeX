@extends('Admin.layout.main')
@section('shoeX')
    <title>Add New Product</title>
    <link rel="stylesheet"
        href="https://unpkg.com/@fortawesome/fontawesome-free@6.4.2/css/all.css">
    <link rel="stylesheet" href="{{ asset('css/addProduct.css') }}">

    <div class="container">
<form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="header">
        <div style="display:flex; gap:10px;align-items:center;">
            <a href="{{ url('/admin/dashboard') }}"><i class="fa-solid fa-arrow-left"></i></a>
            <h4>Add New Product</h4>
        </div>

        <div class="buttons">
            <button type="submit" class="add-btn"><i class="fa-solid fa-check" style="margin-right: 10px;"></i>Add Product</button>
        </div>
    </div>

    <div class="form1-container">
        <div class="general-info">
            <h5>General Information</h5>

                <label>Name</label><br>
                <input name="name" type="text" placeholder="Name"><br>
                @error('name')
                    <label for="name">{{ $message }}</label><br>
                @enderror

            <label>Select Brand</label><br>
            <select name="brand" class="filter-dropdown">
                @foreach (getBrands() as $brand)
                    <option value="{{ $brand }}">{{ $brand }}</option> @endforeach
            </select><br>
            @error('brand')
<label for="brand">
    {{ $message }}</label><br>
@enderror

<label>Select Shoe Type</label><br>
<select name="type" class="filter-dropdown">
    @foreach (getProductType() as $type)
        <option value="{{ $type }}">{{ $type }}</option>
    @endforeach
</select><br>
@error('type')
    <label for="type">{{ $message }}</label><br>
@enderror

<label>Shoe Description</label><br>
<textarea name="description" id="imageDescription" placeholder="Enter product description"></textarea>
@error('description')
    <label for="description">{{ $message }}</label><br>
@enderror

<div class="section">
    <div class="box">
        <label>Shoe for</label>
        <div class="radio-group">
            @foreach (getShoeFor() as $for)
                <label><input type="radio" name="shoe_for" value="{{ $for }}">{{ $for }}</label>
            @endforeach
        </div>
        @error('shoe_for')
            <label for="shoe_for">{{ $message }}</label><br>
        @enderror
    </div>
</div>
</div>

<div class="upload-img">
    <h5>Upload Img</h5>
    <div class="main-img-box">
        <div class="thumb-box" onclick="document.getElementById('fileInput').click();">+</div>
        <input type="file" name="image_paths[]" id="fileInput" accept="image/*" multiple>
        <img id="mainImage" src="" alt="Main Product Image">
    </div>
    <div class="thumbs"></div>
        @error('image_paths')
            <label for="image_paths">{{ $message }}</label><br>
        @enderror
</div>
</div>

<div class="form2-container">
    <div class="pricing-stock">
        <h5>Pricing And Stock</h5>

        <div class="price-stock">
            

            <div class="layout">
                <label>Stock</label><br>
                <input name="stock" type="number" placeholder="Stock count">
                @error('stock')
                    <label for="stock">{{ $message }}</label><br>
                @enderror
            </div>
        </div>

        <div class="stock-discount">
            <div class="layout">
                <label>MRP</label><br>
                <input name="mrp" type="number" placeholder="0000">
                @error('mrp')
                    <label for="mrp">{{ $message }}</label><br>
                @enderror
            </div>

            <div class="layout">
                <label>Actual price</label><br>
                <input name="actual_price" type="number" placeholder="0000">
                @error('actual_price')
                    <label for="actual_price">{{ $message }}</label><br>
                @enderror
            </div>
        </div>
    </div>
</div>
</form>
<script>
    const fileInput = document.getElementById('fileInput');
    const mainImage = document.getElementById('mainImage');
    const thumbsContainer = document.querySelector('.thumbs');
    const thumbBox = document.querySelector('.thumb-box');
    let imageFiles = []; // Store files in order

    fileInput.addEventListener('change', function() {
        if (this.files.length > 0) {
            thumbsContainer.innerHTML = ""; // Clear previous thumbnails
            imageFiles = Array.from(this.files); // Store selected files

            imageFiles.forEach((file, index) => {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const img = document.createElement('img');
                    img.src = e.target.result;
                    img.onclick = function() {
                        mainImage.src = this.src;
                        document.querySelectorAll('.thumbs img').forEach(img => img.classList
                            .remove('selected'));
                        img.classList.add('selected');
                        mainImage.style.display = "block";
                        thumbBox.style.display = "none"; // Hide plus sign

                        // Move selected image to index 0
                        const selectedFile = imageFiles[index];
                        imageFiles.splice(index, 1); // Remove from current position
                        imageFiles.unshift(selectedFile); // Add to the front
                    };

                    if (index === 0) {
                        mainImage.src = e.target.result;
                        mainImage.style.display = "block";
                        thumbBox.style.display = "none";
                        img.classList.add('selected');
                    }

                    thumbsContainer.appendChild(img);
                };
                reader.readAsDataURL(file);
            });
        }
    });

    // Before submitting, reorder files in FormData
    document.querySelector("form").addEventListener("submit", function(e) {
        const newFileList = new DataTransfer();
        imageFiles.forEach(file => newFileList.items.add(file));
        fileInput.files = newFileList.files;
    });
</script>
</div>
@endsection
