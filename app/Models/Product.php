<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'sku', 'slug', 'regular_price', 'sale_price', 'mrp', 'description', 
        'category_id', 'brand_id', 'seller_name', 'status', 'image', 'model_no', 
        'manufacture', 'expiry_date', 'modify_date', 'tax_type', 'featured_product', 
        'discount_type', 'discount_value','rating','new_arrival','top_selling', 
        'seller_of_the_week','flash_sale', 'sale_start_time', 'sale_end_time',
    ];

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}

