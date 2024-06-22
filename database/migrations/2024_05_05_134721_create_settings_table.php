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
        Schema::create('settings', function (Blueprint $table) {
            $table->id();

            $table->text('site_name');
            $table->text('site_description');
            $table->text('logo');
            $table->text('email');
            $table->text('phone');
            $table->text('address');
            $table->text('maps')->nullable();

            // Social Media (Instagram, Tiktok, Facebook, Twitter, Youtube) with NULLABLE
            $table->text('instagram')->nullable();
            $table->text('tiktok')->nullable();
            $table->text('facebook')->nullable();
            $table->text('twitter')->nullable();
            $table->text('youtube')->nullable();

            // Payment Information with NULLABLE
            $table->text('payment')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
