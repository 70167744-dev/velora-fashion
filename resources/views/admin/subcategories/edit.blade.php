@extends('layout')
@section('title', 'Edit Subcategory')

@section('content')
<div class="container my-5">
    <h2 class="mb-4">Edit Subcategory</h2>

    <form action="{{ route('admin.subcategories.update', $subcategory->id) }}" method="POST" class="w-50">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label class="form-label">Category</label>
            <select name="category_id" class="form-control" required>
                @foreach($categories as $cat)
                    <option value="{{ $cat->id }}" {{ $subcategory->category_id == $cat->id ? 'selected' : '' }}>{{ $cat->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Subcategory Name</label>
            <input type="text" name="name" class="form-control" value="{{ $subcategory->name }}" required>
        </div>
        <button type="submit" class="btn btn-coral">Update</button>
        <a href="{{ route('admin.subcategories.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection