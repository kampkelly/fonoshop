@extends('layouts.master')

@section('content')
	<div style="height: 60px"></div>
	<h3 class="text-center">Software Gadgets</h3>
	<div style="height: 40px"></div>
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
		@foreach($tuples as $tuple)
		@if( $loop->iteration == 2)
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
			<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4" id="hov" class="hv">
				
				<div class="pael container-fluid row" style="width: 100%;">
					<div class="col-xs-5 col-sm-4 col-md-4 col-lg-6">
						<img src="{{ asset('demo/1.jpg') }}" class="img-responsive">
						<span>Sellerr: Fonoscorp E.</span>
					</div>
					<div class="col-xs-7 col-sm-4 col-md-4 col-lg-6">
						<h5>Used</h5>
						<h6>Used Imac Retina Display 24inch</h6>
						<em>#250,000</em>
						<p class="small">Brand new macbook retina pro, 13inch.</p>
						<a href="#">See more</a>
					</div>
				</div>
					<div class="shw" style="width: 92%;">
						<p class="small">A brand new macbook pro retina display. 8gb ram, core15, 120gb ssd, battery lasts up to 10hours.
						Accessories included are original charger, laptop casing, bag. Bonus: 4gb usb drive. 
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
										<div class="item active"> 
											<img data-src="holder.js/900x500/auto/#777:#7a7a7a/text:First slide" class="img-responsive" alt="First slide" src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSI5MDAiIGhlaWdodD0iNTAwIj48cmVjdCB3aWR0aD0iOTAwIiBoZWlnaHQ9IjUwMCIgZmlsbD0iIzc3NyI+PC9yZWN0Pjx0ZXh0IHRleHQtYW5jaG9yPSJtaWRkbGUiIHg9IjQ1MCIgeT0iMjUwIiBzdHlsZT0iZmlsbDojN2E3YTdhO2ZvbnQtd2VpZ2h0OmJvbGQ7Zm9udC1zaXplOjU2cHg7Zm9udC1mYW1pbHk6QXJpYWwsSGVsdmV0aWNhLHNhbnMtc2VyaWY7ZG9taW5hbnQtYmFzZWxpbmU6Y2VudHJhbCI+Rmlyc3Qgc2xpZGU8L3RleHQ+PC9zdmc+" style="height: 300px">
											<div class="container">
												<div class="carousel-caption">
													<h1>One more for good measure.</h1>
													<p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
													<p><a class="btn btn-lg btn-primary" href="#" role="button">Browse gallery</a></p>
												</div>
											</div>
										</div>
										<div class="item">
											<img data-src="holder.js/900x500/auto/#555:#5a5a5a/text:Third slide" class="img" alt="Third slide" src="http://i.imgur.com/C8i6DOQ.jpg" style="height: 300px">
											<div class="container">
												<div class="carousel-caption">
													<h1>One more for good measure.</h1>
													<p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
													<p><a class="btn btn-lg btn-primary" href="#" role="button">Browse gallery</a></p>
												</div>
											</div>
										</div>
									</div>
									<a class="left carousel-control" href="#carousel-id" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
									<a class="right carousel-control" href="#carousel-id" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
								</div>
								<!--here-->
							</div>
							<a href="#" style="color: #DF8109;">See more photos</a>
						</div>
						</p>
						<span class="small">Seller's information:<br> Contact: 07022525227, Address: No.5 Gapiona Junction Centreal Road</span>
					</div>
					<div style="height: 50px"></div>
			</div>
		@endif	
			
		@endforeach	
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
