<!DOCTYPE html>
<html>
<head>
    <title>Categories</title>
</head>
<body>
    <h1>Categories</h1>
    <a href="{{ route('admin.categories.create') }}">Add New Category</a>

    @if(session('success'))
        <p style="color:green">{{ session('success') }}</p>
    @endif

    <table border="1" cellpadding="10">
        <tr>
            <th>Name</th>
            <th>Slug</th>
            <th>Actions</th>
        </tr>
        @foreach($categories as $category)
        <tr>
            <td>{{ $category->name }}</td>
            <td>{{ $category->slug }}</td>
            <td>
                <a href="{{ route('admin.categories.edit', $category->id) }}">Edit</a>
                <form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST" style="display:inline">
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