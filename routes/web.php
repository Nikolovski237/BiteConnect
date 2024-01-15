<?php

use App\Http\Controllers\MenuController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\RestaurantController;
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
Route::get('/menus/{restaurant}', [MenuController::class, 'showMenu'])->name('menus.show');


// Cart Routes
Route::get('/cart', [CartController::class, 'show'])->name('cart.show');
Route::delete('/cart/{menuItemId}', [CartController::class, 'remove'])->name('cart.remove');
Route::post('/cart/add/{id}', [CartController::class, 'addToCart'])->name('cart.addToCart');

// Order Routes
// Route::get('/orders/create', [OrderController::class, 'create'])->name('order.create');
// Route::post('/orders', [OrderController::class, 'store'])->name('order.store');
// Route::get('/orders/thankyou', [OrderController::class, 'thankyou'])->name('order.thankyou');

Route::middleware(['auth'])->group(function () {
    Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout');
    Route::post('/checkout', [CheckoutController::class, 'store'])->name('checkout.store');
});

// Authenticated Routes
Route::middleware(['auth', 'role:master_admin'])->group(function () {
    Route::resource('/dashboard', RestaurantController::class);
    
    //RESTAURARNTS
    Route::get('/dashboard', [AdminController::class, 'viewRestaurants'])->name('restaurants.restaurants');
    Route::get('/restaurants/{restaurant}/edit', [AdminController::class, 'edit'])->name('restaurants.edit');
    Route::get('/restaurants/create', [AdminController::class, 'create'])->name('restaurants.create');
    Route::delete('/restaurants/{restaurant}', [AdminController::class, 'destroy'])->name('restaurants.destroy');
    Route::post('/restaurants', [AdminController::class, 'store'])->name('restaurants.store');
    Route::put('/restaurants/{restaurant}', [AdminController::class, 'updateRestaurants'])->name('restaurants.update');
    
    //USERS
    Route::resource('/users', AdminController::class)->except(['create', 'store', 'destroy']);
    Route::get('/users', [AdminController::class, 'viewUsers'])->name('users');
    Route::get('/users/{user}/edit', [AdminController::class, 'editUser'])->name('users.edit');
    Route::get('/users/{user}', [AdminController::class, 'showUsers'])->name('users.show');
    Route::put('/users/{user}', [AdminController::class, 'updateUsers'])->name('users.update');
    Route::delete('/users/{user}', [AdminController::class, 'deleteUser'])->name('users.destroy');
    
    //MENU
    
    Route::get('/menus/{restaurant}/index', [AdminController::class, 'showMenu'])->name('menus.index');
    Route::delete('/menus/{menu}', [AdminController::class, 'destroyMenu'])->name('menus.destroy');
    Route::put('/menus/{menu}', [AdminController::class, 'updateMenu'])->name('menus.update');
    Route::get('/menus/{menu}/edit', [AdminController::class, 'editMenu'])->name('menus.edit');
    Route::post('/menus', [AdminController::class, 'storeMenu'])->name('menus.store');
    Route::get('/restaurants/{restaurant}/createmenu', [AdminController::class, 'createMenu'])->name('menus.create');

    //ORDERS
    Route::get('/orders', [AdminController::class, 'viewOrders'])->name('orders.index');
});

