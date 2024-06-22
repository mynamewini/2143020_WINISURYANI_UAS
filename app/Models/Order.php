<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = 'orders';
    // Semua boleh diisi
    protected $guarded = [];

    // Relasi Many to Many ke model Product
    public function products()
    {
        return $this->belongsToMany(Product::class, 'orders', 'id', 'product_id')->withPivot('quantity', 'total');
    }

    // Ambil Data Produk berdasarkan ID Order
    public function getProductIdsAttribute()
    {
        return $this->products->pluck('id');
    }

}
