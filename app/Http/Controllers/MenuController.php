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
    }

    public function edit(Menu $menu)
    {
        $this->authorize('update', $menu);

        return view('restaurants.editmenu', compact('menu'));
    }

    public function update(Request $request, Menu $menu)
    {
        $this->authorize('update', $menu);

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
        ]);

        $menu->update($validatedData);

        return redirect()->route('restaurants.menu', ['restaurant' => $menu->restaurant_id])->with('success', 'Menu item updated successfully');
    }
}