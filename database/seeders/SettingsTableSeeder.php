<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create a default settings
        DB::table('settings')->insert([
            'site_name'         => 'Rotiku',
            'site_description'  => 'Dari roti tradisional hingga kreasi modern, setiap produk di Toko Rotiku dibuat dengan teliti menggunakan bahan-bahan berkualitas tinggi dan proses produksi yang terjaga kebersihannya.',
            'logo'              => 'logo.png',
            'email'             => 'cs@rotiku.app',
            'phone'             => '081234567890',
            'address'           => 'Jl. Raya No. 123, Jakarta',
            'maps'              => 'https://www.google.com/maps?q=rotiku',
            'facebook'          => 'https://www.facebook.com/rotiku',
            'instagram'         => 'https://www.instagram.com/rotiku',
            'twitter'           => 'https://www.twitter.com/rotiku',
            'youtube'           => 'https://www.youtube.com/rotiku',
            'tiktok'            => 'https://www.tiktok.com/@rotiku',
            'payment'           => 'Untuk melakukan pembayaran, silakan transfer ke rekening BCA 1234567890 a/n Rotiku. Konfirmasi pembayaran dapat dilakukan melalui WhatsApp ke nomor 081234567890.',

            // Timestamps
            'created_at'        => now(),
            'updated_at'        => now(),
        ]);
    }
}
