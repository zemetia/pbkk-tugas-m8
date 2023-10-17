<?php

namespace App\Http\Controllers;

use App\Http\Module\Product\Domain\Model\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
        $products = Product::all();
        return view('product', [
            'products' => $products
        ]);
    }
}
