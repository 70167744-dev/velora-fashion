@extends('layout')
@section('title', 'Subcategories')

@section('content')
<div class="container my-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Subcategories</h2>
        <a href="{{ route('admin.subcategories.create') }}" class="btn btn-coral">+ Add Subcategory</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Category</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($subcategories as $sub)
            <tr>
                <td>{{ $sub->name }}</td>
                <td>{{ $sub->category->name ?? 'N/A' }}</td>
                <td>
                    <a href="{{ route('admin.subcategories.edit', $sub->id) }}" class="btn btn-sm btn-primary">Edit</a>
                    <form action="{{ route('admin.subcategories.destroy', $sub->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Delete this subcategory?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection