@extends('layouts.new_master')

@section('content')
@include('partials/mobile_search')

	<div style="height: 0px"></div>
	
	<section class="container">
	<style type="text/css">
		#hov {
		    position: relative;
		    display: inline-block;
		}
		#hov .shw {
		    visibility: hidden; 
		/* display: none; */
		    
		    color: white;
		    text-align: center;
		    border-radius: 6px;
		    padding: 5px;
		    background-color: #286090;

		    /* Position the tooltip */
		    position: absolute;
		    left: 0px;
		    z-index: 1;
		}
		.pael {
			border-radius: 7px;
			background-color: #fafafa;
		}
		.pael:hover {
		  /*  visibility: visible; */
		  cursor: pointer;
		/*  background-color: #CCCCCC; */
		  transition: 1s;
		}
	</style>
	<?php $tuples=['game','books','ps4','xbox','fifa17','nintendo','sega','consoles','pes','god of war', 'mesut ozil', 'sanchez', 'lacazette', 'ramsey', 'walcott', 'cazorla', 'kolscieny,', 'gibbs', 'monreal', 'wilshere', 'oxlade', 'coquelin', 'mustafi']  ?>
	<div class="row">
		<div class="col-xs-12 col-sm-8 col-md-9 col-lg-9">
		<h4 class="text-center">Results on your search for '{{$query}}'</h4>
		@if(isset($details))
			@foreach($details as $product)
			@if( $loop->iteration == 17)
	           <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
	                <div class="panel panel-primary">
	                	<div class="panel-heading">
	                		<h3 class="panel-title">Buy or Sell Bitcoins</h3>
	                		
	                	</div>
	                	<div class="panel-body row">
	                		<div class="col-xs-7 col-sm-4 col-md-4 col-lg-4">
	                			<img src=" {{ asset('homepage/bitcoin.jpg') }} " class="img-responsive img-rounded" style="heght: 60px;">
	                		</div>
	                		<div class="col-xs-7 col-sm-4 col-md-4 col-lg-8">
	                		<p class="small">We offer the sale of any amount of bitcoins, pay in naira and get bitcoins, dollars, pounds, etc. We also serve as outlets for those who wants to sell.</p>
	                		</div>
	                	</div>
	                </div>
	            </div>
	        @else
					<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 hv" id="hov">
				<div>
						<div class="pael container-fluid row" style="width: 100%;">
							<a href="/product/{{$product->slug}}">
								<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
									<img src="{{ asset('uploads/cover/'.$product->image) }}" class="img-responsive" style="max-height: 90px;">
									<span class="small">Seller: {{$product->user->name}}</span>
								</div>
								<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
									<h5><span style="color: #449D44;">{{$product->condition}}</span><br>
										{{$product->title}}</h5>
										<em class="small" style="color: green; font-size: 104%;"> &#8358;{{$product->price}}</em>
										<p class="small">{{str_limit($product->description, 35)}}</p>
										<a href="/product/{{$product->slug}}" class="small">See more...</a>
								</div>
							</a>
						</div>
							<div class="shw" style="width: 92%;">
								<p class="small">{{str_limit($product->description, 125)}}</p>
								<div class="more" style="position: relative;">
									
									<a href="/product/{{$product->slug}}" style="color: #DF8109;">Read more...</a>
								</div>
								</p>
							</div>
							<div style="height: 10px"></div>
					</div>
					</div>
			@endif	
				
			@endforeach	
		@endif
		@if(isset($message))
			<h4>{{$message}}</h4>
		@endif
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
