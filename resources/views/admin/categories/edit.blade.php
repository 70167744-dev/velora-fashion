<!DOCTYPE html>
<html>
<head>
    <title>Edit Category</title>
</head>
<body>
    <h1>Edit Category</h1>
    <form action="{{ route('admin.categories.update', $category->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label>Name:</label>
        <input type="text" name="name" value="{{ $category->name }}" required>
        <button type="submit">Update</button>
    </form>
    <a href="{{ route('admin.categories.index') }}">Back</a>
</body>
</html>