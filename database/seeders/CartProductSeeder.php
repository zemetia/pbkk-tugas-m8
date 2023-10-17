<?php

namespace Database\Seeders;

use App\Models\CartProduct;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CartProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $pivots = [[
            'cart_id' => 1,
            'product_id' => 1
        ], [
            'cart_id' => 1,
            'product_id' => 2
        ]];

        foreach($pivots as $pivot){
            CartProduct::create($pivot);
        }
    }
}
