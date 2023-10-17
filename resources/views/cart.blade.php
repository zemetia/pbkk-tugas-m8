@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Cart Details') }}</div>
                <div class="card-body">
                    @if(Session::has('status'))
                    <p class="alert alert-info">{{ Session::get('status') }}</p>
                    @endif
                    @if($products->isEmpty())
                    <p class="alert alert-info">This cart has no product.</p>
                    @else
                    @foreach($products as $product)
                    <div class="card m-3">
                        <div class="card-body">{{ __('Product') . ' ' . $loop->iteration }}
                            <div class="col-md-6 m-1">
                                <span class="col-md-4 col-form-span text-md-end">{{ $product->description }}</span>
                                <span class="col-md-4 col-form-span text-md-end">{{'RP '. $product->price }}</span>
                                <form class="hidden" method="POST" action="{{ route('cart.product.remove', ['cart_id' => $cart->id, 'product_id' => $product->id]) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">
                                        {{ __('Remove') }}
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @endif
                    <div class="card-body">
                        <span class="col-md-4 col-form-span text-md-end">{{'Total Price is: RP '. $price }}</span>
                    </div>
                    <button type="button" class="btn btn-primary">
                        <a class="nav-link active" aria-current="page" href="{{ route('cart.add', $cart->id) }}">
                            {{ __('Add Product To Cart') }}
                        </a>
                    </button>
                    <form class="hidden" method="POST" action="{{ route('cart.delete', $cart->id) }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">
                            {{ __('Delete') }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection