@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Product') }}</div>
                <div class="card-body">
                    @foreach($products as $product)
                    <div class="card m-3">
                        <div class="card-body">{{ __('Product') . ' ' . $loop->iteration }}
                            <div class="col-md-6 m-1">
                                <span class="col-md-4 col-form-span text-md-end">{{ $product->description }}</span>
                                <span class="col-md-4 col-form-span text-md-end">{{'RP '. $product->price }}</span>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection