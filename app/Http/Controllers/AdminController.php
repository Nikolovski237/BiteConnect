<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Order;
use App\Models\Menu;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function index()
    {
        $users = User::all();
        $restaurants = Restaurant::all();
        //$orders = Order::all();

    return view('admin.layouts.app', compact('users', 'restaurants',/* 'orders'*/));
    }


    //USERS
    public function viewUsers()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    public function showUsers(User $user)
    {
        return view('admin.users.show', compact('user'));
    }

    public function editUser(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    public function deleteUser(User $user)
    {
        $user->delete();
        return redirect()->route('users')->with('success', 'User deleted successfully');
    }

    public function updateUsers(Request $request, User $user)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'role' => 'required|string|in:customer,restaurant_admin,master_admin',
        ]);

        $user->role = $validatedData['role'];
        $user->update([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
        ]);

        return redirect()->route('users', $user)->with('success', 'User updated successfully');
    }


    //Restaurants
    public function viewRestaurants()
    {
        $restaurants = Restaurant::all();
        return view('admin.restaurants.restaurants', compact('restaurants'));
    }

    public function create()
    {
        return view('admin.restaurants.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'nullable',
            'location' => 'nullable',
            'cost' => 'nullable',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $restaurantData = $request->except('image');

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('public/images/restaurants');
            $restaurantData['image'] = 'storage/' . str_replace('public/', '', $imagePath);
        }

        Restaurant::create($restaurantData);

        return redirect()->route('restaurants.restaurants')->with('success', 'Restaurant created successfully');
    }

    public function edit(Restaurant $restaurant)
    {
        return view('admin.restaurants.edit', compact('restaurant'));
    }

    public function updateRestaurants(Request $request, Restaurant $restaurant)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'location' => 'nullable|string',
            'cost' => 'nullable|string|in:$,$$,$$$,$$$$,$$$$$',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $restaurantData = $request->except('image');

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('public/images/restaurants');
            $restaurantData['image'] = Storage::url($imagePath);
        }

        $restaurant->update(array_merge($validatedData, $restaurantData));

        return redirect()->route('restaurants.restaurants')->with('success', 'Restaurant updated successfully');
    }

    public function destroy(Restaurant $restaurant)
    {
        $restaurant->delete();

        return redirect()->route('restaurants.restaurants')->with('success', 'Restaurant deleted successfully');
    }

    //MENU

    public function showMenu(Restaurant $restaurant)
    {
        $menuItems = Menu::where('restaurant_id', $restaurant->id)->get();

        return view('admin.menus.index', compact('restaurant', 'menuItems'));
    }

    public function createMenu()
    {
       $restaurants = Restaurant::all();
       return view('admin.menus.create', compact('restaurants'));
    }
    
    public function storeMenu(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'type' => 'required|in:Burger, Pizza, Pasta, Salad, Soup, Sandwich, Wraps, Desert, Fish, BBQ',
            'restaurant_id' => 'required|exists:restaurants,id',
        ]);
        Menu::create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'price' => $request->input('price'),
            'type' => $request->input('type'),
            'restaurant_id' => $request->input('restaurant_id'),
        ]);
        return redirect()->route('menus.index', ['restaurant' => $request->input('restaurant_id')])
            ->with('success', 'Menu item created successfully');   
    }

    public function editMenu(Menu $menu)
    {
        return view('admin.menus.edit', compact('menu'));
    }

    public function updateMenu(Request $request, Menu $menu)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'type' => 'required|in:Burger, Pizza, Pasta, Salad, Soup, Sandwich, Wraps, Desert, Fish, BBQ',
            'price' => 'required|numeric',
        ]);
        $menu->update($validatedData);
        return redirect()->route('menus.index', ['restaurant' => $menu->restaurant_id])->with('success', 'Menu item updated successfully');
    }

    public function destroyMenu(Menu $menu)
    {
        $menu->delete();
        return redirect()->back()->with('success', 'Menu item deleted successfully');
    }

    //ORDERS

    // public function viewOrders()
    // {
    //     $orders = Order::all();
    //     return view('admin.orders.index', compact('orders'));
    // }

}