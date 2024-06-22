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
        Schema::create('incomes', function (Blueprint $table) {
            $table->id();

            // Jumlah pemasukan
            $table->unsignedBigInteger('amount');

            // Tanggal & waktu pemasukan
            $table->timestamp('income_at');

            // Desciption
            $table->text('description')->nullable();

            // ID User yang melakukan pemasukan
            $table->foreignId('user_id')->constrained()->onDelete('cascade');

            // ID Order yang terkait dengan pemasukan
            $table->foreignId('order_id')->constrained()->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('incomes');
    }
};
