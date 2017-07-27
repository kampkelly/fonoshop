@extends('layouts.master')

@section('content')
<section class="home_cover" ng-app="">
	<div style="height: 60px"></div>
	<div class="top-layer">
		<div class="ism-slider" data-play_type="loop" data-radios="false" id="my-slider">
		  <ol>
		    <li>
		      <img src="ism/image/slides/cohesion.jpg">
		    </li>
		    <li>
		      <img src="ism/image/slides/cohesion.jpg">
		    </li>
		    <li>
		      <img src="ism/image/slides/cohesion.jpg">
		    </li>
		  </ol>
		</div>
		<div class="ism_content row">
			<div class="col-xs-5 col-sm-4 col-md-4 col-lg-6">
			<h3 class="text-center">The Home For All Your Gadgets, Equipments And Cryptocurrencies</h3>
				<div class="container">
			<!--	<form action="/search" method="POST" role="search">
			        {{ csrf_field() }}
			        <div class="input-group">
			            <input type="text" class="form-control" name="q"
			                placeholder="Search Computers, Smartphones, Softwares, General Stuffs, etc."> <span class="input-group-btn">
			                <button type="submit" class="btn btn-warning">
			                    <span class="glyphicon glyphicon-search"></span>
			                </button>
			            </span>
			        </div>
			    </form> -->
			    </div> 
			    <div style="height: 20px"></div>
				<p class="text-center text-justify">We serve as and provide all the neccaessary adgets and equipments you need to make your life easier.
 				In need of a phone, computer, softwares, bitcoins, simply search and find the nearest location for it.
				Welcome to Fonoshop - Quick access to your gadgets</p>
				<div class="text-center">
					<a href="#" class="text-center btn btn-md btn-primary">Sell an item</a>
				</div>
				</div>
				<div class="col-xs-5 col-sm-4 col-md-4 col-lg-6">
				<div style="height: 30px"></div>
				<!-- <h4 class="text-center" style="text-decoration: underline; margin-bottom: 0px;">Sell An Item <span class="glyphicon glyphicon-arrow-right" aria-hidden="true"></span> <label class="small" id="product">Product</label> <span class="small" id="bitcoin">Cryptocurrency</span></h4> -->
				<div class="row">
					<div class="col-xs-12 col-sm-8 col-md-8 col-lg-3">
						<h4 style="color: white; padding-top: 0px; padding-bottom: 0px;">Are You a Seller? <span class="glyphicon glyphicon-arrow-right" aria-hidden="true"></span></h4>
					</div>
	                <div class="col-xs-12 col-sm-8 col-md-8 col-lg-7" style="margin-top: 5px;">
						<a href="#product" class="small btn btn-xs btn-info" id="product" style="cursor: pointer; margin-right: 35px;">Sell Product</a> <a href="#cryptocurrency" class="small btn btn-xs btn-warning" id="bitcoin" style="color: white; cursor: pointer;">Sell Cryptocurrency</a>
					</div>
				</div>
				
				@if(Auth::check())
					<p class="text-center">You are logged in!</p>
					<div class="text-center">
						<a href="/myprofile/update/{{Auth::user()->email}}">Update Profile</a>
						<a href="/myitems/{{Auth::user()->email}}">My Items</a>
					</div>
				@else
							
				
				<form action="/newregister" method="POST" class="form-horizontal first-form" role="form" files="true" enctype="multipart/form-data">
					{{ csrf_field() }}
					
					
							<div class="form-one">
								<div class="form-group">
					                <label for="email" class="col-xs-12 col-sm-4 col-md-4 col-lg-3 control-label">Email <span class="asterisks">*</span></label>
					                <div class="col-xs-12 col-sm-8 col-md-8 col-lg-6">
										<input type="email" name="email" id="email" class="form-control" required="required" placeholder="Email Address">
									</div>
								</div>
								<div class="form-group">
					                <label for="product_title" class="col-xs-12 col-sm-4 col-md-4 col-lg-3 control-label">Product Title <span class="asterisks">*</span></label>
					                <div class="col-xs-12 col-sm-8 col-md-8 col-lg-6">
										<input type="text" name="product_title" id="product_title" class="form-control" required="required" placeholder="Product Title">
									</div>
								</div>
								<div class="form-group">
					                <label for="price" class="col-xs-12 col-sm-4 col-md-4 col-lg-3 control-label">Price <span class="asterisks">*</span></label>
					                <div class="col-xs-12 col-sm-8 col-md-8 col-lg-6">
										<input type="text" name="price" id="price" class="form-control" required="required" placeholder="Price">
									</div>
								</div>
								<div class="form-group">
					                <label for="price" class="col-xs-12 col-sm-4 col-md-4 col-lg-3 control-label">Description <span class="asterisks">*</span></label>
					                <div class="col-xs-12 col-sm-8 col-md-8 col-lg-6">
					                	<textarea class="form-control" rows="2" columns="1" name="description" placeholder="Enter Description"></textarea>
									</div>
								</div>
								<div class="form-group">
					                <label for="photo" class="col-xs-12 col-sm-4 col-md-4 col-lg-3 control-label">Photos <span class="asterisks">*</span></label>
					                <div class="col-xs-12 col-sm-8 col-md-8 col-lg-6">
									<!--	<input type="file" name="photo" id="photo" placeholder="Enter Title" class="btn btn-success"> -->
										<input type="file" name="photos[]" id="photo" class="btn btn-success" multiple />
									</div>
								</div>
							</div>
							<div class="form-group">
			                    <div class="col-md-6 col-md-offset-3">
			                        <a href="#" id="next_form" class="btn btn-primary btn-block btn-sm">Proceed <span class="glyphicon glyphicon-hand-right"></span></a>
			                    </div>
			                </div>
			                <div class="form-group">
			                    <div class="col-md-6 col-md-offset-3">
			                        <a href="#" id="previous_form" class="btn btn-info btn-block btn-xs" style="display: none;"><span class="glyphicon glyphicon-arrow-left"></span> Go Back</a>
			                    </div>
			                </div>
			                
			                <div class="form-two" style="display: none;">
								<div class="form-group">
					                <label for="name" class="col-xs-12 col-sm-4 col-md-4 col-lg-3 control-label">Name <span class="asterisks">*</span></label>
					                <div class="col-xs-12 col-sm-8 col-md-8 col-lg-6">
										<input type="text" name="name" id="name" class="form-control" required="required" placeholder="Name">
									</div>
								</div>
								<div class="form-group">
					                <label for="password" class="col-xs-12 col-sm-4 col-md-4 col-lg-3 control-label">Password <span class="asterisks">*</span></label>
					                <div class="col-xs-12 col-sm-8 col-md-8 col-lg-6">
										<input type="password" name="password" id="password" class="form-control" required="required" placeholder="Enter Password">
									</div>
								</div>
								<div class="form-group">
					                <label for="phone" class="col-xs-12 col-sm-4 col-md-4 col-lg-3 control-label">Phone <span class="asterisks">*</span></label>
					                <div class="col-xs-12 col-sm-8 col-md-8 col-lg-6">
										<input type="text" name="phone" id="phone" class="form-control" required="required" placeholder="Phone Number">
									</div>
								</div>
								<div class="form-group">
					                <label for="phone" class="col-xs-12 col-sm-4 col-md-4 col-lg-3 control-label">Phone <span class="asterisks">*</span></label>
					                <div class="col-xs-12 col-sm-8 col-md-8 col-lg-6">
			                            <select name="category_id" id="category_id" class="form-control">
			                                @foreach($categories as $category)
			                                    <option value="{{$category->id}}">{{$category->name}}</option>
			                                @endforeach
			                            </select>
			                        </div>
								</div>
								 <div class="form-group">
				                    <div class="col-md-6 col-md-offset-3">
				                        <button type="submit" class="btn btn-primary btn-block btn-sm">
				                            Submit
				                        </button>
				                    </div>
				                </div>
			                </div>
		                
		               
				</form>
				
					     <form action="/bitregister" method="POST" class="form-horizontal second-form" role="form" style="display: none;">
					     {{ csrf_field() }}
					     		<div class="form-group">
					                <label for="email" class="col-xs-12 col-sm-4 col-md-4 col-lg-3 control-label">Email <span class="asterisks">*</span></label>
					                <div class="col-xs-12 col-sm-8 col-md-8 col-lg-6">
										<input type="email" name="email" id="email" class="form-control" required="required" placeholder="Email Address">
									</div>
								</div>
								<div class="form-group">
					                <label for="password" class="col-xs-12 col-sm-4 col-md-4 col-lg-3 control-label">Password <span class="asterisks">*</span></label>
					                <div class="col-xs-12 col-sm-8 col-md-8 col-lg-6">
										<input type="password" name="password" id="password" class="form-control" required="required" placeholder="Enter Password">
									</div>
								</div>
								<div class="row">
									<div class="col-xs-5 col-sm-4 col-md-4 col-lg-4 col-lg-offset-1 control-label">
										<div class="form-group">
							                <label for="currency" class="col-xs-12 col-sm-4 col-md-4 col-lg-6 control-label">Currency <span class="asterisks">*</span></label>
							                <div class="col-xs-12 col-sm-8 col-md-8 col-lg-6 col-lg-offset-0">
					                            <select name="currency" id="currency" class="form-control">
					                                <option value="Bitcoin">Bitcoin</option>
					                                <option value="Perfect Money">Perfect Money</option>
					                            </select>
					                        </div>
										</div>
									</div>
									<div class="col-xs-5 col-sm-4 col-md-4 col-lg-4">
										<div class="form-group">
							                <label for="price" class="col-xs-12 col-sm-4 col-md-4 col-lg-3 control-label">Price <span class="asterisks">*</span></label>
							                <div class="col-xs-12 col-sm-8 col-md-8 col-lg-9">
												<input type="number" name="price" id="price" class="form-control" required="required" placeholder="Price/currency">
											</div>
										</div>
									</div>
								</div>	
								<div class="form-group">
					                <label for="name" class="col-xs-12 col-sm-4 col-md-4 col-lg-3 control-label">Name <span class="asterisks">*</span></label>
					                <div class="col-xs-12 col-sm-8 col-md-8 col-lg-6">
										<input type="text" name="name" id="name" class="form-control" required="required" placeholder="Name">
									</div>
								</div>
								<div class="form-group">
					                <label for="phone" class="col-xs-12 col-sm-4 col-md-4 col-lg-3 control-label">Phone <span class="asterisks">*</span></label>
					                <div class="col-xs-12 col-sm-8 col-md-8 col-lg-6">
										<input type="text" name="phone" id="phone" class="form-control" required="required" placeholder="Phone Number">
									</div>
								</div>
					     		<div class="form-group">
				                    <div class="col-md-6 col-md-offset-3">
				                        <button type="submit" class="btn btn-primary btn-block btn-sm">
				                            Submit
				                        </button>
				                    </div>
				                </div>
					     </form>	  
				@endif
				</div>
			</div>
	</div>
	<div class="row container-fluid show-container">
		<a href="/category/1" class="col-xs-6 col-sm-3 col-md-3 col-lg-3 showcase">
			<img src=" {{ asset('homepage/computer.jpg') }}" class="img-responsive img-rounded">
			<h3>Computer/Phones</h3>
		</a>		
		<a href="/category/2" class="col-xs-6 col-sm-3 col-md-3 col-lg-3 showcase">
			<img src=" {{ asset('homepage/softwares.jpg') }} " class="img-responsive img-rounded">
			<h3>IT Softwares</h3>
		</a>		
		<a href="/category/3" class="col-xs-6 col-sm-3 col-md-3 col-lg-3 showcase">
			<img src=" {{ asset('homepage/general.jpg') }} " class="img-responsive img-rounded">
			<h3>General Stuffs</h3>
		</a>		
		<a href="/cryptocurrencies" class="col-xs-6 col-sm-3 col-md-3 col-lg-3 showcase">
			<img src=" {{ asset('homepage/bitcoin.jpg') }} " class="img-responsive img-rounded">
			<h3>Buy Bitcoins</h3>
		</a>
	</div>

</section>
@endsection

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function () {
	$("#next_form").click(function() {	
		$(".form-one").slideUp();
		$("#next_form").hide();
		$("#previous_form").show();
		$(".form-two").slideDown();
	});

	$("#previous_form").click(function() {	
		$(".form-two").slideUp();
		$("#previous_form").hide();
		$("#next_form").show();
		$(".form-one").slideDown();
	});

	$("#product").click(function() {	
	//	$(".form-two").slideUp();
		$(".first-form").show();
		$(".second-form").hide();
		//$(".form-one").slideDown();
	});
	$("#bitcoin").click(function() {	
	//	$(".form-two").slideUp();
		$(".first-form").hide();
		$(".second-form").show();
		//$(".form-one").slideDown();
	});

	
});
</script>
