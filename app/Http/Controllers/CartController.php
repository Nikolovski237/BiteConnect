<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Menu;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function addToCart(Request $request, $menuId)
    {
        $menu = Menu::findOrFail($menuId);
        $cartItem = Cart::create([
            'user_id' => auth()->id(),
            'menu_id' => $menu->id,
            'quantity' => 1,
        ]);

        return redirect()->back()->with('success', 'Item added to the cart');
    }
}