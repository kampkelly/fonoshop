@extends('layouts.master')

@section('content')
	<div style="height: 60px"></div>
	<h4 class="text-center">Update My Profile</h4>
	<div style="height: 40px"></div>
	<section class="container">
	
	<div class="row">
  <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 col-lg-offset-3">
  		<form action="/register/{{$user->email}}" method="post" value="PUT" class="form-horizontal first-form" role="form" files="true" enctype="multipart/form-data">
		{{ csrf_field() }}
			<div class="form-group">
                <label for="email" class="col-xs-12 col-sm-4 col-md-4 col-lg-3 control-label">Email <span class="asterisks">*</span></label>
                <div class="col-xs-12 col-sm-8 col-md-8 col-lg-6">
					<input type="email" name="email" id="email" class="form-control" required="required" placeholder="Email Address" value="{{$user->email}}">
				</div>
			</div>
			<div class="form-group">
                <label for="name" class="col-xs-12 col-sm-4 col-md-4 col-lg-3 control-label">Name <span class="asterisks">*</span></label>
                <div class="col-xs-12 col-sm-8 col-md-8 col-lg-6">
					<input type="text" name="name" id="name" class="form-control" required="required" placeholder="Name" value="{{$user->name}}">
				</div>
			</div>
			<div class="form-group">
                <label for="phone" class="col-xs-12 col-sm-4 col-md-4 col-lg-3 control-label">Phone <span class="asterisks">*</span></label>
                <div class="col-xs-12 col-sm-8 col-md-8 col-lg-6">
					<input type="text" name="phone" id="phone" class="form-control" required="required" placeholder="Phone Number" value="{{$user->phone}}">
				</div>
			</div>
			<div class="form-group">
                <label for="city" class="col-xs-12 col-sm-4 col-md-4 col-lg-3 control-label">City <span class="asterisks">*</span></label>
                <div class="col-xs-12 col-sm-8 col-md-8 col-lg-6">
					<input type="text" name="city" id="city" class="form-control" required="required" placeholder="Enter City" value="{{$user->city}}">
				</div>
			</div>
			 <div class="form-group">
                <div class="col-md-6 col-md-offset-3">
                    <button type="submit" class="btn btn-primary btn-block btn-sm">
                        Save Changes
                    </button>
                </div>
            </div> 
		</form>
  </div>  
	
	</section>
	
	
	
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript">



</script>
