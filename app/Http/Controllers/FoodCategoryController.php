<?php
namespace App\Http\Controllers;

use App\Models\FoodCategory;
use Illuminate\Http\Request;

class FoodCategoryController extends Controller
{
    public function index()
    {
        $foodCategories = FoodCategory::all();

        return view('food_categories.index', compact('foodCategories'));
    }

    public function create()
    {
        return view('food_categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:food_categories|max:255',
        ]);

        FoodCategory::create($request->all());

        return redirect()->route('food-categories.index')->with('success', 'Food category created successfully');
    }

    public function edit(FoodCategory $foodCategory)
    {
        return view('food_categories.edit', compact('foodCategory'));
    }

    public function update(Request $request, FoodCategory $foodCategory)
    {
        $request->validate([
            'name' => 'required|unique:food_categories,name,' . $foodCategory->id . '|max:255',
        ]);

        $foodCategory->update($request->all());

        return redirect()->route('food-categories.index')->with('success', 'Food category updated successfully');
    }

    public function destroy(FoodCategory $foodCategory)
    {
        $foodCategory->delete();

        return redirect()->route('food-categories.index')->with('success', 'Food category deleted successfully');
    }
}
