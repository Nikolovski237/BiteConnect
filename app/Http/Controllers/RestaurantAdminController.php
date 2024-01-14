<?php

namespace App\Http\Controllers;

use App\Models\Restaurant;
use App\Models\Menu;
use App\Models\User;
use Illuminate\Http\Request;

class RestaurantAdminController extends Controller
{
    public function dashboard()
    {
        // Retrieve restaurant details, menus, etc., for the dashboard
        $restaurant = auth()->user()->restaurant;
        $menus = Menu::where('restaurant_id', $restaurant->id)->get();

        return view('restaurant_admin.dashboard', compact('restaurant', 'menus'));
    }

    public function viewUsers()
    {
        $users = User::all();
        return view('restaurant_admin.view_users', compact('users'));
    }

}