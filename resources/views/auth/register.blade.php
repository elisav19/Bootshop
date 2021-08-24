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
                    <li class="active">Registration</li>
                </ul>
                <h3> Registration</h3>
                <div class="well">
                    <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                        @csrf
                        <h4>Your personal information</h4>
                        <div class="control-group">
                            <label class="control-label" for="inputFname1">First name <sup>*</sup></label>
                            <div class="controls">
                                <input name="firstname" type="text" id="inputFname1" placeholder="First Name" required>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="inputLnam">Last name <sup>*</sup></label>
                            <div class="controls">
                                <input name="lastname" type="text" id="inputLnam" placeholder="Last Name" required>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="input_email">Email <sup>*</sup></label>
                            <div class="controls">
                                <input name="email" type="text" id="input_email" placeholder="Email" required>
                            </div>
                        </div>
                        <div class="control-group">
                            <label for="password" class="control-label">{{ __('Password') }}<sup>*</sup></label>
                            <div class="controls">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                            </div>
                        </div>
                        <div class="control-group">
                            <label for="password-confirm" class="control-label">{{ __('Confirm Password') }}<sup>*</sup></label>
                            <div class="controls">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <h4>Your address</h4>

                        <div class="control-group">
                            <label class="control-label" for="address">Address<sup>*</sup></label>
                            <div class="controls">
                                <input name="address" type="text" id="address" placeholder="Adress" /> <span>Street address, P.O. box, company name, c/o</span>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="postcode">Zip / Postal Code<sup>*</sup></label>
                            <div class="controls">
                                <input name="zip" type="text" id="postcode" placeholder="Zip / Postal Code" />
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="mobile">Mobile Phone </label>
                            <div class="controls">
                                <input type="text" name="phone" id="mobile" placeholder="Mobile Phone" />
                            </div>
                        </div>

                        <p><sup>*</sup>Required field </p>

                        <div class="control-group">
                            <div class="controls">
                                <input class="btn btn-large btn-success" type="submit" value="Register" />
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>

@endsection
