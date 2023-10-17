@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Cart') }}</div>
                <div class="card-body">
                    @if(Session::has('status'))
                    <p class="alert alert-info">{{ Session::get('status') }}</p>
                    @endif
                    @foreach($carts as $cart)
                    <div class="card m-3">
                        <div class="card-body">{{ __('Cart') . ' ' . $loop->iteration }}
                            <div class="col-md-6 m-1">
                                <button type="button" class="btn btn-primary">
                                    <a class="nav-link active" aria-current="page" href="{{ route('cart.show', $cart->id) }}">
                                        {{ __('Details') }}
                                    </a>
                                </button>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    <form class="hidden" method="POST" action="{{ route('cart.create') }}">
                        @csrf
                        <button type="submit" class="btn btn-primary">
                            {{ __('Add Cart') }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection