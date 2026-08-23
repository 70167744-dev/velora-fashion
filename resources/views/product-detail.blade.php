@extends('layout')
@section('title', $product->name)

@section('content')
<div class="container my-5">
    <div class="row">
        <div class="col-md-6" data-aos="fade-right">
            @if($product->image)
                <img src="{{ asset('storage/'.$product->image) }}" class="img-fluid rounded" alt="{{ $product->name }}">
            @else
                <div style="height:350px; background:#eee;" class="rounded d-flex align-items-center justify-content-center">
                    No Image
                </div>
            @endif
        </div>

        <div class="col-md-6" data-aos="fade-left">
            <span class="badge-category">{{ $product->category->name ?? '' }}</span>
            <h2 class="mt-3">{{ $product->name }}</h2>
            <p class="price-tag fs-3">Rs {{ $product->price }}</p>
            <p class="text-muted">{{ $product->description }}</p>
            <p><strong>Stock:</strong> {{ $product->stock }}</p>

            @if($product->stock > 0)
            <form action="{{ route('cart.add') }}" method="POST">
                @csrf
                <input type="hidden" name="product_id" value="{{ $product->id }}">
                <input type="number" name="quantity" value="1" min="1" max="{{ $product->stock }}">
                <button type="submit" class="btn btn-coral mt-2">Add to Cart</button>
            </form>
            @else
                <p class="text-danger">Out of Stock</p>
            @endif
        </div>
    </div>
</div>
@endsection