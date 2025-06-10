<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('userscss/header.css') }}">
    <link rel="stylesheet" href="{{ asset('userscss/footer.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
</head>

<body>
    <header class="header">
        <h1><a href="{{ route('home') }}">ShoeX</a></h1>
        <nav class="nav-menu">
            <a href="{{ route('home') }}">New & Featured</a>
            <a href="{{ route('category.show', ['category' => 'Men']) }}">Men</a>
            <a href="{{ route('category.show', ['category' => 'Women']) }}">Women</a>
            <a href="{{ route('category.show', ['category' => 'Unisex']) }}">Unisex</a>
            <a href="{{ route('category.show', ['category' => 'Kids']) }}">Kids</a>
            <div class="dropdown">
                <p class="dropbtn">Brands </p>
                <div class="dropdown-content">
                    @foreach (getBrands() as $brand)
                        <a href="{{ route('brand.show', ['brand' => $brand]) }}">{{ $brand }}</a>
                    @endforeach
                </div>
            </div>
        </nav>

        <div class="search-container">
            <i class="fa-solid fa-magnifying-glass"></i>
            <form action="{{ route('search') }}">
                <input type="text" name="query" placeholder="Search" value="{{ $query ?? '' }}">
                <input type="submit" hidden>
            </form>
        </div>

        <div class="icon-container">
            <a href="{{ route('wishlist.index') }}" class="icon-btn"><i class="fa-solid fa-heart"></i></a>
            <a href="{{ route('cart.index') }}" class="icon-btn"><i class="fa-solid fa-bag-shopping"></i></a>
            @if (Auth::guard('customer')->check())
                <div class="profile-dropdown">
                    <i class="fa-solid fa-user"></i>
                    <div class="dropdown-menu">
                        <a href="{{ route('profile') }}">Profile</a>
                        <a href="{{ route('logout') }}">Logout</a>
                    </div>
                </div>
            @endif
        </div>
    </header>

</body>

</html>
