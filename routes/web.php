<?php

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;

use App\Http\Controllers\AdminMenuController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\AdminRestaurantController;

use App\Http\Controllers\CartController;
use App\Http\Controllers\RestaurantController;
use App\Http\Controllers\CheckoutController;

use Illuminate\Support\Facades\Route;


// Account Routes
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

// Public Routes
Route::get('/', function () {return view('home');});

Route::resource('/restaurants', RestaurantController::class);
Route::get('/restaurants/food-type/{foodType}', [RestaurantController::class, 'showByFoodType'])->name('restaurants.showByFoodType');
Route::get('/restaurants/{restaurant}/menu', [RestaurantController::class, 'showMenu'])->name('restaurants.menu');
Route::get('/menus/{restaurant}', [RestaurantController::class, 'showMenu'])->name('menus.show');
Route::get('/menus/search', [RestaurantController::class, 'searchMenuItems'])->name('menus.search');
Route::get('/all-menu-items', [RestaurantController::class, 'showAllMenuItems'])->name('all-menu-items');
Route::get('/menu/{type}', [RestaurantController::class, 'showMenuByType'])->name('menu.by.type');

// Cart Routes
Route::get('/cart', [CartController::class, 'show'])->name('cart.show');
Route::delete('/cart/{menuItemId}', [CartController::class, 'remove'])->name('cart.remove');
Route::post('/cart/add/{id}', [CartController::class, 'addToCart'])->name('cart.addToCart');


Route::middleware(['auth'])->group(function () {
    Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout');
    Route::post('/checkout', [CheckoutController::class, 'store'])->name('checkout.store');
});

// Authenticated Routes
Route::middleware(['auth', 'role:master_admin'])->group(function () {
    Route::resource('/dashboard', RestaurantController::class);
    
    //RESTAURARNTS
    Route::get('/dashboard', [AdminRestaurantController::class, 'viewRestaurants'])->name('restaurants.restaurants');
    Route::get('/restaurants/create', [AdminRestaurantController::class, 'create'])->name('restaurants.create');
    Route::post('/restaurants', [AdminRestaurantController::class, 'store'])->name('restaurants.store');
    Route::get('/restaurants/{restaurant}/edit', [AdminRestaurantController::class, 'edit'])->name('restaurants.edit');
    Route::put('/restaurants/{restaurant}', [AdminRestaurantController::class, 'updateRestaurants'])->name('restaurants.update');
    Route::delete('/restaurants/{restaurant}', [AdminRestaurantController::class, 'destroy'])->name('restaurants.destroy');
    
    //USERS
    Route::get('/users/index', [AdminUserController::class, 'viewUsers'])->name('users.viewUsers');
    Route::get('/users/{user}', [AdminUserController::class, 'show'])->name('users.showUsers');
    Route::get('/users/{user}/edit', [AdminUserController::class, 'edit'])->name('users.edit');
    Route::put('/users/{user}', [AdminUserController::class, 'update'])->name('users.update');
    Route::resource('/users', AdminUserController::class)->except(['create', 'store', 'destroy']);
    
    //MENU
    Route::get('/menus/{restaurant}/index', [AdminMenuController::class, 'showMenu'])->name('menus.index');
    Route::get('/restaurants/{restaurant}/createmenu', [AdminMenuController::class, 'createMenu'])->name('menus.create');
    Route::post('/menus', [AdminMenuController::class, 'storeMenu'])->name('menus.store');
    Route::get('/menus/{menu}/edit', [AdminMenuController::class, 'editMenu'])->name('menus.edit');
    Route::put('/menus/{menu}', [AdminMenuController::class, 'updateMenu'])->name('menus.update');
    Route::delete('/menus/{menu}', [AdminMenuController::class, 'destroyMenu'])->name('menus.destroy');

    //ORDERS
    Route::get('/orders', [AdminMenuController::class, 'viewOrders'])->name('orders.index');
});

