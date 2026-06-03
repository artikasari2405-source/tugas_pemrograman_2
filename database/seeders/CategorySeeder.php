<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        Category::create([
            'kode_kategori' => 'KTG001',
            'nama_kategori' => 'Elektronik',
            'deskripsi' => 'Produk elektronik',
        ]);

        Category::create([
            'kode_kategori' => 'KTG002',
            'nama_kategori' => 'Makanan',
            'deskripsi' => 'Produk makanan',
        ]);

        Category::create([
            'kode_kategori' => 'KTG003',
            'nama_kategori' => 'Minuman',
            'deskripsi' => 'Produk minuman',
        ]);

        Category::create([
            'kode_kategori' => 'KTG004',
            'nama_kategori' => 'Fashion',
            'deskripsi' => 'Produk fashion',
        ]);

        Category::create([
            'kode_kategori' => 'KTG005',
            'nama_kategori' => 'Smartphone',
            'deskripsi' => 'Produk smartphone',
        ]);

        Category::create([
            'kode_kategori' => 'KTG006',
            'nama_kategori' => 'Kecantikan',
            'deskripsi' => 'Produk kecantikan',
        ]);
    }
}
