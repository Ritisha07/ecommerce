<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $table = 'cart'; // Ensure it matches your database table name

    protected $fillable = [
        //'user_id', // Remove this if you don't need it
        'product_id',
        'name',
        'image',
        'sale_price',
        'quantity',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
