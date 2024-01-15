<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Redirector; 
use App\Models\Cart;
use App\Models\Menu;

class CartController extends Controller
{
    public function show()
    {
        $cartItems = session('cart', []);
        $totalPrice = array_sum(array_column($cartItems, 'price'));

        return view('cart.show', compact('cartItems', 'totalPrice'));
    }

    public function addToCart(Request $request, $menuItemId)
    {
        $menuItem = Menu::findOrFail($menuItemId);

        $cartItems = session('cart', []);
        $cartItems[] = [
            'menu_item_id' => $menuItem->id,
            'name' => $menuItem->name,
            'price' => $menuItem->price,
        ];

        session(['cart' => $cartItems]);

        return redirect()->back()->with('success', 'Item added to cart successfully');
    }

    public function remove($menuItemId)
    {
        $removed = $this->removeFromCart($menuItemId);

        if ($removed) {
            return redirect()->back()->with('success', 'Item removed from the cart successfully');
        } else {
            return redirect()->back()->with('error', 'Failed to remove item from the cart');
        }
    }
    public function removeFromCart($menuItemId)
    {
        $cart = session()->get('cart', []);


        if (isset($cart[$menuItemId])) {
            
            unset($cart[$menuItemId]);

            session()->put('cart', $cart);

            return redirect()->back()->with('success', 'Item removed from the cart successfully');
        }

        return redirect()->back()->with('error', 'Item not found in the cart');
    }

}