<!DOCTYPE html>
<html>
<head>
    <title>Edit Product</title>
</head>
<body>
    <h1>Edit Product</h1>

    <form action="{{ route('admin.products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <label>Category:</label>
        <select name="category_id" required>
            @foreach($categories as $category)
                <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>
                    {{ $category->name }}
                </option>
            @endforeach
        </select>
        <br><br>

        <label>Subcategory:</label>
        <select name="subcategory_id">
            <option value="">Select Subcategory</option>
            @foreach($subcategories as $sub)
                <option value="{{ $sub->id }}" {{ $product->subcategory_id == $sub->id ? 'selected' : '' }}>
                    {{ $sub->name }} ({{ $sub->category->name }})
                </option>
            @endforeach
        </select>
        <br><br>

        <label>Name:</label>
        <input type="text" name="name" value="{{ $product->name }}" required>
        <br><br>

        <label>Description:</label>
        <textarea name="description">{{ $product->description }}</textarea>
        <br><br>

        <label>Price:</label>
        <input type="number" step="0.01" name="price" value="{{ $product->price }}" required>
        <br><br>

        <label>Stock:</label>
        <input type="number" name="stock" value="{{ $product->stock }}" required>
        <br><br>

        <label>Current Image:</label><br>
        @if($product->image)
            <img src="{{ asset('storage/' . $product->image) }}" width="100">
        @else
            No Image
        @endif
        <br><br>

        <label>Change Image:</label>
        <input type="file" name="image">
        <br><br>

        <button type="submit">Update</button>
    </form>

    <a href="{{ route('admin.products.index') }}">Back</a>
</body>