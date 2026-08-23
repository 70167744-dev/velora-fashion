@extends('layout')
@section('title', 'All Products')

@section('content')
<div class="container my-5">

    <h2 class="section-title" data-aos="fade-up">All Products</h2>
    <p class="section-sub" data-aos="fade-up">Browse our full collection</p>

    <div class="d-flex flex-wrap gap-2 mb-3" data-aos="fade-up">
        <a href="{{ route('products.list') }}" class="btn btn-sm {{ !request('category_id') ? 'btn-coral' : 'btn-outline-secondary' }}">All</a>
        @foreach($categories as $category)
            <a href="{{ route('products.list', ['category_id' => $category->id]) }}" class="btn btn-sm {{ request('category_id') == $category->id ? 'btn-coral' : 'btn-outline-secondary' }}">{{ $category->name }}</a>
        @endforeach
    </div>

    @if($selectedCategory && $selectedCategory->subcategories->count() > 0)
    <div class="d-flex flex-wrap gap-2 mb-4" data-aos="fade-up">
        <a href="{{ route('products.list', ['category_id' => $selectedCategory->id]) }}" class="btn btn-sm {{ !request('subcategory_id') ? 'btn-dark' : 'btn-outline-dark' }}">All {{ $selectedCategory->name }}</a>
        @foreach($selectedCategory->subcategories as $sub)
            <a href="{{ route('products.list', ['category_id' => $selectedCategory->id, 'subcategory_id' => $sub->id]) }}" class="btn btn-sm {{ request('subcategory_id') == $sub->id ? 'btn-dark' : 'btn-outline-dark' }}">{{ $sub->name }}</a>
        @endforeach
    </div>
    @endif

    <div class="row">
        @forelse($products as $product)
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
        @empty
        <p class="text-muted">No products found.</p>
        @endforelse
    </div>

</div>
@endsection