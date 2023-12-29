<!-- resources/views/restaurants/menu.blade.php -->

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
                    <!-- Add more columns as needed -->
                </tr>
            </thead>
            <tbody>
                @forelse($menuItems as $menuItem)
                    <tr>
                        <td>{{ $menuItem->name }}</td>
                        <td>{{ $menuItem->description }}</td>
                        <td>{{ $menuItem->price }}</td>
                        <!-- Add more columns as needed -->
                    </tr>
                @empty
                    <tr>
                        <td colspan="3">No menu items available</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
