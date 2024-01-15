<!-- resources/views/checkout/index.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h3>Checkout</h3>

        <form method="POST" action="{{ route('checkout.store') }}">
            @csrf

            <!-- Delivery Section -->
            <h4>Delivery</h4>
            <div>
                <!-- Delivery Method and Time -->
                <label for="delivery_method">Delivery Method:</label>
                <select name="delivery_method" id="delivery_method">
                    <!-- Add options for delivery methods -->
                    <option value="standard">Standard</option>
                    <option value="express">Express</option>
                </select>

                <label for="delivery_time">Delivery Time:</label>
                <input type="text" name="delivery_time" id="delivery_time" placeholder="Enter delivery time">
                
                <!-- Delivery Address -->
                <label for="delivery_address">Delivery Address:</label>
                <textarea name="delivery_address" id="delivery_address" placeholder="Enter delivery address"></textarea>
                
                <!-- No-Contact Delivery -->
                <label>
                    <input type="checkbox" name="no_contact_delivery" value="1">
                    No-Contact Delivery
                </label>
            </div>

            <!-- Selected Items Section -->
            <h4>Selected Items</h4>
            <div>
                <!-- Display selected items from the cart -->
                @foreach(auth()->user()->cartItems as $cartItem)
                    <div>
                        <span>{{ $cartItem->menuItem->name }} - {{ $cartItem->quantity }}</span>
                        <span class="price">{{ $cartItem->total_price }}$</span>
                    </div>
                @endforeach
            </div>

            <!-- Payment Details Section -->
            <h4>Payment Details</h4>
            <div>
                <!-- Full Name, Card Number, Date of Expiration, CCV -->
                <label for="full_name">Full Name:</label>
                <input type="text" name="full_name" id="full_name" placeholder="Enter your full name">

                <label for="card_number">Card Number:</label>
                <input type="text" name="card_number" id="card_number" placeholder="Enter your card number">

                <label for="expiration_date">Expiration Date:</label>
                <input type="text" name="expiration_date" id="expiration_date" placeholder="MM/YYYY">

                <label for="ccv">CCV:</label>
                <input type="text" name="ccv" id="ccv" placeholder="Enter CCV">
            </div>

            <!-- Tip Section -->
            <h4>Tip</h4>
            <div>
                <!-- Radio buttons for tip options -->
                <label>
                    <input type="radio" name="tip_amount" value="0" checked>
                    No Tip
                </label>
                <label>
                    <input type="radio" name="tip_amount" value="1">
                    $1
                </label>
                <label>
                    <input type="radio" name="tip_amount" value="2">
                    $2
                </label>
                <label>
                    <input type="radio" name="tip_amount" value="5">
                    $5
                </label>
                <label>
                    <input type="radio" name="tip_amount" value="other">
                    Other: <input type="text" name="custom_tip_amount">
                </label>
            </div>

            <!-- Order Button -->
            <button type="submit" class="btn btn-primary">Place Order</button>
        </form>
    </div>
@endsection
