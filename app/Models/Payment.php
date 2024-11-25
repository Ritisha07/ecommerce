<?php

nnamespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'total_amount',
        'total_quantity',
        'service_charge',
        'delivery_charge',
        'grand_total',
    ];
}