@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>{{ $restaurant->name }} Menu</h2>
        @auth
            @if(auth()->user()->isMasterAdmin() || auth()->user()->isRestaurantAdmin())
            <div class="mb-3">
                <a href="{{ route('restaurants.createmenu', $restaurant->id) }}" class="btn btn-success">Create Menu Item</a>
            </div>
            @endif
        @endauth        
        
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Price</th>
                    @auth
                    <th>Action</th>
                    <th></th>
                    @endauth
                </tr>
            </thead>
            <tbody>
                @forelse($menuItems as $menuItem)
                    <tr>
                        <td>{{ $menuItem->name }}</td>
                        <td>{{ $menuItem->description }}</td>
                        <td>{{ $menuItem->price }}</td>
                        @auth
                        <td>
                                <form method="POST" action="{{ route('cart.addToCart', $menuItem->id) }}">
                                    @csrf
                                    <button type="submit" class="btn btn-primary">Add to Cart</button>
                                </form>
                        </td>
                        @endauth
                    </tr>
                @empty
                    <tr>
                        <td colspan="4">No menu items available</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
@endsection