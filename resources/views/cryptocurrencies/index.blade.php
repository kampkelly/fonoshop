@extends('layouts.master')

@section('content')
	<div style="height: 60px"></div>
	<h4 class="text-center">Available Cryptocurrencies</h4>
	<div style="height: 40px"></div>
	<section class="container">
		@foreach($cryptocurrencies as $cryptocurrency)
			<ul class="list-group">
				<li class="list-group-item"><p>{{$cryptocurrency->user->name}} is selling {{$cryptocurrency->currency}} at {{$cryptocurrency->price}}/{{$cryptocurrency->currency}} <span class="pull-right">Phone: {{$cryptocurrency->user->phone}}, City: {{$cryptocurrency->user->city}}</span></p></li>
			</ul>
		@endforeach
	</section>
	
	
	
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript">



</script>
