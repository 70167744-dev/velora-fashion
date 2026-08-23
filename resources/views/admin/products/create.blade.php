<!DOCTYPE html>
<html>
<head>
    <title>Add Product</title>
</head>
<body>
    <h1>Add New Product</h1>

    <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <label>Category:</label>
        <select name="category_id" required>
            <option value="">Select Category</option>
            @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
        <br><br>

        <label>Subcategory:</label>
        <select name="subcategory_id">
            <option value="">Select Subcategory</option>
            @foreach($subcategories as $sub)
                <option value="{{ $sub->id }}">{{ $sub->name }} ({{ $sub->category->name }})</option>
            @endforeach
        </select>
        <br><br>

        <label>Name:</label>
        <input type="text" name="name" required>
        <br><br>

        <label>Description:</label>
        <textarea name="description"></textarea>
        <br><br>

        <label>Price:</label>
        <input type="text" name="price" required>
        <br><br>

        <label>Stock:</label>
        <input type="text" name="stock" required>
        <br><br>

        <label>Image:</label>
        <input type="file" name="image">
        <br><br>

        <button type="submit">Save</button>
    </form>

    <a href="{{ route('admin.products.index') }}">Back</a>
</body>
</html>