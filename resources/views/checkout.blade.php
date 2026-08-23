@extends('layout')
@section('title', 'Checkout')

@section('content')
<div class="container my-5">
    <h2 class="mb-4">Checkout</h2>

    <div class="row">
        <div class="col-md-6">
            <form action="{{ route('order.place') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Full Name</label>
                    <input type="text" name="name" class="form-control" value="{{ auth()->user()->name ?? '' }}" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Address</label>
                    <textarea name="address" class="form-control" rows="3" required></textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label">Phone</label>
                    <input type="text" name="phone" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-coral">Place Order</button>
            </form>
        </div>

        <div class="col-md-6">
            <h5>Order Summary</h5>
            <table class="table">
                <tbody>
                    @foreach($cart as $item)
                    <tr>
                        <td>{{ $item['name'] }} x {{ $item['quantity'] }}</td>
                        <td>Rs {{ $item['price'] * $item['quantity'] }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <h5>Total: Rs {{ $total }}</h5>
        </div>
    </div>
</div>
@endsection