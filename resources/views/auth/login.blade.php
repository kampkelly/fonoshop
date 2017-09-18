@extends('layouts.new_master')

@section('content')
<style type="text/css">
    input:focus {
        background-color: #FAFAFA;
    }
    input:hover {
        background-color: #FAFAFA; 
    }
    input:select {
        background-color: green !important;
    }
    input {
        height: 42px !important;
        border-radius: none !important;
    }
    header {
        display: none;
    }
    nav {
        display: none;
    }
    footer {
        display: none;
    }
</style>
<div class="container" style="height: 100vh; overflow-y: hidden;">
<div style="height: 40px" class="hide-smartphone hide-tablet"></div>
<div style="height: 0px" class="hide-mini-laptop hide-desktop"></div>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <a href="/" class="btn btn-xs btn-danger"><span class=" glyphicon glyphicon-home"></span> Back to home</a><br><br>
            <div class="panel panel-default">
                <div class="panel-heading text-center" style="color: darkorange"><h4>SalesNaija, Signin to your account</h4></div>
                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email Adrress" title="Enter your email address"  required autofocus>

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
                                <input id="password" type="password" class="form-control" name="password" placeholder="Enter Password" title="Enter Password" required>

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
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary btn-block">
                                    Signin
                                </button> 
                                <h4 class="text-center">or</h4>
                                <ul style="display: flex;" class="list-unstyled list-inline">
                                     <li style="flex: 1;"><a href="/auth/google" class="btn btn-danger">Signin With Google</a> </li>
                                    <li style="flex: 1;"><a href="/auth/facebook" class="btn btn-primary">Signin With Facebook</a></li>
                                </ul>
                                 <br><br>

                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    Forgot Your Password?
                                </a>
                                <a class="btn btn-link" href="/authregister">
                                    Register
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('.search_top').hide();
        $('.search_top').css('visibility', 'hidden');
        $('.search_desktop').hide();
    });
</script>
