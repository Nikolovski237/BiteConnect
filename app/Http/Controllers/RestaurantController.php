<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Restaurant;

class RestaurantController extends Controller
{
     /**
     * Display a listing of the restaurants.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $restaurants = Restaurant::all();
        return view('restaurants.index', compact('restaurants'));
    }

    /**
     * Show the form for creating a new restaurant.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('restaurants.create');
    }

    /**
     * Store a newly created restaurant in the database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'nullable',
            'location' => 'nullable',
            'cost' => 'nullable',
        ]);

        Restaurant::create($request->all());

        return redirect()->route('restaurants.index')->with('success', 'Restaurant created successfully');
    }

    /**
     * Display the specified restaurant.
     *
     * @param  \App\Models\Restaurant  $restaurant
     * @return \Illuminate\View\View
     */
    public function show(Restaurant $restaurant)
    {
        return view('restaurants.show', compact('restaurant'));
    }

    public function edit(Restaurant $restaurant)
    {
        return view('restaurants.edit', compact('restaurant'));
    }

    public function update(Request $request, Restaurant $restaurant)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'location' => 'nullable|string',
            'cost' => 'nullable|string|in:$,$$,$$$,$$$$,$$$$$',
        ]);

        $restaurant->update($validatedData);

        return redirect()->route('restaurants.index')->with('success', 'Restaurant updated successfully');
    }

    public function destroy(Restaurant $restaurant)
    {
        $restaurant->delete();

        return redirect()->route('restaurants.index')->with('success', 'Restaurant deleted successfully');
    }

    public function showByFoodType($foodType)
    {
        $restaurants = Restaurant::whereHas('menu.items', function ($query) use ($foodType) {
            $query->where('type', $foodType);
        })->get();

        return view('restaurants.index', compact('restaurants'));
    }

}
