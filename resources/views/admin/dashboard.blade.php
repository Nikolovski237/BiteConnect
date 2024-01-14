<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
				<a href="#" class="active">
					Restaurants
				</a>
				<a href="#">
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
		<div>
        <div class="container">
            <h2>All restaurants</h2>
            <div class="row">
                <div class="col-md-12">
                    <p>No restaurants available</p>
                </div>
            </div>
        </div>

        </div>
</body>
</html>