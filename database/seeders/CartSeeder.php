<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Cart;
use Illuminate\Database\Seeder;

class CartSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Add some items to cart for user_id 1
        for ($i = 1; $i <= 3; $i++) {
            Cart::create([
                'user_id' => 1,
                'product_id' => $i,
                'quantity' => rand(1, 3)
            ]);
        }
    }
}
