@extends('layout')
@section('title', 'Add Subcategory')

@section('content')
<div class="container my-5">
    <h2 class="mb-4">Add Subcategory</h2>

    <form action="{{ route('admin.subcategories.store') }}" method="POST" class="w-50">
        @csrf
        <div class="mb-3">
            <label class="form-label">Category</label>
            <select name="category_id" class="form-control" required>
                <option value="">Select Category</option>
                @foreach($categories as $cat)
                    <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Subcategory Name</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-coral">Save</button>
        <a href="{{ route('admin.subcategories.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection