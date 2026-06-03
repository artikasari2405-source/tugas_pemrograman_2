<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Product>
 */
class ProductFactory extends Factory
{
    protected $model = Product::class;

    public function definition(): array
    {
        return [
            'category_id' => Category::inRandomOrder()->first()->id,

            'kode_produk' => 'PRD' . fake()->unique()->numberBetween(1000, 9999),

            'nama_produk' => fake()->randomElement([
                'Laptop Asus',
                'Samsung Galaxy',
                'Kaos Polos',
                'Keripik Kentang',
                'Teh Botol',
                'Facial Wash',
                'Mouse Wireless',
                'Keyboard Gaming',
                'Headset Bluetooth',
                'Power Bank',
            ]),

            'harga' => fake()->numberBetween(10000, 5000000),

            'stok' => fake()->numberBetween(1, 100),
        ];
    }
}
