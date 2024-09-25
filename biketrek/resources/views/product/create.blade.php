<!DOCTYPE html>
<html>
<head>
    <title>Create Product</title>
</head>
<body>
    <h1>Create Product</h1>

    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('products.save') }}" method="POST">
        @csrf

        <label for="name">Product Name:</label>
        <input type="text" name="name" id="name" required><br>

        <label for="description">Description:</label>
        <textarea name="description" id="description"></textarea><br>

        <label for="price">Price:</label>
        <input type="number" name="price" id="price" required><br>

        <label for="stock">Stock:</label>
        <input type="number" name="stock" id="stock" value="0" required><br>

        <button type="submit">Create Product</button>
    </form>
</body>
</html>
