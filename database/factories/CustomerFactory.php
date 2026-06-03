<?php

namespace Database\Factories;

use App\Models\Customer;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Customer>
 */
class CustomerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama_customer' => fake()->name(),
            'alamat' => fake()->address(),
            'nomor_telepon' => fake()->phoneNumber(),
            'umur' => fake()->numberBetween(17, 60),
            'status' => fake()->randomElement(['Member','Non Member']),
        ];
    }
}
