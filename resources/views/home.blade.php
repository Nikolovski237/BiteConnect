<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bite Connect</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/custom.css') }}">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="{{ url('/') }}">
            <img src="{{ asset('images/biteconnect-high-resolution-logo-transparent.png') }}" alt="Bite Connect Logo">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('restaurants.index') }}">Restaurants</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('all-menu-items') }}">Menu Hub</a>
                </li>
                @auth
                @if(auth()->user()->isMasterAdmin())
                <li class="nav-item">
                    <div class="mb-3">
                        <a href="{{ url('/dashboard') }}" class="btn btn-success">Dashboard</a>
                    </div>
                </li>
                @endif
                @endauth        
        
            </ul>
            <ul class="navbar-nav ml-auto">
                @guest
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">Register</a>
                </li>
                @else
                <li class="nav-item">
                    <span class="navbar-text">Welcome, {{ Auth::user()->name }}</span>
                    <a class="nav-link navbar-text" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
                @endguest
            </ul>
        </div>
    </nav>  


<div class="container mt-4 container-slightly-wider" id="foodTypesContainer">
    <div class="jumbotron text-center">
        <h1 class="display-4">Welcome to Bite Connect</h1>
        <p class="lead">Your culinary journey begins here!</p>
    </div>

    <div class="row mt-5">
        <div class="col-md-6">
            <h2>Discover Local Flavors</h2>
            <p>Indulge in a world of exquisite tastes from the best local restaurants in your area. Our diverse culinary selection caters to every palate, ensuring a delightful dining experience.</p>
        </div>
        <div class="col-md-6">
            <h2>Effortless Ordering</h2>
            <p>Experience the ease of ordering your favorite dishes with just a few clicks. Browse through carefully curated menus, customize your orders, and enjoy the convenience of doorstep delivery or quick pickup.</p>
        </div>
    </div>

    <div class="row mt-5">
        <div class="col-md-6">
            <h2>Menu Hub</h2>
            <p>Explore our Menu Hub to discover the latest culinary trends, special offers, and exclusive promotions from our partner restaurants. Your next delicious meal is just a click away!</p>
            <a href="{{ route('all-menu-items') }}" class="btn btn-primary">Explore Menu Hub</a>
        </div>
        <div class="col-md-6">
            <h2>Bite Connect Community</h2>
            <p>Join our vibrant community of food enthusiasts. Share your reviews, recommend hidden gems, and connect with fellow foodies. Because great meals are even better when shared!</p>
        </div>
    </div>

    <p class="mt-5">Ready to embark on a delightful gastronomic journey? Start exploring with Bite Connect today!</p>
</div>


    <footer class="footer mt-4">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <p>&copy; 2024 Bite Connect. All rights reserved.</p>
                </div>
                <div class="col-md-6 text-right">
                    <p>Designed by Martin & Martin </p>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</body>
</html>
