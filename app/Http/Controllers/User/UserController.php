<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $title = 'Dashboard';

        // Ambil Data Order yang memiliki accepted_status = accepted
        $orders = Order::where('user_id', auth()->user()->id)
            ->where('accepted_status', 'accepted')
            ->get();

        // Ambil Data Produk & Category
        $products = Product::all();
        $categories = Category::all();

        // Jumlahkan Total order yang memiliki accepted_status = accepted
        $totalOrder = Order::where('user_id', auth()->user()->id)
            ->where('accepted_status', 'accepted')
            ->sum('total');

        // Ambil data product_id yang paling banyak dibeli oleh user
        $mostProduct = Order::where('user_id', auth()->user()->id)
            ->where('accepted_status', 'accepted')
            ->groupBy('product_id')
            ->selectRaw('product_id, count(*) as total')
            ->orderBy('total', 'desc')
            ->first();

        // Memastikan bahwa $mostProduct bukan null sebelum mengakses properti product_id
        if ($mostProduct) {
            $mostProductId = $mostProduct->product_id;
        } else {
            $mostProductId = null;
        }

        // Tamplikan View
        return view('user.dashboard', compact('title', 'orders', 'products', 'categories', 'totalOrder', 'mostProductId'));
    }
}
