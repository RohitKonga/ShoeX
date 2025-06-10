@extends('admin.layout.main')
@section('shoeX')
    <title>Banners</title>
    <link rel="stylesheet" href="{{ asset('css/allCustomers.css') }}">
    <div class="home-section">

        <div class="abody">

            <div class="back">
                <section class="table-head" style="display: flex; align-items: center; justify-content: space-between;">
                    <h5>Banners</h5>
                </section>
            </div>
            <div class="recent-orders">
                <div class="recent-orders">
                    <table class="order-table">
                        <thead>
                            <tr>
                                <th>Image</th>
                                <th>Page Name</th>
                                <th>Edit</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($banners as $banner)
                                <tr>
                                    <td>
                                        <div class="item">
                                            <img src="{{ asset('storage/banners/' . $banner->image) }}"
                                                alt="{{ $banner->page_name }}" width="200"
                                                onclick="openModal({{ $banner->id }})" style="border-radius: 10px">
                                            <div class="imageModal" id='{{ $banner->id }}'>
                                                <button class="closeBtn"
                                                    onclick="closeModal({{ $banner->id }})">X</button>
                                                <img class="modalImage"
                                                    src="{{ asset('storage/banners/' . $banner->image) }}"
                                                    alt="{{ $banner->page_name }}" style="border-radius: 20px"
                                                    width="1000px">
                                            </div>
                                        </div>
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
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


    <script>
        function openModal(id) {
            document.getElementById(id).style.display = "flex";
        }

        function closeModal(id) {
            document.getElementById(id).style.display = "none";
        }
    </script>

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

    {{-- <script>
        function uploadBannerImage(event, bannerId) {
            const file = event.target.files[0];
            if (!file) return;

            const formData = new FormData();
            formData.append('image', file);
            formData.append('_method', 'PUT'); // Override method for Laravel
            const csrfToken = '{{ csrf_token() }}';
            formData.append('_token', csrfToken);

            fetch(`/admin/banners/${bannerId}`, {
                    method: 'POST', // send as POST, override as PUT via _method
                    headers: {
                        'X-CSRF-TOKEN': csrfToken
                    },
                    body: formData
                })
                .then(response => {
                    if (!response.ok) throw new Error('Upload failed');
                    return response.json();
                })
                .then(data => {
                    alert('Image updated successfully!');
                    location.reload(); // Or update the image on the page dynamically
                })
                .catch(error => {
                    console.error(error);
                    alert('Image upload failed.');
                });
        }
    </script> --}}
@endsection
