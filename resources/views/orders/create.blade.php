@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Create Order</h2>
        <!-- Your order creation form goes here -->
        <form method="POST" action="{{ route('order.store') }}">
            @csrf

            <!-- Add your order form fields here -->

            <button type="submit" class="btn btn-primary">Place Order</button>
        </form>
    </div>
@endsection