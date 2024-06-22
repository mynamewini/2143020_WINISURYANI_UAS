<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use App\Models\Income;
use Illuminate\Http\Request;

class AdminOrderController extends Controller
{
    // Halaman Daftar Pesanan
    public function index()
    {
        $title  = 'Daftar Pesanan';

        // Tampilkan Data Order berdasarkan created_at terbaru dan hanya yang memiliki accepted_status = accepted
        $orders = Order::where('accepted_status', 'pending')->orderBy('created_at', 'DESC')->get();

        return view('admin.orders.index', compact('title', 'orders'));
    }

    // Halaman Detail Pesanan
    public function show($id)
    {
        $title  = 'Detail Pesanan';
        $order  = Order::findOrFail($id);

        // Ambil nilai product_id dari data order di atas
        $product = $order->products;

        return view('admin.orders.show', compact('title', 'order', 'product'));
    }


    // Proses Konfirmasi Pembayaran
    public function confirmPayment(Request $request, $id)
    {
        // Cek data pesanan berdasarkan ID Order 
        $order = Order::where('id', $id)->first();

        $order->update([
            'payment_status' => 'paid',
        ]);

        // Ambil Field "total" dari data order di atas
        $total = $order->total;

        // Simpan data pemasukan ke dalam tabel incomes
        Income::create([
            'amount'        => $total,
            'income_at'     => now(),
            'description'   => 'Pembayaran Order ID: ' . $order->id,
            'user_id'       => $order->user_id,
            'order_id'      => $order->id,
        ]);

        return redirect()->back()->with('success', 'Konfirmasi pembayaran berhasil.');
    }

    // Ubah status pengirman
    public function updateShipping(Request $request, $id)
    {
        // Cek data pesanan berdasarkan ID Order 
        $order = Order::where('id', $id)->first();

        $order->update([
            'shipping_status' => $request->shipping_status,
        ]);

        if ($request->shipping_status == 'shipping') {
            // Ambil Data Quantity dari Order
            $quantity = $order->quantity;

            // Ambil Data Produk berdasarkan ID Produk
            $product = Product::where('id', $order->product_id)->first();

            // Update Stok Produk
            $productStok = $product->stock - $quantity;

            $product->update([
                'stock' => $productStok,
            ]);
        }

        return redirect()->back()->with('success', 'Status pengiriman berhasil diubah.');
    }

    // Riwayat Pesanan
    public function history()
    {
        $title  = 'Riwayat Pesanan';
        $orders = Order::where('accepted_status', 'accepted')->orderBy('created_at', 'DESC')->get();

        return view('admin.orders.history', compact('title', 'orders'));
    }

    // updateAdminNotes
    public function updateAdminNotes(Request $request, $id)
    {
        // Cek data pesanan berdasarkan ID Order 
        $order = Order::where('id', $id)->first();

        $order->update([
            'admin_notes' => $request->admin_notes,
        ]);

        return redirect()->back()->with('success', 'Catatan Admin berhasil diubah.');
    }
}
