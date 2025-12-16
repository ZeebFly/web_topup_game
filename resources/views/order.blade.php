<!DOCTYPE html>
<html>
<head>
    <title>Detail Order</title>
</head>
<body>
    <h1>Order Berhasil</h1>

    <p>Invoice: {{ $trx->invoice }}</p>
    <p>User ID: {{ $trx->user_id }}</p>
    <p>Produk: {{ $trx->product->name }}</p>
    <p>Harga: Rp{{ $trx->product->price }}</p>
    <p>Status Pembayaran: {{ $trx->payment_status }}</p>
    <p>Status Top Up: {{ $trx->topup_status ?? 'Belum' }}</p>
</body>
</html>
