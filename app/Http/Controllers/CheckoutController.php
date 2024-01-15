<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;


class CheckoutController extends Controller
{
    public function index()
    {
        return view('orders.checkout');
    }

    public function store(Request $request)
    {
        // Validate the form data (you might need to adjust the validation rules)
        $request->validate([
            'delivery_method' => 'required',
            'delivery_time' => 'required',
            'delivery_address' => 'required',
            'no_contact_delivery' => 'boolean',
            'full_name' => 'required',
            'card_number' => 'required|numeric',
            'expiration_date' => 'required|regex:/^\d{2}\/\d{4}$/',
            'ccv' => 'required|numeric',
            'tip_amount' => 'numeric|min:0',
        ]);

        // Calculate total amount including the tip
        $cartItems = Auth::user()->cartItems;
        $totalAmount = $cartItems->sum('total_price') + $request->input('tip_amount', 0);

        // Serialize cart items into JSON
        $selectedItems = $cartItems->map(function ($cartItem) {
            return [
                'menu_item_name' => $cartItem->menuItem->name,
                'quantity' => $cartItem->quantity,
                'total_price' => $cartItem->total_price,
                // Add other relevant information if needed
            ];
        });

        // Create the order
        $order = Order::create([
            'user_id' => Auth::id(),
            'delivery_method' => $request->input('delivery_method'),
            'delivery_time' => $request->input('delivery_time'),
            'delivery_address' => $request->input('delivery_address'),
            'no_contact_delivery' => $request->has('no_contact_delivery'),
            'selected_items' => $selectedItems->toJson(),
            'full_name' => $request->input('full_name'),
            'card_number' => $request->input('card_number'),
            'expiration_date' => $request->input('expiration_date'),
            'ccv' => $request->input('ccv'),
            'tip_amount' => $request->input('tip_amount', 0),
            'total_amount' => $totalAmount,
        ]);

        // Clear the user's cart
        Auth::user()->cartItems()->delete();

        // Redirect or perform additional actions as needed
        return redirect()->route('restaurants.index')->with('success', 'Order placed successfully!');
    }
}
