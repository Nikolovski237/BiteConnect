@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Create Food Category</h2>

        {{-- Add your form for creating a new food category --}}
        <form method="POST" action="{{ route('food_categories.store') }}">
            @csrf
            {{-- Add form fields based on your model --}}
            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
@endsection
