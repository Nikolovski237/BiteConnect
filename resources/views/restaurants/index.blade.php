@extends('layouts.app')

@section('content')
    <section>
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
        <div class="col-md-4 mb-4"> <!-- Adjusted the column size to col-md-6 -->
            <a href="{{ route('menus.show', $restaurant->id) }}" style="text-decoration: none; color: inherit;">
                <div class="card">
                    <img src="{{ asset($restaurant->image) }}" class="card-img-top" style="height: 250px; object-fit: cover;" alt="{{ $restaurant->name }}">
                    <div class="card-body">
                        <h5 class="card-title" style="font-size: 1.5em; margin-bottom: 0.5em;">{{ $restaurant->name }}</h5>
                        <p class="card-text" style="font-size: 1em; margin-bottom: 0.5em;">{{ $restaurant->description }}</p>
                        <p class="card-text" style="font-size: 0.9em; margin-bottom: 0.5em;">Location: {{ $restaurant->location }}</p>
                        <p class="card-text" style="font-size: 0.9em; margin-bottom: 0.5em;">Cost: {{ $restaurant->cost }}</p>
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
            </a>
        </div>
        @empty
        <div class="col-md-12">
            <p>No restaurants available</p>
        </div>
        @endforelse
    </div>
</div>
@endsection
