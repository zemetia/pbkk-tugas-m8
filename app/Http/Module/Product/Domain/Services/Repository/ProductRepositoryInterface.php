<?php

namespace App\Http\Module\Product\Domain\Services\Repository;

use App\Http\Module\Product\Domain\Model\Product;

interface ProductRepositoryInterface
{
    public function save(Product $product);

}
