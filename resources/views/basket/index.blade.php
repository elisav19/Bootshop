@extends('layouts/default')

@section('title', 'Electro - HTML Ecommerce Template')

@section('content')
<!-- BREADCRUMB -->
<div id="breadcrumb" class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <div class="col-md-12">
                <h3 class="breadcrumb-header">Checkout</h3>
                <ul class="breadcrumb-tree">
                    <li><a href="#">Home</a></li>
                    <li class="active">Checkout</li>
                </ul>
            </div>
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /BREADCRUMB -->

<!-- SECTION -->
<div class="section">
    <!-- container -->
    <div class="container bg-white rounded-top mt-5" id="zero-pad">
        @if (isset($order))
            <div class="shopping-cart">
                @foreach ($order->products as $product)
                <div class="item d-flex">
                    <div class="image">
                        <img src="/img/shop03.png" alt="" />
                    </div>

                    <div class="description">
                        <span>{{ $product->name }}</span>
                    </div>

                    <div class="quantity d-flex">
                        <form action="{{ route('basket-remove', $product) }}" method="post">
                            <button class="minus-btn" type="submit" name="button">
                                <img src="/img/minus.svg" alt="" />
                            </button>
                            @csrf
                        </form>
                        <input type="text" name="name" value="{{ $product->pivot->count }}">
                        
                        <form action="{{ route('basket-add', $product) }}" method="post">
                            <button class="plus-btn" type="submit" name="button">
                                <img src="/img/plus.svg" alt="" />
                            </button>
                            @csrf
                        </form>
                    </div>

                    <div class="total-price">{{ $product->getPriceForCount() }}</div>
                </div>
                @endforeach

                <div class="text-right">
                    <span class="txt-bold">Total: {{ $order->getFullPrice() }} </span>
                    <a href="{{ route('basket-checkout') }}" class="btn btn-danger">Checkout</a>
                </div>
            </div>
        @else
            <h2 style="color: red;">Cart is empty...</h2>
        @endif
    </div>
    <!-- /container -->
</div>
<!-- /SECTION -->
@endsection