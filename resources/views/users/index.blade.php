@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>All Users</h2>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->role }}</td>
                        @auth
                        @if(auth()->user()->isMasterAdmin())
                        <td>
                                <div class="mb-3">
                                    <a href="{{ route('users.edit', $user) }}" class="btn btn-success">Edit</a>
                                </div>
                            </td>
                                @endif
                            @endauth
                        <td>
                            <a href="{{ route('users.show', $user->id) }}" class="btn btn-info">View</a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5">No users available</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
