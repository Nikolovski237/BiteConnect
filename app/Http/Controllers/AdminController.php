<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Order;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        $users = User::all();
        $orders = Order::all();

        return view('admin.dashboard', compact('users', 'orders'));
    }

    public function viewUsers()
    {
        $users = User::all();
        return view('admin.view_users', compact('users'));
    }

    public function editUser(User $user)
    {
        return view('admin.edit_user', compact('user'));
    }

    public function updateUser(Request $request, User $user)
    {
        // Update user logic here
        return redirect()->route('admin.viewUsers')->with('success', 'User updated successfully');
    }

    public function deleteUser(User $user)
    {
        $user->delete();
        return redirect()->route('admin.viewUsers')->with('success', 'User deleted successfully');
    }

    // Add similar methods for viewing, creating, editing, and deleting restaurants and menu items
    // ...
}