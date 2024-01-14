@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Create Order</h2>
        <form method="POST" action="{{ route('order.store') }}">
            @csrf

            {{-- Personal Information --}}
            <div class="mb-3">
                <label for="name" class="form-label">Full Name</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>

            <div class="mb-3">
                <label for="address" class="form-label">Delivery Address</label>
                <textarea class="form-control" id="address" name="address" rows="3" required></textarea>
            </div>

            {{-- Payment Information --}}
            <div class="mb-3">
                <label for="payment_method" class="form-label">Payment Method</label>
                <select class="form-select" id="payment_method" name="payment_method" required>
                    <option value="cash">Pay at the Door</option>
                    <option value="online">Pay Online</option>
                </select>
            </div>

            {{-- Credit Card Information (if paying online) --}}
            <div id="credit_card_info" style="display: none;">
                <h3>Credit Card Information</h3>
                <div class="mb-3">
                    <label for="cardholder_name" class="form-label">Cardholder's Name</label>
                    <input type="text" class="form-control" id="cardholder_name" name="cardholder_name" required>
                </div>
                <div class="mb-3">
                    <label for="credit_card_number" class="form-label">Credit Card Number</label>
                    <input type="text" class="form-control" id="credit_card_number" name="credit_card_number" required>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="expiration_date" class="form-label">Expiration Date</label>
                        <input type="text" class="form-control" id="expiration_date" name="expiration_date" placeholder="MM/YYYY" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="ccv" class="form-label">CCV</label>
                        <input type="text" class="form-control" id="ccv" name="ccv" required>
                    </div>
                </div>

            </div>

            <button type="submit" class="btn btn-primary">Place Order</button>
            <input type="hidden" name="redirect" id="redirect" value="{{ route('order.thankyou') }}">
        </form>
    </div>

    <style>
        /* Add your custom CSS styles here */
        .mb-3 {
            margin-bottom: 1.5rem;
        }
    </style>

    <script>
        document.getElementById('payment_method').addEventListener('change', function () {
            var creditCardInfo = document.getElementById('credit_card_info');
            if (this.value === 'online') {
                creditCardInfo.style.display = 'block';
            } else {
                creditCardInfo.style.display = 'none';
            }
        });
    </script>
@endsection
