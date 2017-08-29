@extends('layouts.new_master')

@section('content')
@include('partials/mobile_search')
	<div style="height: 20px"></div>
	<div class="container">
	<div style="height: 10px"></div>
	<div class="row">
	<div class="col-xs-12 col-sm-8 col-md-9 col-lg-9">
	<section class="container-fluid">
		<h4 class="text-center"></h4>
		<ol>
			<li><a href="/admin/categories">Categories</a></li>
			<li><a href="#">Products</a></li>
			<li><a href="#">Cryptocurrencies</a></li>
		</ol>
	</section>
	</div>
	@include('partials/sidebar')
	</div>
	
	
	
@endsection
