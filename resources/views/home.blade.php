@extends('layout')
@section('title', 'Home')

@section('content')

<div class="hero text-center">
    <div class="container" data-aos="fade-up">
        <h1>Discover Your Next <span class="highlight">Favorite</span></h1>
        <p>Amazing products, unbeatable prices, delivered to you.</p>
        <a href="{{ route('products.list') }}" class="btn btn-primary btn-lg mt-3">Shop Now <i class="fa-solid fa-arrow-right ms-1"></i></a>
    </div>
</div>

<div class="container">

    <div class="mb-5">
        <h3 class="section-title" data-aos="fade-up">Shop by Category</h3>
        <p class="section-sub" data-aos="fade-up">Find exactly what you're looking for</p>
        <div class="d-flex flex-wrap gap-3" data-aos="fade-up">
        @foreach($categories as $category)
    <a href="{{ route('products.list', ['category_id' => $category->id]) }}" class="category-pill" style="text-decoration:none;">{{ $category->name }}</a>
@endforeach
        </div>
    </div>

    <div class="mb-5">
        <h3 class="section-title" data-aos="fade-up">Featured Products</h3>
        <p class="section-sub" data-aos="fade-up">Handpicked just for you</p>
        <div class="row">
            @foreach($products as $product)
            <div class="col-md-3 mb-4" data-aos="fade-up" data-aos-delay="{{ $loop->index * 80 }}">
                <a href="{{ route('products.show', $product) }}" style="text-decoration:none; color:inherit;">
                <div class="card h-100">
                    @if($product->image)
                        <img src="{{ asset('storage/' . $product->image) }}" class="card-img-top" style="height:220px; object-fit:cover;">
                    @else
                        <div style="height:220px; background:#f1f1f1;" class="d-flex align-items-center justify-content-center text-muted">No Image</div>
                    @endif
                    <div class="card-body">
                        <span class="badge-category">{{ $product->category->name ?? '' }}</span>
                        <h5 class="card-title mt-2 mb-1">{{ $product->name }}</h5>
                        <p class="price-tag mb-0">Rs. {{ number_format($product->price, 2) }}</p>
                    </div>
                </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>

</div>
@endsection