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
				<a href="{{ url('/dashboard') }}">
					Restaurants
				</a>
				<a href="{{ url('/users') }}">
					Users
				</a>
				<a href="{{ url('/orders') }}">
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
				<a href="{{ url('/dashboard') }}">
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
        @yield('content')
        </div>

</body>
</html>