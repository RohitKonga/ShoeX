@extends('Admin.layout.main')
@section('shoeX')
    <title>Edit Shoe</title>
    <link rel="stylesheet" href="https://unpkg.com/@fortawesome/fontawesome-free@6.4.2/css/all.css">
    <link rel="stylesheet" href="{{ asset('css/addProduct.css') }}">

    <div class="container">
        <form action="{{ route('admin.admins.update', $admin->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="header">
                <div style="display:flex; gap:10px;align-items:center;">
                    <a href="{{ route('admin.admins.index') }}"><i class="fa-solid fa-arrow-left"></i></a>
                    <h4>Edit Admin</h4>
                </div>
                <div class="buttons">
                    <button type="submit" class="add-btn">Save Changes</button>
                </div>
            </div>
    </div>
    <div class="form2-container">
        <div class="pricing-stock">
            <h5>Edit Admin</h5>

            <div class="price-stock">
                <div class="layout">
                    <label>Name</label><br>
                    <input name="name" type="text" placeholder="Name" value="{{ $admin->name }}">
                    @error('name')
                        <br><label for="name">{{ $message }}</label><br>
                    @enderror
                </div>

                <div class="layout">
                    <label>Email</label><br>
                    <input name="email" type="text" placeholder="Email" value="{{ $admin->email }}">
                    @error('email')
                        <br><label for="email">{{ $message }}</label><br>
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
