@extends('admin.layouts.app')

@section('content')
<div class="container">
			<h2>All restaurants</h2>
			<div class="mt-4">
				<a href="{{ route('restaurants.create') }}" class="btn btn-primary">Create New Restaurant</a>
			</div>
    <div class="row">
        @forelse($restaurants as $restaurant)
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="{{ asset($restaurant->image) }}" class="card-img-top" style="height: 250px; object-fit: cover;" alt="{{ $restaurant->name }}">
                    <div class="card-body">
                        <h5 class="card-title" style="font-size: 1.5em; margin-bottom: 0.5em;">{{ $restaurant->name }}</h5>
                        <p class="card-text" style="font-size: 1em; margin-bottom: 0.5em;">{{ $restaurant->description }}</p>
                        <p class="card-text" style="font-size: 0.9em; margin-bottom: 0.5em;">Location: {{ $restaurant->location }}</p>
                        <p class="card-text" style="font-size: 0.9em; margin-bottom: 0.5em;">Cost: {{ $restaurant->cost }}</p>

                        <!-- Buttons for Edit, View Menu, and Delete -->
                        <div class="btn-group" role="group" aria-label="Restaurant Actions">
                            <a href="{{ route('restaurants.edit', $restaurant->id) }}" class="btn btn-primary">Edit</a>
                            <a href="{{ route('menus.index', $restaurant->id) }}" class="btn btn-success">View Menu</a>
                            <form action="{{ route('restaurants.destroy', $restaurant->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this restaurant?')">Delete</button>
                            </form>
                        </div>
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
