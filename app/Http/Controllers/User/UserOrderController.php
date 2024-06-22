<?php

namespace App\Http\Controllers\User;

use App\Models\Order;
use App\Models\Product;
use App\Models\Setting;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserOrderController extends Controller
{

    // Menampilkan List Order berdasarkan ID User
    public function index()
    {
        $title = 'Daftar Pesanan';
        $orders = Order::where('user_id', auth()->id())->get();

        return view('user.orders.index', compact('title', 'orders'));
    }

    // Menampilkan Form Order 
    public function create(string $id)
    {
        $title      = 'Formulir Pesanan';
        $product    = Product::findOrFail($id);
        $categories = Category::all();

        return view('user.orders.create', compact('title', 'product', 'categories'));
    }
    
    // Menyimpan Order
    public function store(Request $request)
    {
        $request->validate([
            'name'         => 'required',
            'phone'        => 'required',
            'address'      => 'required',
            'product_id'    => 'required',
            'quantity'      => 'required',
            'total'         => 'required',
        ]);

        // ID Order ( Year - Time - ID_USER - ID_PRODUCT - Random Number )
        $id = date('Y') . time() . auth()->id() . $request->product_id . rand(100, 999);

        // Simpan Order
        Order::create([
            'id'              => $id,
            'name'            => $request->name,
            'phone'           => $request->phone,
            'address'         => $request->address,
            'type'            => 'satuan',
            'user_id'         => auth()->id(),
            'product_id'      => $request->product_id,
            'quantity'        => $request->quantity,
            'total'           => $request->total,
            'accepted_status' => 'pending',
            'payment_status'  => 'unpaid',
            'customer_notes'     => $request->customer_notes,
            'admin_notes'        => NULL,
        ]);

        $id_user = auth()->id();
        
        return redirect()->route('user.orders.index', $id_user)->with('success', 'Order Berhasil Dibuat !');
    }

    // Menampilkan Detail Order berdasarkan ID User dan ID Order
    public function show(string $user, string $order)
    {
        $title = 'Detail Pesanan';
        
        // Cek apakah order milik user
        $order = Order::where('user_id', $user)->where('id', $order)->firstOrFail();

        // Ambil Data Tata Cara Pembayaran di Tabel Settings
        $settings = Setting::all()->first();

        if ($order->user_id != auth()->id()) {
            return redirect()->route('user.orders.index', $user)->with('error', 'Anda tidak memiliki akses ke halaman ini !');
        } else {
            return view('user.orders.show', compact('title', 'order', 'settings'));
        }
    }

    // Method Update
    public function update(Request $request, string $user, Order $order)
    {
        $request->validate([
            'payment_proof' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $payment_proof = $request->file('payment_proof');
        $payment_proof_name = time() . '.' . $payment_proof->extension();
        $payment_proof->storeAs('public/orders/payment_proofs', $payment_proof_name);

        // Cek apakah order ada dan milik user
        $user = auth()->user();
        $order = Order::where('user_id', $user->id)->where('id', $order->id)->firstOrFail();

        if ($order->user_id != auth()->id()) {
            return redirect()->route('user.orders.index', $user->id)->with('error', 'Anda tidak memiliki akses ke halaman ini !');
        } else {
            $order->update([
                'payment_proof' => $payment_proof_name,
                'payment_status'        => 'pending'
            ]);

            return redirect()->route('user.orders.index', $user->id)->with('success', 'Bukti Pembayaran Berhasil Diupload !');
        }
    }

    // Completed Order
    public function completed(Request $request, $id)
    {
        // Cek data pesanan berdasarkan ID Order 
        $order = Order::where('id', $id)->first();

        $order->update([
            'accepted_status' => 'accepted',
        ]);

        return redirect()->back()->with('success', 'Pesanan berhasil diselesaikan.');
    }
}
