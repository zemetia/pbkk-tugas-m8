<?php

namespace App\Http\Module\Product\Presentation\Controller;

use App\Http\Module\Product\Application\Services\CreateProduct\CreateProductRequest;
use App\Http\Module\Product\Application\Services\CreateProduct\CreateProductService;

class ProductController
{
    public function __construct(
        private CreateProductService $create_product_service
    )
    {
    }

    public function createProduct(Request $request){
        $request = new CreateProductRequest(
            $request->input('nama'),
            $request->input('price'),
            $request->input('description'),
        );

        return $this->create_product_service->execute($request);
    }
}
