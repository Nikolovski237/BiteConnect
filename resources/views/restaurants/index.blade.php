<!-- resources/views/restaurants/index.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>All Restaurants</h2>
        @auth
            @if(auth()->user()->isMasterAdmin() || auth()->user()->isRestaurantAdmin())
                <div class="mb-3">
                    <a href="{{ route('restaurants.create') }}" class="btn btn-success">Create Restaurant</a>
                </div>
            @endif
        @endauth
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Location</th>
                    <th>Cost</th>
                    <th>Menu</th>
                </tr>
            </thead>
            <tbody>
                @forelse($restaurants as $restaurant)
                    <tr>
                        <td>{{ $restaurant->name }}</td>
                        <td>{{ $restaurant->description }}</td>
                        <td>{{ $restaurant->location }}</td>
                        <td>{{ $restaurant->cost }}</td>
                        <td>
                            <a href="{{ route('restaurants.menu', $restaurant->id) }}" class="btn btn-info">View Menu</a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5">No restaurants available</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
