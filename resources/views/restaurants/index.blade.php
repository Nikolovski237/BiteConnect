@extends('layouts.app')

@section('content')
        <section class="food-types bg-light py-3">
            @include('food_types')
        </section>
    <div class="container">
        <h2>All restaurants</h2>
        @auth
            @if(auth()->user()->isMasterAdmin() || auth()->user()->isRestaurantAdmin())
                <div class="mb-3">
                    <a href="{{ route('restaurants.create') }}" class="btn btn-success">Create Restaurant</a>
                </div>
            @endif
        @endauth
        <div class="row">
            @forelse($restaurants as $restaurant)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">{{ $restaurant->name }}</h5>
                            <p class="card-text">Description: {{ $restaurant->description }}</p>
                            <p class="card-text">Location: {{ $restaurant->location }}</p>
                            <p class="card-text">Cost: {{ $restaurant->cost }}</p>
                            <a href="{{ route('menus.show', $restaurant->id) }}" class="btn btn-info">View Menu</a>
                            @auth
                                @if(auth()->user()->isMasterAdmin() || auth()->user()->isRestaurantAdmin())
                                    <a href="{{ route('restaurants.edit', $restaurant->id) }}" class="btn btn-warning">Edit</a>
                                    <form action="{{ route('restaurants.destroy', $restaurant->id) }}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                                    </form>
                                @endif
                            @endauth
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-md-12">
                    <p>No restaurants available</p>
                </div>
            @endforelse
        </div>
    </div>
@endsection
