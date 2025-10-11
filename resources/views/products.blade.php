<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Produk</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f4f4;
            padding: 20px;
        }

        .product {
            background: white;
            padding: 15px;
            margin-bottom: 15px;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        img {
            width: 200px;
            border-radius: 10px;
            margin-bottom: 10px;
        }
    </style>
</head>

<body>
    <h2>📦 Daftar Produk</h2>

    @foreach ($products as $product)
        <div class="product">
            @if ($product->image)
                <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}">
            @endif
            <h3>{{ $product->name }}</h3>
            <p><strong>Harga:</strong> {{ $product->price ?? '-' }}</p>
            <p>{{ $product->description }}</p>
            <small>Diupload oleh: {{ $product->user->name }}</small>
        </div>
    @endforeach

</body>

</html>
