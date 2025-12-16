<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = [
        'invoice', 'user_id', 'product_id', 'payment_status', 'topup_status'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
