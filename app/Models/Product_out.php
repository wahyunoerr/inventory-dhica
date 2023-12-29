<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product_out extends Model
{
    use HasFactory;
    protected $table = 'product_outs';
    protected $fillable = [
        'product_id',
        'qty',
        'date',
        'created_at'
    ];

    function product()
    {
        return $this->hasOne(Product::class, 'id', 'product_id');
    }
}
