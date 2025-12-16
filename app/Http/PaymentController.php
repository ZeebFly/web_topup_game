<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Services\DigiflazzService;

class PaymentController extends Controller
{
    public function callback(Request $request)
    {
        $data = $request->all();

        // Cek status pembayaran
        $trx = Transaction::where('invoice', $data['merchant_ref'])->first();
        if(!$trx) return response()->json(['error' => 'Transaction not found'], 404);

        $trx->payment_status = $data['status']; // success / pending / failed
        $trx->save();

        // Jika sukses, lakukan topup via Digiflazz
        if($data['status'] == 'PAID'){
            $digiflazz = new DigiflazzService();
            $res = $digiflazz->topup($trx->product->sku, $trx->user_id);
            $trx->topup_status = $res['data']['status'] ?? 'failed';
            $trx->save();
        }

        return response()->json(['success'=>true]);
    }
}
