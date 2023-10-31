<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Produk>
 */
class ProdukFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'jenisproduk_id' => mt_rand(1, 20),
            'users_id' => 1,
            'statusenabled' => true,
            'nama' => Str::random(10),
            'stok' => mt_rand(20, 100),
            'harga' => mt_rand(24000, 99999),
            'hargaasli' => mt_rand(24000, 99999),
            'gambar1' => fake()->imageUrl($width=400, $height=400),
            'gambar2' => fake()->imageUrl($width=400, $height=400),
            'gambar3' => fake()->imageUrl($width=400, $height=400),
            'gambar4' => fake()->imageUrl($width=400, $height=400),
            'bundle' => null
        ];
    }
}
