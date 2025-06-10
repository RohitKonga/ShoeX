@extends('Admin.layout.main')
@section('shoeX')
    <title>Edit Shoe</title>
    <link rel="stylesheet"
        href="https://unpkg.com/@fortawesome/fontawesome-free@6.4.2/css/all.css">
    <link rel="stylesheet" href="{{ asset('css/addProduct.css') }}">

    <div class="container">
        <form action="{{ route('admin.products.update', $product->id) }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="header">
                <div style="display:flex; gap:10px;align-items:center;">
                    <a href="{{ route('admin.products.index') }}"><i class="fa-solid fa-arrow-left"></i></a>
                    <h4>Edit Product</h4>
                </div>
                <div class="buttons">
                    <button type="submit" class="add-btn">Save Changes</button>
                </div>
            </div>

            <div class="form1-container">
                <div class="general-info">
                    <h5>General Information</h5>

                    <label>Shoe Id</label><br>
                    <p>{{ $product->id }}</p><br>

                    <label>Shoe Brand</label><br>
                    <p>{{ $product->brand }}</p><br>

                    <label>Shoe Type</label><br>
                    <p>{{ $product->type }}</p><br>

                    <label>Shoe Description</label><br>
                    <textarea name="description">{{ $product->description }}</textarea>

                    <div class="section">
                        <div class="box">
                            <label>Shoe for</label>
                            <p>{{ $product->shoe_for }}</p><br>
                        </div>
                    </div>
                </div>

                <div class="upload-img">
        <h5>Edit Images</h5>
        
    {{-- Display existing images --}}
        <p style="font-size: 14px;">click image to Update</p>
        @php
            $images = json_decode($product->image_paths, true) ?? []; // Decode JSON image paths
        @endphp
        <img class="main-img-box" id="mainImage" src="{{ asset('storage/' . $images[0]) }}" alt="Main Product Image" onclick="document.getElementById('fileInput').click();">
       

    {{-- Display thumbnails of all images --}}
    <div class="thumbs">
        @foreach ($images as $image)
            <img src="{{ asset('storage/' . $image) }}" onclick="changeMainImage(this)" alt="Thumbnail" width="60px"> @endforeach
    </div>

    {{-- Edit Images Button --}}
    

    {{-- File input for new images --}}
    <input type="file"
        name="images[]" id="fileInput" accept="image/*" multiple style="display: none;">
    </div>

    </div>

    <div class="form2-container">
        <div class="pricing-stock">
            <h5>Pricing And Stock</h5>

            <div class="price-stock">
                <div class="layout">
                    <label>MRP</label><br>
                    <input name="mrp" type="text" value="{{ $product->mrp }}">
                    @error('mrp')
                        <label for="">{{ $message }}</label>
                    @enderror
                </div>
                <div class="layout">
                    <label>Stock</label><br>
                    <input name="stock" type="text" value="{{ $product->stock }}">
                    @error('stock')
                        <label for="">{{ $message }}</label>
                    @enderror
                </div>
            </div>

            <div class="stock-discount">
                <div class="layout">
                    <label>Actual Price</label><br>
                    <input name="actual_price" type="text" value="{{ $product->actual_price }}">
                    @error('actual_price')
                        <label for="">{{ $message }}</label>
                    @enderror
                </div>
            </div>
        </div>
    </div>
    </form>
    
    </div>
    </div>

    <script>
        const fileInput = document.getElementById('fileInput');
        const mainImage = document.getElementById('mainImage');
        const thumbsContainer = document.querySelector('.thumbs');
        const thumbBox = document.querySelector('.thumb-box');

        function changeMainImage(img) {
            document.getElementById('mainImage').src = img.src;
        }
        fileInput.addEventListener('change', function() {
            if (this.files.length > 0) {
                thumbsContainer.innerHTML = ""; // Clear previous thumbnails
                const files = Array.from(this.files);

                files.forEach((file, index) => {
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
                        };

                        if (index === 0) {
                            mainImage.src = e.target.result;
                            mainImage.style.display = "block";
                            img.classList.add('selected');
                        }

                        thumbsContainer.appendChild(img);
                    };
                    reader.readAsDataURL(file);
                });
            }
        });
    </script>
@endsection
