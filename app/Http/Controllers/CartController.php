<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Redirector; 
use App\Models\Cart;
use App\Models\Menu;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function show()
    {
        // Assuming you're using the Cart model
        $cartItems = Cart::where('user_id', auth()->id())->get();
        $totalPrice = $cartItems->sum('price'); // Assuming each cart item has a 'price' attribute

        return view('cart.show', compact('cartItems', 'totalPrice'));
    }

    public function addToCart(Request $request, $id)
    {
        $menuItem = Menu::findOrFail($id);
    
        // If the user is authenticated, associate the cart item with the user
        $userId = auth()->id();
    
        $cart = Cart::where('menu_item_id', $menuItem->id)
                    ->where('user_id', $userId)
                    ->first();
    
        if ($cart) {
            // If the item is already in the cart, increment the quantity and update the total price
            $cart->update([
                'quantity' => $cart->quantity + 1,
                'total_price' => $cart->total_price + $menuItem->price,
            ]);
        } else {
            // If the item is not in the cart, add it with quantity set to 1 and total price equal to the menu item price
            Cart::create([
                'menu_item_id' => $menuItem->id,
                'user_id' => $userId,
                'quantity' => 1,
                'total_price' => $menuItem->price,
                // Add other attributes as needed
            ]);
        }
    
        return redirect()->back()->with('success', 'Item added to the cart successfully.');
    }
    
    public function increment($id)
    {
        $cartItem = Cart::findOrFail($id);
        $menuItemPrice = $cartItem->menuItem->price;
    
        $cartItem->update([
            'quantity' => $cartItem->quantity + 1,
            'total_price' => $cartItem->total_price + $menuItemPrice,
        ]);
    
        return response()->json(['message' => 'Cart updated successfully']);
    }
    
    public function decrement($id)
    {
        $cartItem = Cart::findOrFail($id);
        $menuItemPrice = $cartItem->menuItem->price;
    
        if ($cartItem->quantity > 1) {
            $cartItem->update([
                'quantity' => $cartItem->quantity - 1,
                'total_price' => $cartItem->total_price - $menuItemPrice,
            ]);
        }
    
        return response()->json(['message' => 'Cart updated successfully']);
    }
    
    public function remove($id)
    {
        $cartItem = Cart::findOrFail($id);
    
        // If the quantity is more than 1, decrement it and update the total price; otherwise, delete the item
        if ($cartItem->quantity > 1) {
            $menuItemPrice = $cartItem->menuItem->price;
            $cartItem->update([
                'quantity' => $cartItem->quantity - 1,
                'total_price' => $cartItem->total_price - $menuItemPrice,
            ]);
        } else {
            $cartItem->delete();
        }
    
        return redirect()->back();
    }

}