<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $fillable = [
        'name',
        'category_id',
        'harga',
        'image',
        'stock'
    ];

    function category()
    {
        return $this->belongsTo(Category::class);
    }

    function product_in()
    {
        return $this->belongsTo(Product_in::class);
    }
}
