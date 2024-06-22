<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $products_name = [
            'Roti Tawar',
            'Roti Tawar Coklat',
            'Roti Tawar Kupas',
            'Roti Tawar Pandan',
            'Roti Tawar Susu',
        ];
        
        return [
            
            // Nama Roti Sesuai dengan index yang di random
            'name' => $products_name[rand(0, 4)],

            // Harga Random dari 8000 sampai 25000
            'price' => rand(8000, 25000),

            // Deskripsi Random dalam Bahasa Indonesia
            'description' => "Rasakan kelezatan Sari Roti yang hadir untuk memenuhi kebutuhan gizi keluarga Indonesia. Dengan kualitas terbaik, Sari Roti hadir dalam berbagai varian rasa yang lezat dan bergizi. Sari Roti, roti sehat untuk keluarga Indonesia.",

            // Stok Random dari 0 sampai 100
            'stock' => rand(0, 100),

            // Photo sesuai dengan nama produk yang diinputkan dengan ekstensi yang sama dengan file yang diupload, misal Roti Tawar jadi roti_tawar.jpg tapi tidak perlu pakai faker
            'photo' => strtolower(str_replace(' ', '_', $products_name[rand(0, 4)]) . '.jpg'),

            // Category ID Random dari Category yang ada
            'category_id' => \App\Models\Category::inRandomOrder()->first()->id,
        ];
        
    }
}
