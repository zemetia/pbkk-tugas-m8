<?php

namespace App\Http\Module\Product\Application\Services\CreateProduct;

use App\Http\Module\Product\Domain\Model\Product;
use App\Http\Module\Product\Infrastructure\Repository\ProductRepository;

class CreateProductService
{

    public function __construct(
        private ProductRepository $product_repository
    ) {
    }

    public function execute(CreateProductRequest $request)
    {
        $product = new Product(
            $request->nama,
            $request->price,
            $request->description,
        );

        $this->product_repository->save($product);
    }
}
