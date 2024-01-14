<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Restaurant;


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
    
    
    public function showByFoodType($foodType)
    {
        $restaurants = Restaurant::whereHas('menu.items', function ($query) use ($foodType) {
            $query->where('type', $foodType);
        })->get();

        return view('restaurants.index', compact('restaurants'));
    }

}