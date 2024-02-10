<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Menu;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminMenuController extends Controller
{
    public function index()
    {
        $restaurants = Restaurant::all();
        $orders = Order::all();
    
        return view('admin.layouts.app', compact('restaurants', 'orders'));
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
            'type' => 'nullable|in:Burger, Pizza, Pasta, Salad, Soup, Sandwich, Wraps, Desert, Fish, BBQ',
            'price' => 'nullable|numeric',
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
    public function viewOrders()
    {
        $orders = Order::all();
        return view('admin.orders.index', compact('orders'));
    }

}