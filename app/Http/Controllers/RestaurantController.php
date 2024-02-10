<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use App\Models\Restaurant;
use App\Models\Menu;

class RestaurantController extends Controller
{
    public function index()
    {
        $restaurants = Restaurant::all();
        return view('restaurants.index', compact('restaurants'));
    }
    
    public function show(Restaurant $restaurant)
    {
        return view('restaurants.show', compact('restaurant'));
    }
    
    public function showMenu(Restaurant $restaurant)
    {
        $menuItems = Menu::where('restaurant_id', $restaurant->id)->get();

        return view('menus.show', compact('restaurant', 'menuItems'));
    }
    
    public function showByFoodType($foodType)
    {
        $restaurants = Restaurant::whereHas('menu.items', function ($query) use ($foodType) {
            $query->where('type', $foodType);
        })->get();

        return view('restaurants.index', compact('restaurants'));
    }

     public function searchMenuItems(Request $request)
    {
        $query = $request->input('query');
    
        if (empty($query)) {
            return redirect()->route('menus.show')->with('error', 'Please enter a search query.');
        }
    
        $menuItems = Menu::where('name', 'like', "%$query%")->get();
    
        return view('menus.search', ['menuItems' => $menuItems, 'query' => $query]);
    } 

    public function showAllMenuItems()
    {
        $menuItems = Menu::all();

        return view('menus.all', compact('menuItems'));
    }
}