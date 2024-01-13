@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Create Order</h2>
        <form method="POST" action="{{ route('order.store') }}">
            @csrf
            <button type="submit" class="btn btn-primary">Place Order</button>
        </form>
    </div>
@endsection