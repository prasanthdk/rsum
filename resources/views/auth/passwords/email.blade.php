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
                        <form id="form" class="login-form" method="post" action="{{ url('/password/email') }}">
                            {{ csrf_field() }}
                            <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email">Email Address</label>
                                <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}" required />
                                @if ($errors->has('email'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group" >
                                <button type="submit" class="btn btn-primary btn-block"  >Send Password Reset Link</button>
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
                <div class="panel-heading">Reset Password</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form class="form-horizontal" method="POST" action="{{ route('password.email') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Send Password Reset Link
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>-->
@endsection
