<!DOCTYPE html>
<html>
<head>
    <title>Products</title>
</head>
<body>
    <h1>Products</h1>
    <a href="{{ route('admin.products.create') }}">Add New Product</a>

    @if(session('success'))
        <p style="color:green">{{ session('success') }}</p>
    @endif

    <table border="1" cellpadding="10">
        <tr>
            <th>Image</th>
            <th>Name</th>
            <th>Category</th>
            <th>Price</th>
            <th>Stock</th>
            <th>Actions</th>
        </tr>
        @foreach($products as $product)
        <tr>
            <td>
                @if($product->image)
                    <img src="{{ asset('storage/' . $product->image) }}" width="60">
                @else
                    No Image
                @endif
            </td>
            <td>{{ $product->name }}</td>
            <td>{{ $product->category->name ?? 'N/A' }}</td>
            <td>{{ $product->price }}</td>
            <td>{{ $product->stock }}</td>
            <td>
                <a href="{{ route('admin.products.edit', $product->id) }}">Edit</a>
                <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST" style="display:inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Are you sure?')">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</body>
</html>