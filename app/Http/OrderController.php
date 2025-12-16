<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        $trx = Transaction::create([
            'invoice' => 'INV-' . time(),
            'user_id' => $request->user_id,
            'product_id' => $request->product_id,
            'payment_status' => 'pending'
        ]);

        return redirect()->route('order.show', $trx->id);
    }

    public function show($id)
    {
        $trx = Transaction::findOrFail($id);
        return view('order', compact('trx'));
    }
}
