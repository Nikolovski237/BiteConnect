@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <h2>{{ $restaurant->name }} Menu</h2>
        @auth
            <div class="mb-3">
                <a href="{{ route('menus.create', ['restaurant' => $restaurant->id]) }}" class="btn btn-primary">Create New Menu</a>
            </div>
        @endauth

        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Price</th>
                    @auth
                        <th>Action</th>
                        <th></th>
                        <th></th>
                    @endauth
                </tr>
            </thead>
            <tbody>
                @forelse($menuItems as $menuItem)
                    <tr>
                        <td>{{ $menuItem->name }}</td>
                        <td>{{ $menuItem->description }}</td>
                        <td>{{ $menuItem->price }}</td>
                        <td>{{ $menuItem->type }}</td>
                        @auth
                            <td>
                                <a href="{{ route('menus.edit', ['restaurant' => $restaurant->id, 'menu' => $menuItem->id]) }}" class="btn btn-success">Edit</a>
                            </td>
                            <td>
                                <form action="{{ route('menus.destroy', ['restaurant' => $restaurant->id, 'menu' => $menuItem->id]) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this menu item?')">Delete</button>
                                </form>
                            </td>
                        @endauth
                    </tr>
                @empty
                    <tr>
                        <td colspan="{{ auth()->check() ? '6' : '3' }}">No menu items available</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
@endsection
