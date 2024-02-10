@extends('layouts.app')

@section('content')
    <h1>Search Results for "{{ $query }}"</h1>

    @if($menuItems->isEmpty())
        <p>No results found.</p>
    @else
        <ul>
            @foreach($menuItems as $menuItem)
                <li>{{ $menuItem->name }} - {{ $menuItem->restaurant->name }}</li>
            @endforeach
        </ul>
    @endif
@endsection