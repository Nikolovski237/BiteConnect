<!-- resources/views/restaurants/show.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Restaurant Details</h2>
        <p>Name: {{ $restaurant->name }}</p>
        <p>Description: {{ $restaurant->description }}</p>
        <p>Location: {{ $restaurant->location }}</p>
        <p>Cost: {{ $restaurant->cost }}</p>
        <!-- Add more restaurant details as needed -->
    </div>
@endsection
