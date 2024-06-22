<?php

namespace App\Http\Controllers\User;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserProductController extends Controller
{
    public function index(){

        $title = 'Produk';
        
        // Ambil semua data kategori
        $categories = Category::all();

        // Ambil semua data produk yang memiliki stok lebih dari 0 dari Model
        $products = Product::getAvailableProducts();
        
        return view('user.products.index', compact('title', 'products'));
    }

    public function show(Product $product){
        $title = 'Detail Produk';
        
        // Get All Categories
        $categories = Category::all();

        return view('user.products.show', compact('title', 'product', 'categories'));

    }
}
