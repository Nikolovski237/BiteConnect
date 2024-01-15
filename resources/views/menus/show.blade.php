@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <h2>{{ $restaurant->name }} Menu</h2>

                @php
                    $groupedMenuItems = [];
                @endphp

                @forelse($menuItems as $menuItem)
                    @php
                        $groupedMenuItems[$menuItem->type][] = $menuItem;
                    @endphp
                @empty
                    <p>No menu items available</p>
                @endforelse

                @foreach($groupedMenuItems as $type => $items)
                    <h4>{{ $type }}</h4>
                    <div class="card-group">
                        @foreach($items as $menuItem)
                            <div class="col-md-6 mb-4">
                                <div class="card d-flex flex-row-reverse">
                                    <div class="imgcontainer">
                                        <img src="{{ asset($restaurant->image) }}" class="card-img-top custom-card-img" style="border-radius: 10%;" alt="{{ $restaurant->name }}">
                                        <div class="topright">
                                            <form method="POST" action="{{ route('cart.addToCart', $menuItem->id) }}">
                                                @csrf
                                                <button type="submit" class="AddButton">
                                                    <div tabindex="0" class="plusButton">
                                                        <svg class="plusIcon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 30 30">
                                                            <g mask="url(#mask0_21_345)">
                                                                <path d="M13.75 23.75V16.25H6.25V13.75H13.75V6.25H16.25V13.75H23.75V16.25H16.25V23.75H13.75Z"></path>
                                                            </g>
                                                        </svg>
                                                    </div>
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $menuItem->name }}</h5>
                                        <p class="card-text">{{ $menuItem->description }}</p>
                                        <p class="card-text">Price: {{ $menuItem->price }}</p>
                                        @auth
                                        <!-- Additional content for authenticated users if needed -->
                                        @endauth
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endforeach
            </div>
            @auth
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            @livewire('cart-component')
                        </div>
                    </div>
                </div>
            @endauth


        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
@endsection
