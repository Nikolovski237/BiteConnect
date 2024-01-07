@extends('layouts.app')

@section('content1')
    <div class="container">
        <h2>Food Categories</h2>

        @can('manage-food-categories')
            <div class="mb-3">
                <a href="{{ route('food_categories.create') }}" class="btn btn-success">Add Food Category</a>
            </div>
        @endcan

        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Description</th>
                    @can('manage-food-categories')
                        <th>Action</th>
                    @endcan
                </tr>
            </thead>
            <tbody>
                @forelse ($foodCategories as $foodCategory)
                    <tr>
                        <td>{{ $foodCategory->name }}</td>
                        <td>{{ $foodCategory->description }}</td>
                        @can('manage-food-categories')
                            <td>
                                <a href="{{ route('food_categories.edit', $foodCategory->id) }}" class="btn btn-primary">Edit</a>
                                <form action="{{ route('food_categories.destroy', $foodCategory->id) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                                </form>
                            </td>
                        @endcan
                    </tr>
                @empty
                    <tr>
                        <td colspan="3">No food categories available.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
