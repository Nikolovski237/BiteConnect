<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\RestaurantController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Authentication Routes
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

// Public Routes
Route::get('/', function () {
    return view('Home');
});

Route::resource('/restaurants', RestaurantController::class);
Route::get('/restaurants/food-type/{foodType}', [RestaurantController::class, 'showByFoodType'])->name('restaurants.showByFoodType');
Route::get('/restaurants/{restaurant}/menu', [MenuController::class, 'show'])->name('restaurants.menu');
Route::get('/menus/{restaurant}', [MenuController::class, 'show'])->name('menus.show');


// Cart Routes
Route::get('/cart', [CartController::class, 'show'])->name('cart.show');
Route::post('/cart/add/{menuItemId}', [CartController::class, 'addToCart'])->name('cart.addToCart');
Route::delete('/cart/{menuItemId}', [CartController::class, 'remove'])->name('cart.remove');

// Order Routes
Route::get('/orders/create', [OrderController::class, 'create'])->name('order.create');
Route::post('/orders', [OrderController::class, 'store'])->name('order.store');
Route::get('/orders/thankyou', [OrderController::class, 'thankyou'])->name('order.thankyou');

// Authenticated Routes
Route::middleware(['auth', 'role:master_admin'])->group(function () {
    Route::resource('/dashboard', RestaurantController::class);
    Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');

    Route::get('/restaurants/{restaurant}/edit', [AdminController::class, 'edit'])->name('restaurants.edit');
    Route::get('/restaurants/create', [AdminController::class, 'create'])->name('restaurants.create');
    Route::delete('/restaurants/{restaurant}', [AdminController::class, 'destroy'])->name('restaurants.destroy');
    
    Route::resource('/users', AdminController::class)->except(['create', 'store', 'destroy']);
    Route::get('/users', [AdminController::class, 'viewUsers'])->name('users');
    Route::get('/users/{user}/edit', [AdminController::class, 'edit'])->name('users.edit');
    Route::post('/users/{user}', 'AdminController@update')->name('users.update');
    
    Route::delete('/menus/{menu}', [MenuController::class, 'destroy'])->name('menus.destroy');
    Route::put('/menus/{menu}', [MenuController::class, 'update'])->name('menus.update');
    Route::get('/menus/{menu}/edit', [MenuController::class, 'edit'])->name('menus.edit');
    Route::post('/menus', [MenuController::class, 'store'])->name('menus.store');
    Route::get('/restaurants/{restaurant}/createmenu', [MenuController::class, 'create'])->name('restaurants.createmenu');
});

