<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\RestaurantController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\FoodCategoryController;
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

Route::get('/', function () {return view('Home');});

Route::resource('/users', UserController::class);
Route::resource('/restaurants', RestaurantController::class);

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);


Route::get('/restaurants/{restaurant}/menu', [MenuController::class, 'show'])->name('restaurants.menu');
Route::get('/restaurants/{restaurant}/createmenu', [MenuController::class, 'create'])->name('restaurants.createmenu');
Route::get('/restaurants/food-type/{foodType}', [RestaurantController::class, 'showByFoodType'])->name('restaurants.showByFoodType');

Route::post('/menus', [MenuController::class, 'store'])->name('menus.store');
Route::get('/menus/{restaurant}', [MenuController::class, 'show'])->name('menus.show');
Route::delete('/menus/{menu}', [MenuController::class, 'destroy'])->name('menus.destroy');
Route::put('/menus/{menu}', [MenuController::class, 'update'])->name('menus.update');
Route::get('/menus/{menu}/edit', [MenuController::class, 'edit'])->name('menus.edit');


Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
Route::post('/users/{user}', 'UserController@update')->name('users.update');


Route::get('/cart', [CartController::class, 'show'])->name('cart.show');
Route::post('/cart/add/{menuItemId}', [CartController::class, 'addToCart'])->name('cart.addToCart');
Route::delete('/cart/{menuItemId}', [CartController::class, 'remove'])->name('cart.remove');

Route::get('/orders/create', [OrderController::class, 'create'])->name('order.create');
Route::post('/orders', [OrderController::class, 'store'])->name('order.store');
Route::get('/orders/thankyou', [OrderController::class, 'thankyou'])->name('order.thankyou');
