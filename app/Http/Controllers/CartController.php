<?php

namespace App\Http\Controllers;

use App\Http\Module\Product\Domain\Model\Product;
use App\Models\Cart;
use App\Models\CartProduct;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index(){
        $user_id = Auth::user()->id;
        $carts = User::find($user_id)->cart;
        return view('carts', [
            'carts' => $carts
        ]);
    }

    public function show(String $id){
        $cart = Cart::find($id);
        $price = 0;
        if($cart->product->isNotEmpty()){
            foreach($cart->product as $product){
                $price += $product->price;
            }
        }
        $price = number_format($price, 2, '.', '');
        return view('cart', [
            'cart' => $cart,
            'products' => $cart->product,
            'price' => $price
        ]);
    }

    public function create(){
        $cart = [
            'user_id' => Auth::user()->id
        ];
        Cart::create($cart);
        return redirect()->back()->with('status', 'A new cart has been created');
    }

    public function add(String $id){
        $products = Product::all();
        $cart = Cart::find($id);
        $unsellected_product = [];
        foreach($products as $product){
            if(!$cart->product->contains($product)){
                array_push($unsellected_product, $product);
            }
        }
        return view('addToCart', [
            'cart_id' => $id,
            'products' => $unsellected_product
        ]);
    }

    public function update(Request $request, String $id){
        foreach($request->all() as $key => $value){
            if(is_string($key)) continue;
            CartProduct::create([
                'cart_id' => $id,
                'product_id' => $key
            ]);
        }
        return redirect('/cart/' . $id)->with('status', 'Cart has been updated');
    }

    public function remove(String $cart_id, String $product_id){
        $pivot = CartProduct::where([
            'cart_id' => $cart_id,
            'product_id' => $product_id
        ]);
        $pivot->delete();
        return redirect('/cart/' . $cart_id)->with('status', 'Cart has been updated');
    }

    public function destroy(String $id){
        $cart = Cart::find($id);
        $cart->delete();
        return redirect('carts')->with('status', 'The cart has been deleted');
    }
}
