@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <h2>Edit Restaurant</h2>
        <form method="POST" action="{{ route('restaurants.update', ['restaurant' => $restaurant->id]) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="name">Restaurant Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $restaurant->name }}" required>
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" id="description" name="description" rows="3">{{ $restaurant->description }}</textarea>
            </div>

            <div class="form-group">
                <label for="location">Location</label>
                <input type="text" class="form-control" id="location" name="location" value="{{ $restaurant->location }}">
            </div>

            <div class="form-group">
                <label for="cost">Cost</label>
                <select class="form-control" id="cost" name="cost">
                <option value="$" {{ $restaurant->cost === '$' ? 'selected' : '' }}>$</option>
                <option value="$$" {{ $restaurant->cost === '$$' ? 'selected' : '' }}>$$</option>
                <option value="$$$" {{ $restaurant->cost === '$$$' ? 'selected' : '' }}>$$$</option>
                <option value="$$$$" {{ $restaurant->cost === '$$$$' ? 'selected' : '' }}>$$$$</option>
                <option value="$$$$$" {{ $restaurant->cost === '$$$$$' ? 'selected' : '' }}>{{ $restaurant->cost === '$$$$$' ? '$$$$$' : '' }}</option>
                </select>
            </div>

            <div class="form-group">
                <label for="image">Restaurant Image</label>
                <input type="file" class="form-control-file" id="image" name="image">
            </div>

            <button type="submit" class="btn btn-primary">Update Restaurant</button>
        </form>
    </div>
@endsection
