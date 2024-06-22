<?php

namespace App\Http\Controllers\Operator;

use App\Models\Product;
use App\Models\Category;
use App\Models\Order;
use App\Models\Income;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OperatorController extends Controller
{
    public function index()
    {
        $title      = 'Operator Dashboard';
        $products   = Product::all();
        $categories = Category::all();
        $orders     = Order::all();

        // Jumlah seluruh quantity produk pada tabel order
        $totalQuantity = Order::sum('quantity');

        // Menghitung total pendapatan
        $totalIncome = Income::sum('amount');

        // Jumlah Order per-bulan
        $ordersPerMonth = Order::selectRaw('MONTH(created_at) as month, COUNT(id) as total')
        ->groupBy('month')
        ->get();

        // Jumlah user yang memiliki role = "user"
        $customers = User::where('role', 'user')->count();

        // Pesanan terbaru
        $latestOrders = Order::latest()->take(5)->get();

        $data = [
            'title'         => $title,
            'categories'    => $categories,
            'products'      => $products,
            'orders'        => $orders,
            'totalQuantity' => $totalQuantity,
            'totalIncome'   => $totalIncome,
            'ordersPerMonth' => $ordersPerMonth,
            'customers'     => $customers,
            'latestOrders'  => $latestOrders
        ];

        // Return view dengan data
        return view('operator.dashboard', $data);
    }
}
