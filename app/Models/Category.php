<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    //
    use HasFactory;
    // If your table name doesn't follow Laravel's convention, specify it here
    // 
    public function products()
    {
        return $this->hasMany(Product::class);
    }
    protected $fillable = ['name', 'image'];
}