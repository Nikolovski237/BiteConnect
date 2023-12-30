<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function create()
    {
        return view('orders.create');
    }

    public function store(Request $request)
    {
        return redirect()->route('order.thankyou');
    }

    public function thankyou()
    {
        return view('orders.thankyou');
    }
}
