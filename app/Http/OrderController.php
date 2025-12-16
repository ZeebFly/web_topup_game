use App\Services\TripayService;

public function store(Request $request)
{
    $trx = Transaction::create([
        'invoice' => 'INV-' . time(),
        'user_id' => $request->user_id,
        'product_id' => $request->product_id,
        'payment_status' => 'pending'
    ]);

    // Buat QRIS
    $tripay = new TripayService();
    $payment = $tripay->createPayment($trx->invoice, $trx->product->price);

    return redirect($payment['data']['checkout_url']);
}    
