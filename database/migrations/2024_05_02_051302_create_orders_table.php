<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            
            // ID 
            $table->id();

            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('product_id')->constrained()->onDelete('cascade');

            // Detail Penerima
            $table->string('name');     // Nama Penerima
            $table->string('phone');    // Nomor Telepon Penerima
            $table->text('address');    // Alamat Penerima

            // Detail Pesanan
            $table->string('type')->nullable();      // Tipe Pesanan
            $table->integer('quantity');             // Jumlah Pesanan
            $table->decimal('total', 10, 0);         // Total Harga Pesanan
            $table->text('customer_notes')->nullable(); // Catatan Pelanggan
            $table->text('admin_notes')->nullable();    // Catatan Admin

            // Status Pesanan oleh Admin
            $table->enum('shipping_status', ['pending', 'processing', 'shipping','completed', 'declined'])->default('pending');
            
            // Status Pesanan oleh User
            $table->enum('accepted_status', ['pending', 'accepted', 'declined'])->default('pending');

            // Bukti Pembayaran & Status Pembayaran
            $table->string('payment_proof')->nullable();
            $table->enum('payment_status', ['pending', 'unpaid', 'paid', 'failed'])->default('unpaid');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
