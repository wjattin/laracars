@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row">
        <h1>Login</h1>
        <div class="small-12 medium-6 large-6 columns">

            <div class="panel callout">

                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                        {!! csrf_field() !!}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input type="email" class="form-control" name="email" value="{{ old('email') }}">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input type="password" class="form-control" name="password">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember"> Remember Me
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="button">
                                    Login <i class="fi-arrow-right"></i>
                                </button>

                                <a class="btn btn-link" href="{{ url('/password/reset') }}">Forgot Your Password?</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="small-12 medium-6 latge-6 columns">
            <p>Welcome to Laracars, the nation's largest dealer-to-dealer vehicle trading website.</p>
            <p>Laracars is the Nation's largest wholesale and inventory exchange network of used auto dealers , representing over 11,000 dealers nationwide.
                Laracars provides access to dealer's wholesale inventories and overstock vehicles, helping dealers move more inventory.</p>
                <p>With a wide range of aftermarket solutions designed to increase profitability and the service drive, Laracars helps dealers succeed.</p>
        </div>

    </div>
    <hr>
    <div class="row">
        <div class="large-12 columns text-center">
            <h2>Don't have an account?</h2>
            <a href="/register" class="button">Sign up today!</a>
        </div>
    </div>
</div>
@endsection
