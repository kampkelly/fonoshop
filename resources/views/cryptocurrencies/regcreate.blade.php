@extends('layouts.new_master')

@section('content')
@include('partials/mobile_search')
	<div style="height: 11px"></div>
	<div class="container">
		<div class="row">
		<div class="col-xs-12 col-sm-8 col-md-9 col-lg-9">
			<section class="container-fluid">
				<h3 class="text-center">Welcome, Sell Your Cryptocurrency</h3>
				<div style="height: 20px"></div>
				 <form action="/bitregister" method="POST" class="form-horizontal second-form" role="form">
					     {{ csrf_field() }}
					     	<h6 class="text-center">Cryptocurrency</h6>
					     		<div class="row">
									<div class="col-xs-12 col-sm-6 col-md-5 col-lg-4 col-md-offset-1 col-lg-offset-1 control-label">
										<div class="form-group">
							                <label for="currency" class="col-xs-3 col-sm-5 col-md-5 col-lg-6 control-label">Currency <span class="asterisks">*</span></label>
							                <div class="col-xs-8 col-sm-7 col-md-7 col-lg-6 col-lg-offset-0">
					                            <select name="currency" id="currency" class="form-control">
						                            @foreach($cryptocategories as $cryptocategory)
						                                <option value="{{$cryptocategory->currency_name}}">{{$cryptocategory->currency_name}}</option>
						                            @endforeach
						                        </select>
					                        </div>
										</div>
									</div>
									<div class="col-xs-12 col-sm-6 col-md-6 col-lg-4" style="margin-top: 5px;">
										<div class="form-group">
							                <label for="price" class="col-xs-3 col-sm-4 col-md-3 col-lg-4 control-label">Price <span class="asterisks">*</span></label>
							                <div class="col-xs-8 col-sm-6 col-md-5 col-lg-8">
												<input type="number" name="price" id="price" class="form-control" required="required" placeholder="Price/currency">
											</div>
										</div>
									</div>
								</div>	
								<div class="form-group">
					                <label for="name" class="col-xs-3 col-sm-3 col-md-3 col-lg-3 control-label">Name <span class="asterisks">*</span></label>
					                <div class="col-xs-8 col-sm-8 col-md-7 col-lg-6">
										<input type="text" name="name" id="name" class="form-control" required="required" placeholder="Name">
									</div>
								</div>
					     		<div class="form-group">
					                <label for="email" class="col-xs-3 col-sm-3 col-md-3 col-lg-3 control-label">Email <span class="asterisks">*</span></label>
					                <div class="col-xs-8 col-sm-8 col-md-7 col-lg-6">
										<input type="email" name="email" id="email" class="form-control" required="required" placeholder="Email Address">
									</div>
								</div>
								<div class="form-group">
					                <label for="password" class="col-xs-3 col-sm-3 col-md-3 col-lg-3 control-label">Password <span class="asterisks">*</span></label>
					                <div class="col-xs-8 col-sm-8 col-md-7 col-lg-6">
										<input type="password" name="password" id="password" class="form-control" required="required" placeholder="Enter Password">
									</div>
								</div>
								<div class="form-group">
					                <label for="phone" class="col-xs-3 col-sm-3 col-md-3 col-lg-3 control-label">Phone <span class="asterisks">*</span></label>
					                <div class="col-xs-8 col-sm-8 col-md-7 col-lg-6">
										<input type="text" name="phone" id="phone" class="form-control" required="required" placeholder="Phone Number">
									</div>
								</div>
								<div class="form-group">
				                    <label for="state" class="col-xs-12 col-sm-4 col-md-3 col-lg-3 control-label">State <span class="asterisks">*</span></label>
				                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
				                        <input type="text" name="state" id="state" class="form-control" required="required" placeholder="Enter City" required="true" title="Enter City" value="Edo" disabled="true">
				                    </div>
				                </div>
								<div class="form-group">
				                    <label for="city" class="col-xs-12 col-sm-4 col-md-3 col-lg-3 control-label">City <span class="asterisks">*</span></label>
				                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
				                        <select name="city" id="city" class="form-control">
				                            @foreach($cities as $city)
				                                <option value="{{$city}}" required="true">{{$city}}</option>
				                            @endforeach
				                        </select>
				                    </div>
				                </div>
					     		<div class="form-group">
				                    <div class="col-xs-12 col-sm-8 col-md-7 col-lg-6 col-sm-offset-3">
				                        <button type="submit" class="btn btn-primary btn-block btn-sm">
				                            Submit
				                        </button>
				                    </div>
				                </div>
					     </form>	  
			</section>
		</div>
		@include('partials/sidebar')
	</div>
	
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript">



</script>
