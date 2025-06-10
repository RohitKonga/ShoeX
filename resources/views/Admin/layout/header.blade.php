<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="x-icon" href="logo.png">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet"
        href="https://unpkg.com/@fortawesome/fontawesome-free@6.4.2/css/all.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="{{ asset('css/navbar.css') }}">
</head>

<body>
    <div class="sidebar close">
        <span class="logo-name">ShoeX</span>
        <div class="nav-list">
            <ul>
                <li>
                    <div class="icon-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                    <a href="{{ route('admin.dashboard') }}">
                        <i class='bx bxs-dashboard'></i>
                        <span class="link-name">Dashboard</span>
                    </a>
                    </div>
                </li>
                <li>
                    <div class="icon-link {{ request()->routeIs('admin.products.*') ? 'active' : '' }}">
                        <a href="{{ route('admin.products.index') }}">
                            <i class='bx bxs-food-menu'></i>
                            <span class="link-name">All Shoes</span>
                        </a>
                    </div>
                </li>
                <li>
                    <div class="icon-link {{ request()->routeIs('admin.customers.*') ? 'active' : '' }}">
                        <a href="{{ route('admin.customers.index') }}">
                            <i class='bx bxs-user'></i>
                            <span class="link-name">Customers</span>
                        </a>
                    </div>
                </li>
                <li>
                    <div class="icon-link {{ request()->routeIs('admin.orders.*') ? 'active' : '' }}">
                        <a href="{{ route('admin.orders.index') }}">
                            <i class='bx bxs-dish'></i>
                            <span class="link-name">Orders</span>
                        </a>
                    </div>
                </li>
                <li>
                    <div class="icon-link {{ request()->routeIs('admin.banners.*') ? 'active' : '' }}">
                        <a href="{{ route('admin.banners.index') }}">
                            <i class='bx bxs-photo-album'></i>
                            <span class="link-name">Banners</span>
                        </a>
                    </div>
                </li>
                <li>
                    <div class="icon-link {{ request()->routeIs('admin.coupons.*') ? 'active' : '' }}">
                        <a href="{{ route('admin.coupons.index') }}">
                            <i class='bx bxs-discount'></i>
                            <span class="link-name">Coupons</span>
                        </a>
                    </div>
                </li>
                <li>
                    <div class="icon-link {{ request()->routeIs('admin.reviews.*') ? 'active' : '' }}">
                        <a href="{{ route('admin.reviews.index') }}">
                            <i class='bx bxs-user-account'></i>
                            <span class="link-name">User Reviews</span>
                        </a>
                    </div>
                </li>
                @if (Auth::guard('admin')->user()->post == 'manager')
                <li>
                    <div class="icon-link {{ request()->routeIs('admin.admins.*') ? 'active' : '' }}">
                        <a href="{{ route('admin.admins.index') }}">
                            <i class='bx bxs-user-badge'></i>
                            <span class="link-name">Admins</span>
                        </a>
                    </div>
                </li> @endif
                <li>
                    <div class="icon-link">
    <a href="{{ route('logout') }}">
        <i class='bx bx-log-out'></i>
        <span class="link-name">Log Out</span>
    </a>
    </div>
    </li>
    </ul>
    </div>
    </div>
