<!-- resources/views/checkout/index.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h3 class="mb-4">Checkout</h3>

        <form method="POST" action="{{ route('checkout.store') }}">
            @csrf

            <!-- Delivery Section -->
            <div class="mb-4">
                <h4>Delivery</h4>
                <div class="mb-3">
                    <label for="delivery_method" class="form-label">Delivery Method:</label>
                    <select name="delivery_method" id="delivery_method" class="form-select">
                        <option value="standard">Standard</option>
                        <option value="express">Express</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="delivery_time" class="form-label">Delivery Time:</label>
                    <input type="text" name="delivery_time" id="delivery_time" class="form-control" placeholder="Enter delivery time">
                </div>

                <div class="mb-3">
                    <label for="delivery_address" class="form-label">Delivery Address:</label>
                    <textarea name="delivery_address" id="delivery_address" class="form-control" placeholder="Enter delivery address"></textarea>
                </div>

                <div class="mb-3 form-check">
                    <input type="checkbox" name="no_contact_delivery" value="1" class="form-check-input" id="no_contact_delivery">
                    <label class="form-check-label" for="no_contact_delivery">No-Contact Delivery</label>
                </div>
            </div>

            <!-- Selected Items Section -->
            <div class="mb-4">
                <h4>Selected Items</h4>
                <ul class="list-group">
                    @foreach(auth()->user()->cartItems as $cartItem)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            {{ $cartItem->menuItem->name }} - {{ $cartItem->quantity }}
                            <span class="badge bg-primary rounded-pill">{{ $cartItem->total_price }}$</span>
                        </li>
                    @endforeach
                </ul>
            </div>

            <!-- Payment Details Section -->
            <div class="mb-4">
                <h4>Payment Details</h4>
                <div class="mb-3">
                    <label for="full_name" class="form-label">Full Name:</label>
                    <input type="text" name="full_name" id="full_name" class="form-control" placeholder="Enter your full name">
                </div>

                <div class="mb-3">
                    <label for="card_number" class="form-label">Card Number:</label>
                    <input type="text" name="card_number" id="card_number" class="form-control" placeholder="Enter your card number">
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="expiration_date" class="form-label">Expiration Date:</label>
                        <input type="text" name="expiration_date" id="expiration_date" class="form-control" placeholder="MM/YYYY">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="ccv" class="form-label">CCV:</label>
                        <input type="text" name="ccv" id="ccv" class="form-control" placeholder="Enter CCV">
                    </div>
                </div>
            </div>

            <!-- Tip Section -->
            <div class="mb-4">
                <h4>Tip</h4>
                <div class="mb-3">
                    <div class="form-check">
                        <input type="radio" name="tip_amount" value="0" checked class="form-check-input">
                        <label class="form-check-label">No Tip</label>
                    </div>

                    <div class="form-check">
                        <input type="radio" name="tip_amount" value="1" class="form-check-input">
                        <label class="form-check-label">$1</label>
                    </div>

                    <div class="form-check">
                        <input type="radio" name="tip_amount" value="2" class="form-check-input">
                        <label class="form-check-label">$2</label>
                    </div>

                    <div class="form-check">
                        <input type="radio" name="tip_amount" value="5" class="form-check-input">
                        <label class="form-check-label">$5</label>
                    </div>
                </div>
            </div>

            <!-- Order Button -->
            <button type="submit" class="btn btn-primary">Place Order</button>
        </form>
    </div>
@endsection
