@extends('layouts.frontend')

@section('content')
 <section class="login-page">
      <div class="container">

        <!--sign-->

<div class="row register-form">
                    <div class="col-sm-5">

              <form class="form-horizontal r-form" id="registerForm" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}
              <h3>Create An Account</h3>
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">

                            <input id="email" type="email" class="form-control r-form-first-name" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                          </div>
                          <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">

                            <input id="password" type="password" class="form-control r-form-last-name" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif

                            <p class="text-left accs">Already have an account ?</p>

                            <a href="{{url('login')}}" style="text-align: right;"><p class="text-left accs logs">Login</p></a>
                          </div>
                      <div class="form-group btncnt">    
                    <button type="submit" class="btn countinue" id="pdf_register_btn">Continue</button>
                  </div>

            </form>
            
                    </div>

            <div class="col-sm-1 borderright">
            </div>
            <div class="col-sm-1">
            </div>

                    <div class="col-sm-5 forms-right-icons">
              <h3>PDF Made Easy</h3>
            <div class="row">
              <div class="col-sm-2 icon"><img src="images/online.png"></div>
              <div class="col-sm-10 instants">
                <p>Edit PDF documents online instantly. </p>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-2 icon"><img src="images/edit.png"></div>
              <div class="col-sm-10 instants">
                <p>PDFCloud is your all in one solution for editing and converting PDF documents</p>
              </div>
            </div> 
            <div class="row">
              <div class="col-sm-2 icon"><img src="images/storage.png"></div>
              <div class="col-sm-10 instants">
                <p>Now offering unlimited cloud storage for all users.</p>
              </div>
            </div>
                        <div class="row">
                            <div class="col-sm-2 icon"><img src="images/click.png"></div>
                            <div class="col-sm-10 instants">
                                <p>Click Upload Document to get started today.</p>
                            </div>
                        </div>
                        
                    </div>
<p class="consent">By continuing, you confirm that you have read and consent to our Terms of Use and Privacy Policy.</p>
                </div>

        <!--end-->
        
      </div>
      <div class="clearfix"></div>
    </section>
<!-- <div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>

                <div class="panel-body">
                    <form class="form-horizontal" id="registerForm" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>
                        </div>

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
                                <button type="submit" class="btn btn-primary" id="pdf_register_btn">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> -->
@endsection
