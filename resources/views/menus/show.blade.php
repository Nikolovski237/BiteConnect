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
                    <th>Actions</th> <!-- Add a new column for actions -->
                </tr>
            </thead>
            <tbody>
                @forelse($menuItems as $menuItem)
                    <tr>
                        <td>{{ $menuItem->name }}</td>
                        <td>{{ $menuItem->description }}</td>
                        <td>{{ $menuItem->price }}</td>
                        <td>
                            @auth
                                @if(auth()->user()->isMasterAdmin() || auth()->user()->isRestaurantAdmin())
                                <a href="{{ route('menus.edit', $menuItem->id) }}" class="btn btn-primary">Edit</a>
                                    <form method="POST" action="{{ route('menus.destroy', $menuItem->id) }}" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this menu item?')">Delete</button>
                                    </form>
                                @endif
                                @if(auth()->check())
                                <form action="{{ route('cart.add', ['menu' => $menuItem->id]) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-primary">Add to Cart</button>
                                </form>
                                @endif
                            @endauth
                            
                            </td>
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