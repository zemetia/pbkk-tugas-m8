<?php

namespace App\Http\Module\Product\Application\Services\CreateProduct;

class CreateProductRequest
{
    public function __construct(
        public string $nama,
        public float $price,
        public string $description,
    )
    {
    }
}
