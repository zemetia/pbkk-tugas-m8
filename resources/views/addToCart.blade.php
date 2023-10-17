@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Product') }}</div>
                <div class="card-body">
                    <form class="hidden" method="POST" action="{{ route('cart.add.submit', $cart_id) }}">
                        @csrf
                        @method('PUT')
                        @foreach($products as $product)
                        <div class="card m-3">
                            <div class="card-body">
                                <div class="col-md-6 m-1">
                                    <span class="col-md-4 col-form-span text-md-end">{{ $product->description }}</span>
                                    <span class="col-md-4 col-form-span text-md-end">{{'RP '. $product->price }}</span>
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault" name="{{ $product->id }}">
                                        <label class="form-check-label" for="flexSwitchCheckDefault">Add to cart</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        <button type="submit" class="btn btn-primary">
                            {{ __('Update Cart') }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection