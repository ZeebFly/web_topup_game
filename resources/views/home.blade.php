<!DOCTYPE html>
<html>
<head>
    <title>Web Top Up Game</title>
</head>
<body>
    <h1>Pilih Game & Produk</h1>

    <form method="POST" action="/order">
        @csrf
        <input type="text" name="user_id" placeholder="User ID" required>
        <select name="product_id" required>
            @foreach($games as $game)
                <optgroup label="{{ $game->name }}">
                    @foreach($game->products as $product)
                        <option value="{{ $product->id }}">{{ $product->name }} - Rp{{ $product->price }}</option>
                    @endforeach
                </optgroup>
            @endforeach
        </select>
        <button type="submit">Top Up</button>
    </form>
</body>
</html>
