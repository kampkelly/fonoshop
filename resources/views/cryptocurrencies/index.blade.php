@extends('layouts.new_master')

@section('content')
@include('partials/mobile_search')
	<div style="height: 0px"></div>
	<div class="container">
	<div class="row">
		<div class="col-xs-12 col-sm-8 col-md-9 col-lg-9">
			<h4 class="text-center">Available Cryptocurrencies</h4>
			<div style="height: 40px"></div>
			<section class="container-fluid">
				@foreach($cryptocurrencies as $cryptocurrency)
					<ul class="list-group">
						<li class="list-group-item" style="background-color: #fafafa !important;"><p>{{$cryptocurrency->user->name}} is selling at <span style="color: #DF8109;">N{{$cryptocurrency->price}}/{{$cryptocurrency->currency}}</span> 
						<span class="show" style="cursor: pointer;"> <span class="pull-right phone" style="display: none">Phone: {{$cryptocurrency->user->phone}}, City: {{$cryptocurrency->user->city}}</span> <span class="pull-right">Show contact</span> </span>
						</p></li>
					</ul>
				@endforeach
			</section>
			<div class="text-center"> 
	            {{ $cryptocurrencies->links() }} <!--paginate links-->
	        </div>
		</div>
		@include('partials/sidebar')
	</div>
	</div>
	
	
	
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<script type="text/javascript">
$(document).ready(function () {
	$(".show").click(function() {
		$(this).hide();
		$(this).find(".phone").show(800);
	});
	$(".show").mouseleave(function() {
		$(this).show();
		$(this).find(".phone").hide(800);
	});

});


</script>
