@extends('layouts.master')

@section('content')
	<div style="height: 60px"></div>
	<h3 class="text-center">Computer Gadgets</h3>
	<div style="height: 40px"></div>
	<section class="container">
	<?php $tuples=['game','books','ps4','xbox','fifa17','nintendo','sega','consoles','pes']  ?>
	@foreach($tuples as $tuple)
		<div class="row">
			<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4" id="hov">
				<div class="pael container-fluid row">
					<div class="col-xs-5 col-sm-4 col-md-4 col-lg-6">
						<img src="{{ asset('demo/1.jpg') }}" class="img-responsive">
						<span>Seller: Fonoscorp E.</span>
					</div>
					<div class="col-xs-7 col-sm-4 col-md-4 col-lg-6">
						<h6>Macbook Pro Retina Display 13inch</h6>
						<em>#250,000</em>
						<p class="small">Brand new macbook retina pro, 13inch.</p>
						<a href="#">See more</a>
					</div>
				</div>
					<div class="shw" style="background-color: #EC971F; border: 1px solid #EC971F; border-radius: 4px; padding: 15px; display: none;">
						<p class="small">A brand new macbook pro retina display. 8gb ram, core15, 120gb ssd, battery lasts up to 10hours.
						Accessories included are original charger, laptop casing, bag. Bonus: 4gb usb drive.</p>
						<span class="small">Seller's information:<br> Contact: 07022525227, Address: No.5 Gapiona Junction Centreal Road</span>
					</div>
			</div>
			<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4" id="hov">
				 <div class="pael container-fluid row">
					<div class="col-xs-5 col-sm-4 col-md-4 col-lg-6">
						<img src="{{ asset('demo/2.jpg') }}" class="img-responsive">
						<span>Seller: Fonoscorp E.</span>
					</div>
					<div class="col-xs-7 col-sm-4 col-md-4 col-lg-6">
						<h6>Samsung Note 4, 3gb ram, 32gb.</h6>
						<em>#120,000</em>
						<p class="small">New Samsung Note 4, white colour.</p>
						<a href="#">See more</a>
					</div>
				</div>
					<div class="shw" style="background-color: #EC971F; border: 1px solid #EC971F; border-radius: 4px; padding: 15px; display: none;">
						<p class="small">A brand new macbook pro retina display. 8gb ram, core15, 120gb ssd, battery lasts up to 10hours.
						Accessories included are original charger, laptop casing, bag. Bonus: 4gb usb drive.</p>
						<span class="small">Seller's information:<br> Contact: 07022525227, Address: No.5 Gapiona Junction Centreal Road</span>
					</div>
			</div>
			<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4" id="hov">
				 <div class="pael container-fluid row">
					<div class="col-xs-5 col-sm-4 col-md-4 col-lg-6">
						<img src="{{ asset('demo/3.jpg') }}" class="img-responsive">
						<span>Seller: Fonoscorp E.</span>
					</div>
					<div class="col-xs-4 col-sm-4 col-md-4 col-lg-6">
						<h6>Samsung Note 4, 3gb ram, 32gb.</h6>
						<em>#120,000</em>
						<p class="small">New Samsung Note 4, white colour.</p>
						<a href="#">See more</a>
					</div>
				</div>
					<div class="shw" style="background-color: #EC971F; border: 1px solid #EC971F; border-radius: 4px; padding: 15px; display: none;">
						<p class="small">A brand new macbook pro retina display. 8gb ram, core15, 120gb ssd, battery lasts up to 10hours.
						Accessories included are original charger, laptop casing, bag. Bonus: 4gb usb drive.</p>
						<span class="small">Seller's information:<br> Contact: 07022525227, Address: No.5 Gapiona Junction Centreal Road</span>
					</div>
			</div>		
		</div>
		<div style="height: 100px"></div>
	@endforeach
	</section>
	
@endsection
