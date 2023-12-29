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
    public function create()
    {
       //$this->authorize('createMenu');

       $restaurants = Restaurant::all(); // Replace this with your actual query to fetch restaurants
       return view('restaurants.createmenu', compact('restaurants'));
    }
    
    public function store(Request $request)
    {
        //There is an error with this authorize
      //  $this->authorize('createMenu');

        // Validate the form data
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'restaurant_id' => 'required|exists:restaurants,id',
        ]);
    
        // Create a new menu item
        Menu::create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'price' => $request->input('price'),
            'restaurant_id' => $request->input('restaurant_id'),
        ]);
    
        // Redirect back to the restaurant's menu
        return redirect()->route('restaurants.menu', ['restaurant' => $request->input('restaurant_id')])
            ->with('success', 'Menu item created successfully');   

        /*
        $request->validate([
            'name' => 'required',
            'description' => 'nullable',
            'price' => 'nullable',
        ]);

        Restaurant::create($request->all());

        return redirect()->route('restaurants.index')->with('success', 'Menu Item created successfully');



       // $this->authorize('createMenu');
    
        // Your existing logic for storing the menu item
    
      //  return redirect()->route('restaurants.menu', ['restaurant' => $request->restaurant_id]);
      */
    }
}