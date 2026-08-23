<!DOCTYPE html>
<html>
<head>
    <title>Add Category</title>
</head>
<body>
    <h1>Add New Category</h1>
    <form action="{{ route('admin.categories.store') }}" method="POST">
        @csrf
        <label>Name:</label>
        <input type="text" name="name" required>
        <button type="submit">Save</button>
    </form>
    <a href="{{ route('admin.categories.index') }}">Back</a>
</body>
</html>