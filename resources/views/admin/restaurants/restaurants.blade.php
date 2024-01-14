<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/admin.css') }}">
    <title>Dashboard</title>
</head>
<body>
<div class="app">
	<header class="app-header">
		<div class="app-header-logo">
			<div class="logo">
				<h1 class="logo-title">
					<span>Bite</span>
					<span>Connect</span>
				</h1>
			</div>
		</div>
		<div class="app-header-navigation">
			<div class="tabs">
				<a href="{{ url('/dashboard') }}" class="active">
					Restaurants
				</a>
				<a href="{{ url('/users') }}">
					Users
				</a>
				<a href="#">
					Orders
				</a>
                <a></a>
			</div>
		</div>
		<div class="app-header-actions">
			<button class="user-profile">
            <span class="navbar-text">{{ Auth::user()->name }}</span>
			<span>
            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">X</a>
			</span>
			</button>
		</div>

	</header>
	<div class="app-body">
		<div class="app-body-navigation">
			<nav class="navigation">
				<a href="#">
					<i class="ph-browsers"></i>
					<span>Dashboard</span>
				</a>
                <a href="{{ url('/') }}">
					<i class="ph-check-square"></i>
					<span>User Site</span>
				</a>
				<a href="#">
					<i class="ph-check-square"></i>
					<span>Messages</span>
				</a>
			</nav>
		</div>
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
                            <a href="{{ route('menus.show', $restaurant->id) }}" class="btn btn-success">View Menu</a>
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

    <!-- Button to create a new restaurant -->
</div>
	</div>

</body>
</html>