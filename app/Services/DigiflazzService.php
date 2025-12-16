<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class DigiflazzService
{
    protected $username;
    protected $apiKey;
    protected $baseUrl = 'https://api.digiflazz.com/v1';

    public function __construct()
    {
        $this->username = env('DIGIFLAZZ_USERNAME');
        $this->apiKey = env('DIGIFLAZZ_API_KEY');
    }

    public function topup($sku, $target)
    {
        $response = Http::get($this->baseUrl, [
            'username' => $this->username,
            'key' => $this->apiKey,
            'cmd' => 'topup',
            'ref_id' => 'TRX-' . time(),
            'hp' => $target,
            'sku' => $sku
        ]);

        return $response->json();
    }
}
