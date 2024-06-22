<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $fillable = ['name', 'price', 'description', 'stock', 'photo', 'category_id'];

    // Method untuk mendapatkan data Produk yang memiliki stok lebih dari 0
    public static function getAvailableProducts(){
        return self::where('stock', '>', 0)->get();
    }

}
