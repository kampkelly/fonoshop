@extends('layouts.new_master')

@section('content')
@include('partials/mobile_search')
	<div style="height: 25px"></div>
	<style type="text/css">
		.product img {
		   position: relative;
		   width: 100%;
		   height: 150px;
		}
	</style>
	<div class="container">
<div class="row">
	<div class="col-xs-12 col-sm-8 col-md-9 col-lg-9">
	<div class="row">
		<div class="col-xs-12 col-sm-9 col-md-8 col-lg-9 col-sm-offset-1 col-md-offset-2 col-lg-offset-0">
			<h4 class="text-center">{{$product->title}}</h4>
			<h6 class="text-center">Price: <span style="color: green; font-size: 120%;">&#8358;{{$product->price}}</span> Condition:<span style="color: green; font-size: 110%;"> {{$product->condition}}</span> Seller: {{$product->user->name}}</h6>
			<section class="container-fluid text-center product">
				<p class="text-center text-justify" stle="padding: 0px 190px 0px 190px;">{{$product->description}}</p>
				<div class="row" stye="padding: 0px 220px 0px 220px;">
					<div class="col-xs-6 col-sm-6 col-md-4 col-lg-3 panel panel-deault">
						<img src="{{ asset('uploads/cover/'.$product->image) }}" class="img-responsive">
					</div>
					@foreach($product->productsphoto as $photo)
						<div class="col-xs-6 col-sm-6 col-md-4 col-lg-4 panel panel-deault">
							<img src="{{ asset('uploads/photos/'.$photo->image) }}" class="img-responsive">
						</div>
					@endforeach
				</div>
			</section>
		</div>
		<div class="col-xs-12 col-sm-2 col-md-2 col-lg-2">
	<!--	<h6 style="cursor: pointer;" class="btn btn-sm btn-info show-contact">Show Seller's Contact</h6> -->
		<h6 style="cursor: pointer;" class="btn btn-sm btn-info show-contact">Seller's Contact</h6>
		<h6 style="cursor: pointer; display: none;" class="btn btn-sm btn-warning hide-contact">Hide Seller Contact</h6>
		<p class="small contact" style="dislay: none;">Phone: {{$product->phone}}<br> Address: {{$product->state}}, {{$product->city}}</p>
		</div>
	</div>
	</div>
	@include('partials/sidebar')
</div>
</div>
	
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript">

$(document).ready(function () {
	$(".show-contact").click(function() {
		$(".contact").slideDown();
		$(".show-contact").hide();
		$(".hide-contact").show();
	}); 
	$(".hide-contact").click(function() {
=		$(".contact").slideUp();
		$(".hide-contact").hide();
		$(".show-contact").show();
	}); 
});


</script>
