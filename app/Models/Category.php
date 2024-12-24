<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    //
    use HasFactory;
    // If your table name doesn't follow Laravel's convention, specify it here
    // 
    protected $fillable = ['name', 'image'];
}