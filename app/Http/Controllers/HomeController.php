<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\User;
use App\Models\Order;
use App\Models\Setting;

class HomeController extends Controller
{
    // Home Page 
    public function index()
    {
        // Get Data Product Limit 6
        $products   = Product::limit(6)->get();

        $categories = Category::all();
        $users      = User::all();
        $orders     = Order::all();
        $settings   = Setting::all()->first();

        return view('home.index', compact('products', 'categories', 'users', 'orders', 'settings'));
    }
}
