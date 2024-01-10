<!-- resources/views/restaurants/create.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Create Restaurant</h2>
        <form method="POST" action="{{ route('restaurants.store') }}">
            @csrf

            <div class="form-group">
                <label for="name">Restaurant Name</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" id="description" name="description" rows="3"></textarea>
            </div>

            <div class="form-group">
                <label for="location">Location</label>
                <input type="text" class="form-control" id="location" name="location">
            </div>

            <div class="form-group">
                <label for="cost">Cost</label>
                <select class="form-control" id="cost" name="cost">
                    <option value="$">$</option>
                    <option value="$$">$$</option>
                    <option value="$$$">$$$</option>
                    <option value="$$$$">$$$$</option>
                    <option value="$$$$$">$$$$$</option>
                </select>
            </div>
            
            <div class="form-group">
                <label for="image">Image</label>
                <input type="file" class="form-control-file" id="image" name="image">
            </div>

            <button type="submit" class="btn btn-primary">Create Restaurant</button>
        </form>
    </div>
@endsection
