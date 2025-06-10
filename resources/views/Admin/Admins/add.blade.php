@extends('Admin.layout.main')
@section('shoeX')
    <title>Add Admin</title>
    <link rel="stylesheet" href="https://unpkg.com/@fortawesome/fontawesome-free@6.4.2/css/all.css">
    <link rel="stylesheet" href="{{ asset('css/addProduct.css') }}">

    <div class="container">
        <form action="{{ route('admin.admins.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="header">
                <div style="display:flex; gap:10px;align-items:center;">
                    <a href="{{ url('/admin/dashboard') }}"><i class="fa-solid fa-arrow-left"></i></a>
                    <h4>Add Admin</h4>
                </div>

                <div class="buttons">
                    <button type="submit" class="add-btn"><i class="fa-solid fa-check" style="margin-right: 10px;"></i>Add
                        Admin</button>
                </div>
            </div>


            <div class="form2-container">
                <div class="pricing-stock">
                    <h5>Add Admin</h5>

                    <div class="price-stock">
                        <div class="layout">
                            <label>Name</label><br>
                            <input name="name" type="text" placeholder="Name">
                            @error('name')
                                <br><label for="name">{{ $message }}</label><br>
                            @enderror
                        </div>

                        <div class="layout">
                            <label>Email</label><br>
                            <input name="email" type="text" placeholder="Email">
                            @error('email')
                                <br><label for="email">{{ $message }}</label><br>
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
