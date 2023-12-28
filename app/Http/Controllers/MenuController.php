<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Restaurant;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function show(Restaurant $restaurant)
    {
        $menuItems = Menu::where('restaurant_id', $restaurant->id)->get();

        return view('restaurants.menu', compact('restaurant', 'menuItems'));
    }
}