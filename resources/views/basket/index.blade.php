@extends('layouts/default')

@section('title', 'Electro - HTML Ecommerce Template')

@section('content')
<div id="mainBody">
    <div class="container">
        <div class="row">
            <!-- Sidebar ================================================== -->
            @include ('layouts.sidebar')
            <!-- Sidebar end=============================================== -->
            <div class="span9">
                <ul class="breadcrumb">
                    <li><a href="index.html">Home</a> <span class="divider">/</span></li>
                    <li class="active"> SHOPPING CART</li>
                </ul>
                <h3> SHOPPING CART
                    @if (isset($order))
                    [ <small>{{ count($order->products) }} Item(s) </small>]
                    @endif
                    <a href="{{ route('catalog') }}" class="btn btn-large pull-right"><i class="icon-arrow-left"></i> Continue Shopping </a>
                </h3>
                <hr class="soft" />

                @if (isset($order))
                <!-- <table class="table table-bordered">
                    <tr>
                        <th> I AM ALREADY REGISTERED </th>
                    </tr>
                    <tr>
                        <td>
                            <form class="form-horizontal">
                                <div class="control-group">
                                    <label class="control-label" for="inputUsername">Username</label>
                                    <div class="controls">
                                        <input type="text" id="inputUsername" placeholder="Username">
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="inputPassword1">Password</label>
                                    <div class="controls">
                                        <input type="password" id="inputPassword1" placeholder="Password">
                                    </div>
                                </div>
                                <div class="control-group">
                                    <div class="controls">
                                        <button type="submit" class="btn">Sign in</button> OR <a href="register.html" class="btn">Register Now!</a>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <div class="controls">
                                        <a href="forgetpass.html" style="text-decoration:underline">Forgot
                                            password ?</a>
                                    </div>
                                </div>
                            </form>
                        </td>
                    </tr>
                </table> -->

                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <td>
                                <form class="form-horizontal">
                                    <div class="control-group">
                                        <label class="control-label"><strong> VOUCHER'S CODE: </strong> </label>
                                        <div class="controls">
                                            <input type="text" class="input-medium" placeholder="CODE">
                                            <button type="submit" class="btn"> ADD </button>
                                        </div>
                                    </div>
                                </form>
                            </td>
                        </tr>

                    </tbody>
                </table>

                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Product</th>
                            <th>Description</th>
                            <th>Quantity/Update</th>
                            <th>Price</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($order->products as $product)
                        <tr>
                            <td> <img width="60" src="themes/images/products/4.jpg" alt="" /></td>
                            <td>{{ $product->name }}<br />Color : black, Material : metal</td>
                            <td>
                                <div class="input-append">
                                    <input class="span1" style="max-width:34px" value="{{ $product->pivot->count }}" id="appendedInputButtons" size="16" type="text">
                                    <form action="{{ route('basket-remove', $product) }}" style="display: inline-block;" method="post">
                                        <button class="btn" type="submit">
                                            <i class="icon-minus"></i>
                                        </button>
                                        @csrf
                                    </form>
                                    <form action="{{ route('basket-add', $product) }}" style="display: inline-block;" method="post">
                                        <button class="btn" type="submit">
                                            <i class="icon-plus"></i>
                                        </button>
                                        @csrf
                                    </form>
                                </div>
                            </td>
                            <td>${{ $product->price }}</td>
                            <td>${{ $product->price * $product->pivot->count }}</td>
                        </tr>
                        @endforeach

                        <tr>
                            <td colspan="4" style="text-align:right">Total Price: </td>
                            <td> {{ $order->getFullPrice() }}</td>
                        </tr>
                        <tr>
                            <td colspan="4" style="text-align:right">Total Discount: </td>
                            <td> $00.00</td>
                        </tr>
                        <tr>
                            <td colspan="4" style="text-align:right"><strong>To pay:</strong>
                            </td>
                            <td class="label label-important" style="display:block"> <strong> {{ $order->getFullPrice() }} </strong>
                            </td>
                        </tr>
                    </tbody>
                </table>

                <table class="table table-bordered">
                    <tr>
                        <th>ESTIMATE YOUR SHIPPING </th>
                    </tr>
                    <tr>
                        <td>
                            <form class="form-horizontal" action="{{ route('checkout-confirm') }}" method="post">
                                <div class="control-group">
                                    <label class="control-label" for="inputCountry">Your name </label>
                                    <div class="controls">
                                        <input type="text" id="inputCountry" name="name" placeholder="Your name" style="width: 70%;">
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="inputPost">Email</label>
                                    <div class="controls">
                                        <input type="email" id="inputPost" name="email" placeholder="Email" style="width: 70%;">
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="inputPost">Phone</label>
                                    <div class="controls">
                                        <input type="text" id="inputPost" name="phone" placeholder="Phone number" style="width: 70%;">
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="inputPost">Address</label>
                                    <div class="controls">
                                        <input type="text" id="inputPost" name="address" placeholder="Address" style="width: 70%;">
                                    </div>
                                </div>

                                <a href="{{ route('catalog') }}" class="btn btn-large"><i class="icon-arrow-left"></i> Continue Shopping</a>

                                <button class="btn btn-large btn-success pull-right" type="submit">
                                    Place order
                                </button>
                                @csrf
                            </form>
                        </td>
                    </tr>
                </table>
                @else
                <h2 style="color: red;">Cart is empty...</h2>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection