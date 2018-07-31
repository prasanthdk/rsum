@extends('layouts.frontend')

@section('content')
<section class="login-page">
      <div class="container">
        <div class="rowlogin-content">
                    <div class="col-md-12 col-sm-12">
                        <div class="login-content-inner">
                            <div class="login-title">
                                <h3 class="text-center">My Account</h3>
                            </div>
                            <form class="form-horizontal" id="loginForm" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}
                                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                    <label for="email" class="emailaddrs">Email Address</label>
                                    <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}" autofocus>
                                    @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                                </div>
                                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                    
                                            <label for="password"  class="emailaddrs">Password</label>
                                             <input type="password" name="password" id="password" class="form-control" >
                                             @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                                       <a href="{{ route('password.request') }}" style="text-align: right;"><p class="text-right pass">Forgot your password?</p></a>
                                    </div>
                                
                                    
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <div class="checkbox checkbox-primary">
                                                
                                                    
                                               
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-block logbtn">Login</button>
                                </div>
                                <div class="form-group">
                                    <div class="row text-center">
                                        <div class="col-md-12 col-sm-12">
                                            <label>No account ?<span><a href=""> Signup</a></span></label>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
          
        </div>
      </div>
      <div class="clearfix"></div>
    </section>
<!-- <div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Login</div>

                <div class="panel-body">
                    <form class="form-horizontal" id="loginForm" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" autofocus>

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
                                <input id="password" type="password" class="form-control" name="password">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox-">
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
</div> -->
@endsection
