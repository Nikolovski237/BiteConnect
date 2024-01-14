@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Your Cart</h2>

        @if (count($cartItems) > 0)
            <table class="table">
                <thead>
                    <tr>
                        <th>Item</th>
                        <th>Price</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cartItems as $cartItem)
                        <tr>
                            <td>{{ $cartItem['name'] }}</td>
                            <td>{{ $cartItem['price'] }}</td>
                            <td>
                                <form method="POST" action="{{ route('cart.remove', $cartItem['menu_item_id']) }}" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to remove this item from the cart?')">Remove</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <p>Total Price: {{ $totalPrice }}</p>
            <a href="{{ route('order.create') }}" class="btn btn-success">Order Now</a>
        @else
            <p>Your cart is currently empty.</p>
        @endif
    </div>
@endsection
