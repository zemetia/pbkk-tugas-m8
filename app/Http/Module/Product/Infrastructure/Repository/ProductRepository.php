<?php

namespace App\Http\Module\Product\Infrastructure\Repository;

use App\Http\Module\Product\Domain\Model\Product;
use App\Http\Module\Product\Domain\Services\Repository\ProductRepositoryInterface;

class ProductRepository implements ProductRepositoryInterface
{
    public function save(Product $product)
    {
        DB::table('products')->upsert(
            [
                'nama' => $product->nama,
                'price' => $product->price,
                'description' => $product->description,
            ]
        );
    }
}
