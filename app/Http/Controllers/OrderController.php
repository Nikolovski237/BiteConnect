<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::all();
        return view('admin.orders.index', compact('orders'));
    }

    public function create()
    {
        // Fetch cart items as needed
        return view('orders.create'); // Assuming you have a blade file for the order creation form
    }

    public function store(Request $request)
{
    // Validate the request data
    $request->validate([
        'name' => 'required|string',
        'address' => 'required|string',
        // Add other validation rules
    ]);

    $cartItems = session('cart', []);
    $totalPrice = array_sum(array_column($cartItems, 'price'));

    // Create the order in the database
    $order = Order::create([
        'user_id' => auth()->user()->id,
        'total_price' => $totalPrice,
        'delivery_address' => $request->input('address'),
        // Add other order details
    ]);

    // Attach items to the order (assuming a many-to-many relationship)
    $order->items()->attach($cartItems);

    // Clear the cart or mark items as ordered, depending on your setup

    // Redirect to a thank you page or wherever needed
    return redirect()->route('order.thankyou')->with('order_id', $order->id);
}

    public function thankyou()
    {
        return view('orders.thankyou');
    }
}
