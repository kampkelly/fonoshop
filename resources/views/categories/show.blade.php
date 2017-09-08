@extends('layouts.new_master')

@section('content')
@include('partials/mobile_search')
	<div style="height: 10px"></div>
	<section class="container all_products">
	<div class="row">
	<div class="col-xs-12 col-sm-8 col-md-9 col-lg-9">
		<h3 class="text-center">{{$category->name}}</h3>
		<div class="row">
		@foreach($products as $product)
			<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6" id="hov">
				<div class="pael container-fluid row" style="width: 100%;">
					<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
						<img src="{{ asset('uploads/cover/'.$product->image) }}" class="img-responsive">
						<span class="small">Seller: {{$product->user->name}}</span>
					</div>
					<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
						<h5><span style="color: #449D44;">{{$product->condition}}</span><br>
							{{$product->title}}</h5>
							<em class="small"> &#8358;{{$product->price}}</em>
							<p class="small">{{str_limit($product->description, 35)}}</p>
							<a href="/product/{{$product->slug}}" class="small" style="color: #2980b9;">See more...</a>
					</div>
				</div>
					<div class="shw" style="width: 92%;">
						<p class="small">{{str_limit($product->description, 50)}}</p>
						<div class="more" style="position: relative;">
							<a href="/product/{{$product->slug}}" style="color: #DF8109;">Read more...</a>
						</div>
						</p>
						<span class="small">Seller's information:<br> Contact: {{$product->phone}}, City: {{$product->user->city}}</span>
					</div>
					<div style="height: 10px"></div>
			</div>
		@endforeach	
		</div>
		<div class="text-center"> 
            {{ $products->links() }} <!--paginate links-->
        </div>
	</div>
	@include('partials/sidebar')
	</div>
	</section>
	
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function () {
	$("section #hov").mouseover(function() {
		$(this).find(".shw").css({"visibility": "visible", "border": "1px solid #fafafa", "transition-delay": "0.5s"});
	}); 

	$("section #hov").mouseleave(function() {
		$(this).find(".shw").css({"visibility": "hidden", "border": "1px solid #fafafa"});
	}); 
});
</script>
