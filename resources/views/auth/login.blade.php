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
                    <li class="active">Login</li>
                </ul>
                <h3> Login</h3>
                <hr class="soft" />

                <div class="row form-center">
                    <div class="span4">
                        <div class="well">
                            <form method="POST" action="{{ route('login') }}">
                            @csrf
                                <div class="control-group">
                                    <label class="control-label" for="inputEmail1">Email</label>
                                    <div class="controls">
                                        <input class="span3" name="email" type="text" id="inputEmail1" placeholder="Email">
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="inputPassword1">Password</label>
                                    <div class="controls">
                                        <input type="password" name="password" class="span3" id="inputPassword1" placeholder="Password">
                                    </div>
                                </div>
                                <div class="control-group">
                                    <div class="controls">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Login') }}
                                        </button>

                                        @if (Route::has('password.request'))
                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                        @endif
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
