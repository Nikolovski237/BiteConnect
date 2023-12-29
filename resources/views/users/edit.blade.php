@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Edit User</h2>
        <form method="POST" action="{{ route('users.update', $user) }}">
            @csrf
            @method('PATCH')
            <button type="submit" class="btn btn-primary">Update User</button>
        </form>
    </div>
@endsection
