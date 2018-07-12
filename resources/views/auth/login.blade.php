@extends('layouts.frontend')

@section('content')


<main id="main">
    <!--==========================
      Login Form Start
      ==========================-->
    <section class="login-page">
        <div class="container">
            <div class="row login-content">
                <div class="col-md-12 col-sm-12">
                    <div class="login-content-inner">
                        <div class="login-title">
                            <h3 class="text-center">Welcome back! Please Login.</h3>
                        </div>
                        <form id="form" class="login-form" method="post" action="{{ route('login') }}">
                            {{ csrf_field() }}
                            <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}" >
                                <label for="email">Email Address</label>
                                <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}" required />
                                @if ($errors->has('email'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group  {{ $errors->has('password') ? ' has-error' : '' }} " >
                                <label for="password">Password <a style="float: right;" href="{{ route('password.request') }}">Forgot your password?</a></label>
                                <input type="password" name="password" id="password" class="form-control" />
                                @if ($errors->has('password'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group " >
                                    <div class="checkbox checkbox-primary">
                                        <input type="checkbox" name="remember"  id="checkbox"  {{ old('remember') ? 'checked' : '' }}>
                                        <label for="checkbox"> Keep me logged in
                                        </label>
                                    </div>
                            </div>
                            <div class="form-group" >
                                <button type="submit" class="btn btn-primary btn-block"  style="border-radius:8px">Login</button>
                            </div>
                                <div class="form-group" style="padding-top:20px;text-align:center">
                                        <label>Don't have a account?<span><a href="{{ route('register') }}"> Sign Up</a></span></label>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--==========================
    Login Form Start
    ==========================-->
    <!--==========================
      Sub Menu
    ============================-->

    <!--==========================
      Sub Menu
    ============================-->
</main>

<!--<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Login</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

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
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Login
                                </button>

                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    Forgot Your Password?
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>-->
@endsection
