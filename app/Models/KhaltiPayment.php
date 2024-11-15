<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class KhaltiPayment extends Model
{
    //use HasFactory;

    protected $fillable = [
        'purchase_order_id',
        'purchase_order_name',
        'amount',
        'return_url',
        'payment_url',
    ];
}