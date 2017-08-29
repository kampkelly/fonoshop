@extends('layouts.new_master')

@section('content')
	<div style="height: 20px"></div>
	<div class="container">
	<div style="height: 10px"></div>
	<div class="row">
	<div class="col-xs-12 col-sm-8 col-md-9 col-lg-9">
	<section class="container-fluid">
		<h4 class="text-center">Admin Panel</h4>
		<ol>
			<li><a href="/admin/categories">Categories</a></li>
			<li><a href="/admin/products">Products</a></li>
			<li><a href="/admin/products/photos">Products Photos</a></li>
			<li><a href="/admin/cryptocurrencies">Cryptocurrencies</a></li>
			<li><a href="/admin/cryptocategories">Cryptocategories</a></li>
			<li><a href="/admin/posts">Posts</a></li>
			<li><a href="/admin/users">Users</a></li>
		</ol>
	</section>
	</div>
	@include('partials/sidebar')
	</div>
	
	
	
@endsection

