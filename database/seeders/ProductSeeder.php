<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        for ($i = 1; $i <= 5; $i++) {
            $product = Product::create([
                'name' => "Product $i",
                'price' => rand(100, 500)
            ]);

            // Add 3 fake images per product
            for ($j = 1; $j <= 3; $j++) {
                ProductImage::create([
                    'product_id' => $product->id,
                    'image_path' => "products/product{$i}_img{$j}.jpg"
                ]);
            }
        }
    }
}
