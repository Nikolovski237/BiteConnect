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
        $cartItems = session('cart', []);
        $totalPrice = array_sum(array_column($cartItems, 'price'));

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
            // If the item is already in the cart, increment the quantity
            $cart->update(['quantity' => DB::raw('quantity + 1')]);
        } else {
            // If the item is not in the cart, add it with quantity set to 1
            Cart::create([
                'menu_item_id' => $menuItem->id,
                'user_id' => $userId,
                'quantity' => 1,
            ]);
        }

        return redirect()->back()->with('success', 'Item added to the cart successfully.');
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