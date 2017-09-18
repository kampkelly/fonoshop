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
    #searchdiv {display: none;}
</style>
    <div class="row container" style="margin-top: 0px;">
    <div style="height: 40px" class="hide-smartphone hide-tablet"></div>
    <div style="height: 20px" class="hide-mini-laptop hide-desktop"></div>
		  <div class="col-sm-12 main_content">
		<div class="row">
        <div class="col-sm-7 col-lg-7 col-sm-offset-4 col-lg-offset-3">
            <a href="/login" class="btn btn-xs btn-info pull-right">Signin <span class=" glyphicon glyphicon glyphicon-log-in"></span></a><br><br>
            <div class="panel panel-default">
                <div class="panel-heading text-center"><h4>Signup</h4></div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="/authregister">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Your Name" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Your Email" required>

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
                                <input id="password" type="password" class="form-control" name="password" placeholder="Password (at least 6 characters)" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary btn-block">
                                    Signup To Sell
                                </button>
                                <h4 class="text-center">or</h4>
                                <ul style="display: flex;" class="list-unstyled list-inline">
                                    <li style="flex: 1;"><a href="/auth/google" class="btn btn-danger">Signup With Google</a></li>
                                    <li style="flex: 1;"><a href="/auth/facebook" class="btn btn-primary">Signup With Facebook</a></li>
                                </ul>
                            </div>
                        </div>
                    </form>
                </div>
                
            </div>
        </div>
    </div>
         </div>
</div>

@endsection