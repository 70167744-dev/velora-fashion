@extends('layout')
@section('title', 'My Cart')

@section('content')
<div class="container my-5">
    <h2 class="mb-4">My Cart</h2>

    @if(count($cart) > 0)
    <table class="table align-middle">
        <thead>
            <tr>
                <th>Product</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Subtotal</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @php $total = 0; @endphp
            @foreach($cart as $id => $item)
                @php $subtotal = $item['price'] * $item['quantity']; $total += $subtotal; @endphp
                <tr>
                    <td>{{ $item['name'] }}</td>
                    <td>Rs {{ $item['price'] }}</td>
                    <td>{{ $item['quantity'] }}</td>
                    <td>Rs {{ $subtotal }}</td>
                    <td>
                        <form action="{{ route('cart.remove', $id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Remove</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="text-end">
        <h4>Total: Rs {{ $total }}</h4>
      <a href="{{ route('checkout') }}" class="btn btn-coral mt-2">Proceed to Checkout</a>

    </div>
    @else
        <p>Your cart is empty.</p>
        <a href="{{ route('checkout') }}" class="btn btn-coral mt-2">Proceed to Checkout</a>
    @endif
</div>
@endsection