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
                            <h3 class="text-center">Reset Password</h3>
                        </div>
                        @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                        @endif
                        <form id="form" class="login-form" method="post" action="{{ route('password.request') }}">
                            {{ csrf_field() }}
                            <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email">Email Address</label>
                                <input id="email" type="email" class="form-control" name="email" value="{{ $email or old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}">
                                <label for="password">Password</label>
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group {{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                                <label for="password-confirm">Confirm Password</label>
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>

                                @if ($errors->has('password_confirmation'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group" >
                                <button type="submit" class="btn btn-primary btn-block"  >Reset Password</button>
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

</main>
@endsection
