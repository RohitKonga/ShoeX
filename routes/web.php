<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminRoutingController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\RoutingController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WishlistController;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return Redirect::route("home");
});


Route::get("/login", [AuthController::class, "login"])->name("login");
Route::post("/login", [AuthController::class, "userlogin"])->name("userlogin");
Route::get("/logout", [AuthController::class, "logout"])->name("logout");
Route::get("/register", [AuthController::class, "register"])->name("register");

Route::get("/home", [RoutingController::class, "home"])->name("home");
Route::get("/category/{category}", [RoutingController::class, "getCategoryProducts"])->name("category.show");
Route::get('products', [ProductsController::class, 'searchProducts'])->name('search');
Route::resource('products', ProductsController::class)->only('show');
Route::resource("customers", CustomerController::class)->only('store');

Route::get('/brand/{brand}', [RoutingController::class, 'getBrandProducts'])
    ->whereIn('brand', getBrands())
    ->name('brand.show');


Route::group([
    'middleware' => ['auth:customer']
], function () {
    Route::resource('wishlist', WishlistController::class);
    Route::resource('cart', CartController::class);
    Route::get('profile', [CustomerController::class, 'profile'])->name('profile');
    // Route::put('profile', [CustomerController::class, 'update'])->name('customers.update');
    Route::match(['get', 'post'], 'checkout', [RoutingController::class, 'checkout'])->name('checkout');
    Route::resource("customers", CustomerController::class)->only('update');
    Route::resource("orders", OrderController::class)->only('store');
    Route::resource("reviews", ReviewController::class)->only('store');
});

// Admin Routings
Route::group([
    'prefix' => 'admin',
    'as' => 'admin.',
], function () {
    Route::get("/login", [AuthController::class, "adminLogin"])->name("login");
    Route::post("/login", [AuthController::class, "adminValidateAndLogin"])->name("adminLogin");
});

Route::group([
    'prefix' => 'admin',
    'as' => 'admin.',
    'middleware' => ['auth:admin', 'role:manager,admin']
], function () {
    Route::get('/', [AdminRoutingController::class, 'dashboard']); // Name: admin.dashboard
    Route::get("productSearch", [ProductsController::class, "search"])->name("products.search");
    Route::get("productFilter", [ProductsController::class, "product_filter"])->name("products.filter");
    Route::resource("products", ProductsController::class)->except('show');
    // Route::resource("users", UserController::class);
    Route::resource("orders", OrderController::class)->except('store');
    Route::resource("customers", CustomerController::class)->except(['update','store']);
    Route::resource("banners", BannerController::class);
    Route::resource("reviews", ReviewController::class)->except('store');
    Route::resource("coupons", CouponController::class);
    Route::get("customersSearch", [CustomerController::class, 'search'])->name('customers.search');
    Route::get("customersFIlter", [CustomerController::class, 'filter'])->name('customers.filter');
    Route::get("ordersSearch", [OrderController::class, 'search'])->name('orders.search');
    Route::get("ordersFilter", [OrderController::class, 'filter'])->name('orders.filter');
    Route::get('/dashboard', [AdminRoutingController::class, 'dashboard'])->name('dashboard'); // Name: admin.dashboard
});

Route::group([
    'prefix' => 'admin',
    'as' => 'admin.',
    'middleware' => ['auth:admin', 'role:manager']
], function () {
    Route::resource("admins", AdminController::class);
});