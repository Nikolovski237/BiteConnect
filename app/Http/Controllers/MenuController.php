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

        return view('menus.show', compact('restaurant', 'menuItems'));
    }
    public function create()
    {
       $restaurants = Restaurant::all();
       return view('menus.create', compact('restaurants'));
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'restaurant_id' => 'required|exists:restaurants,id',
        ]);
        Menu::create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'price' => $request->input('price'),
            'restaurant_id' => $request->input('restaurant_id'),
        ]);
        return redirect()->route('menus.show', ['restaurant' => $request->input('restaurant_id')])
            ->with('success', 'Menu item created successfully');   
    }

    public function edit(Menu $menu)
    {
        return view('menus.edit', compact('menu'));
    }

    public function update(Request $request, Menu $menu)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
        ]);
        $menu->update($validatedData);
        return redirect()->route('menus.show', ['restaurant' => $menu->restaurant_id])->with('success', 'Menu item updated successfully');
    }

    public function destroy(Menu $menu)
    {
        $menu->delete();
        return redirect()->back()->with('success', 'Menu item deleted successfully');
    }
}