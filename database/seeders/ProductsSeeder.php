<?php

namespace Database\Seeders;

use App\Models\product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        product::insert([
            [
                'name' => 'Product 1',
                'category_id' => 1,
                'description' => 'Product 1 description',
                'price' => 100.00,
                'image' => 'default.jpg',
                'created_at' => now(),
            ],
            [
                'name' => 'Product 2',
                'category_id' => 1,
                'description' => 'Product 2 description',
                'price' => 200.00,
                'image' => 'default.jpg',
                'created_at' => now(),
            ]
        ]);
    }
}
