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
		@if( $loop->iteration == 2) <!-- bitcoins starts-->
           <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4 hv" style="margin-bottom: 10px;">
                <div class="pael panel-primary">
                	<div class="panel-heading">
                		<h3 class="panel-title">Buy or Sell Bitcoins</h3>
                		
                	</div>
                	<div class="panel-body row">
                		<div class="col-xs-2 col-sm-4 col-md-4 col-lg-4">
                			<img src=" {{ asset('homepage/bitcoin.jpg') }} " class="img-responsive img-rounded" style="heght: 60px;">
                		</div>
                		<div class="col-xs-10 col-sm-8 col-md-8 col-lg-8">
                		<p class="small">We offer the sale of bitcoins and perfect money. Buy Now!</p>
                		</div>
                	</div>
                </div>
            </div>
        
			<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 hv" id="hov">
				
				<div class="pael container-fluid row" style="width: 100%;">
					<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
						<img src="{{ asset('uploads/'.$product->image) }}" class="img-responsive">
						<span class="small">Seller: {{$product->user->name}}</span>
					</div>
					<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
						<h5><span style="color: #449D44;">{{$product->condition}}</span><br>
							{{$product->title}}</h5>
							<em class="small"> &#8358;{{$product->price}}</em>
							<p class="small">{{str_limit($product->description, 35)}}</p>
							<a href="/product/{{$product->slug}}" class="small">See more...</a>
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
			</div><!-- bitcoins ends-->
		@else  <!--no bitcoins down-->
			<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 hv" id="hov">
				
				<div class="pael container-fluid row" style="width: 100%;">
					<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
						<img src="{{ asset('uploads/'.$product->image) }}" class="img-responsive">
						<span class="small">Seller: {{$product->user->name}}</span>
					</div>
					<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
						<h5><span style="color: #449D44;">{{$product->condition}}</span><br>
							{{$product->title}}</h5>
							<em class="small" style="color: green; font-size: 104%;"> &#8358;{{$product->price}}</em>
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
		@endif	
			
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
	//	$(this).css('cursor', 'pointer');
		$(this).find(".shw").css({"visibility": "visible", "border": "1px solid #fafafa", "transition-delay": "0.5s"});
	//	$(this).find(".shw").slideDown(1000);
	}); 

	$("section #hov").mouseleave(function() {
		$(this).find(".shw").css({"visibility": "hidden", "border": "1px solid #fafafa"});
		//$(this).find(".shw").slideUp(1000);
	//	$(this).find(".shw").css({"background-color": "#286090", "border": "1px solid #fafafa"});
	}); 

	$("section #hov").mouseover(function() {
		var ths = this;
		$(".more").click(function() {
			$(this).find(".photos").show();
		});
	});

	$("section #hov").mouseover(function() {
		var ths = this;
		$(".carousel").mouseleave(function() {
			$(ths).find(".photos").hide();
		});
	});

});
</script>
