<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Restaurant;
use App\Models\Menu;
use Illuminate\Http\Request;


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

}