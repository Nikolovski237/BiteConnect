@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <h2>Edit Menu Item</h2>
        <form method="POST" action="{{ route('menus.update', $menu->id) }}">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="name">Item Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $menu->name }}" required>
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" id="description" name="description" rows="3">{{ $menu->description }}</textarea>
            </div>

            <div class="form-group">
                <label for="price">Price</label>
                <input type="text" class="form-control" id="price" name="price" value="{{ $menu->price }}" required>
            </div>
            
            <div class="form-group">
                <label for="cost">Cost</label>
                <select class="form-control" id="cost" name="cost">
                <option value="Burger" {{ $menu->type === 'Burger' ? 'selected' : '' }}>Burger</option>
                <option value="Pizza" {{ $menu->type === 'Pizza' ? 'selected' : '' }}>Pizza</option>
                <option value="Pasta" {{ $menu->type === 'Pasta' ? 'selected' : '' }}>Pasta</option>
                <option value="Salad" {{ $menu->type === 'Salad' ? 'selected' : '' }}>Salad</option>
                <option value="Soup" {{ $menu->type === 'Soup' ? 'selected' : '' }}>Soup</option>
                <option value="Sandwich" {{ $menu->type === 'Sandwich' ? 'selected' : '' }}>Sandwich</option>
                <option value="Wraps" {{ $menu->type === 'Wraps' ? 'selected' : '' }}>Wraps</option>
                <option value="Desert" {{ $menu->type === 'Desert' ? 'selected' : '' }}>Desert</option>
                <option value="Fish" {{ $menu->type === 'Fish' ? 'selected' : '' }}>Fish</option>
                <option value="BBQ" {{ $menu->type === 'BBQ' ? 'selected' : '' }}>BBQ</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Update Menu Item</button>
        </form>
    </div>
@endsection
