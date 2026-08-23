@extends('layout')
@section('title', 'Order Confirmed')

@section('content')
<div class="container my-5 text-center">
    <h2 class="text-success mb-3"> Order Placed Successfully!</h2>
    <p>Your Order ID: <strong>#{{ $order->id }}</strong></p>
    <p>Total Amount: <strong>Rs {{ $order->total_amount }}</strong></p>
    <p>Status: <strong>{{ ucfirst($order->status) }}</strong></p>

    <div class="my-4">
        <h5>Order Items</h5>
        <table class="table w-75 mx-auto">
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Quantity</th>
                    <th>Price</th>
                </tr>
            </thead>
            <tbody>
                @foreach($order->items as $item)
                <tr>
                    <td>{{ $item->product->name ?? 'Product' }}</td>
                    <td>{{ $item->quantity }}</td>
                    <td>Rs {{ $item->price }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <a href="{{ route('products.list') }}" class="btn btn-coral">Continue Shopping</a>
</div>
@endsection