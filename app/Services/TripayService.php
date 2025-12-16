<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class TripayService
{
    protected $apiKey;
    protected $privateKey;
    protected $merchantCode;
    protected $baseUrl = 'https://tripay.co.id/api-sandbox';

    public function __construct()
    {
        $this->apiKey = env('TRIPAY_API_KEY');
        $this->privateKey = env('TRIPAY_PRIVATE_KEY');
        $this->merchantCode = env('TRIPAY_MERCHANT_CODE');
    }

    public function createPayment($invoice, $amount)
    {
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $this->apiKey
        ])->post($this->baseUrl . '/transaction/create', [
            'method' => 'QRIS',
            'merchant_ref' => $invoice,
            'amount' => $amount,
            'customer_name' => 'Customer',
            'customer_email' => 'customer@email.com',
            'customer_phone' => '081234567890',
            'order_items' => [
                [
                    'name' => 'Top Up Game',
                    'price' => $amount,
                    'quantity' => 1
                ]
            ],
            'callback_url' => url('/tripay/callback'),
            'return_url' => url('/order/success')
        ]);

        return $response->json();
    }
}
