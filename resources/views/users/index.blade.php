<!-- resources/views/users/index.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>All Users</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse($users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->role }}</td>
                        <td>
                            <a href="{{ route('users.show', $user->id) }}" class="btn btn-info">View</a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4">No users available</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
