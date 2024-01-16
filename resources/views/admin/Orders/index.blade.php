@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <h2>All Orders</h2>

        @if ($orders->isEmpty())
            <p>No orders available.</p>
        @else
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Customer Name</th>
                        <th>Delivery Address</th>
                        <th>Total Amount</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $order)
                        <tr>
                            <td>{{ $order->user_id }}</td>
                            <td>{{ $order->full_name }}</td>
                            <td>{{ $order->delivery_address }}</td>
                            <td>{{ $order->total_amount }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection
