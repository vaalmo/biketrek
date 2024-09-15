<h1>Editar producto</h1>
<form method="POST" action="{{ route('products.update', $product->id) }}">
    @csrf
    @method('PUT')
    <label for="name">Nombre:</label>
    <input type="text" id="name" name="name" value="{{ $product->name }}"><br><br>
    <label for="description">Descripción:</label>
    <textarea id="description" name="description">{{ $product->description }}</textarea><br><br>
    <label for="price">Precio:</label>
    <input type="number" id="price" name="price" value="{{ $product->price }}"><br><br>
    <label for="stock">Stock:</label>
    <input type="number" id="stock" name="stock" value="{{ $product->stock }}"><br><br>
    <button type="submit">Actualizar</button>
</form>