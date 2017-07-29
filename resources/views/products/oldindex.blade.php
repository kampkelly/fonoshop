o@extends('layouts.master')

@section('content')
	<div style="height: 20px"></div>
	<h3 class="text-center">All Products</h3>
	<div style="height: 10px"></div>
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
		<div class="row">
		@foreach($products as $product)
		@if( $loop->iteration == 2) <!-- bitcoins starts-->
           <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4" style="margin-bottom: 50px;">
                <div class="panel panel-primary">
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
        
			<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6" id="hov" class="hv">
				
				<div class="pael container-fluid row" style="width: 100%;">
					<div class="col-xs-4 col-sm-6 col-md-4 col-lg-4">
						<img src="{{ asset('uploads/'.$product->image) }}" class="img-responsive">
						<span class="small">Seller: {{$product->user->name}}</span>
					</div>
					<div class="col-xs-8 col-sm-6 col-md-8 col-lg-8">
						<h5><span style="color: #449D44;">{{$product->condition}}</span><br>
							{{$product->title}}</h5>
							<em class="small">#{{$product->price}}</em>
							<p class="small">{{str_limit($product->description, 35)}}</p>
							<a href="/product/{{$product->slug}}" class="small">See more...</a>
					</div>
				</div>
					<div class="shw" style="width: 92%;">
						<p class="small">{{str_limit($product->description, 50)}}</p>
						<div class="more" style="position: relative;">
							<div class="photos" style="display: none; position: absolute; z-index: 99; bottom: 0px;">
								<!--here-->
								<div id="carousel-id" class="carousel slide" data-ride="carousel" style="width: 40%;">
									<ol class="carousel-indicators">
										<li data-target="#carousel-id" data-slide-to="0" class=""></li>
										<li data-target="#carousel-id" data-slide-to="1" class=""></li>
										<li data-target="#carousel-id" data-slide-to="2" class="active"></li>
									</ol>
									<div class="carousel-inner">
										
										@foreach($product->productsphoto as $photo)
										@if($loop->iteration == 1)
											<div class="item active">
												<img data-src="holder.js/900x500/auto/#555:#5a5a5a/text:Third slide" class="img" alt="Third slide" src="{{ asset('uploads/'.$photo->image) }}" style="height: 300px" width="100%">
												<div class="container">
													<div class="carousel-caption">
														
														<p><a class="btn btn-lg btn-primary btn-xs" href="#" role="button">Close</a></p>
													</div>
												</div>
											</div>
										@else
											<div class="item">
												<img data-src="holder.js/900x500/auto/#555:#5a5a5a/text:Third slide" class="img" alt="Third slide" src="{{ asset('uploads/'.$photo->image) }}" style="height: 300px" width="100%">
												<div class="container">
													<div class="carousel-caption">
														
														<p><a class="btn btn-lg btn-primary btn-xs" href="#" role="button">Browse gallery</a></p>
													</div>
												</div>
											</div>
										@endif
										@endforeach
									</div>
									<a class="left carousel-control" href="#carousel-id" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
									<a class="right carousel-control" href="#carousel-id" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
								</div>
								<!--here-->
							</div>
							<a href="/product/{{$product->slug}}" style="color: #DF8109;">Read more...</a>
						</div>
						</p>
						<span class="small">Seller's information:<br> Contact: {{$product->phone}}, City: {{$product->user->city}}</span>
					</div>
					<div style="height: 50px"></div>
			</div><!-- bitcoins ends-->
		@else  <!--no bitcoins down-->
			<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6" id="hov" class="hv">
				
				<div class="pael container-fluid row" style="width: 100%;">
					<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
						<img src="{{ asset('uploads/'.$product->image) }}" class="img-responsive">
						<span class="small">Seller: {{$product->user->name}}</span>
					</div>
					<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
						<h5><span style="color: #449D44;">{{$product->condition}}</span><br>
							{{$product->title}}</h5>
							<em class="small">#{{$product->price}}</em>
							<p class="small">{{str_limit($product->description, 35)}}</p>
							<a href="/product/{{$product->slug}}" class="small">See more...</a>
					</div>
				</div>
					<div class="shw" style="width: 92%;">
						<p class="small">{{str_limit($product->description, 50)}}</p>
						<div class="more" style="position: relative;">
							<div class="photos" style="display: none; position: absolute; z-index: 99; bottom: 0px;">
								<!--here-->
								<div id="carousel-id" class="carousel slide" data-ride="carousel" style="width: 40%;">
									<ol class="carousel-indicators">
										<li data-target="#carousel-id" data-slide-to="0" class=""></li>
										<li data-target="#carousel-id" data-slide-to="1" class=""></li>
										<li data-target="#carousel-id" data-slide-to="2" class="active"></li>
									</ol>
									<div class="carousel-inner">
										
										@foreach($product->productsphoto as $photo)
										@if($loop->iteration == 1)
											<div class="item active">
												<img data-src="holder.js/900x500/auto/#555:#5a5a5a/text:Third slide" class="img" alt="Third slide" src="{{ asset('uploads/'.$photo->image) }}" style="height: 300px" width="100%">
												<div class="container">
													<div class="carousel-caption">
														
														<p><a class="btn btn-lg btn-primary btn-xs" href="#" role="button">Close</a></p>
													</div>
												</div>
											</div>
										@else
											<div class="item">
												<img data-src="holder.js/900x500/auto/#555:#5a5a5a/text:Third slide" class="img" alt="Third slide" src="{{ asset('uploads/'.$photo->image) }}" style="height: 300px" width="100%">
												<div class="container">
													<div class="carousel-caption">
														
														<p><a class="btn btn-lg btn-primary btn-xs" href="#" role="button">Browse gallery</a></p>
													</div>
												</div>
											</div>
										@endif
										@endforeach
									</div>
									<a class="left carousel-control" href="#carousel-id" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
									<a class="right carousel-control" href="#carousel-id" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
								</div>
								<!--here-->
							</div>
							<a href="/product/{{$product->slug}}" style="color: #DF8109;">Read more...</a>
						</div>
						</p>
						<span class="small">Seller's information:<br> Contact: {{$product->phone}}, City: {{$product->user->city}}</span>
					</div>
					<div style="height: 50px"></div>
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
