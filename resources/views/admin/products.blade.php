@extends('layouts.new_master')

@section('content')
	<div style="height: 20px"></div>
	<div class="container">
	<div style="height: 10px"></div>
	<div class="row">
	<div class="col-xs-12 col-sm-8 col-md-9 col-lg-9">
	<section class="container-fluid">
		<h4 class="text-center">Manage Products</h4>
		<hr>
			<div class="container-fluid all_innovations" style="padding-left: 30px">
	            <div class="table-responsive">
	            	<table class="table table-hover">
	            		<thead>
	            			<tr>
	            				<th class="td0_5">S/N</th>
	            				<th class="td1">Title</th>
	            				<th>Admin</th>
	            				<th>Status</th>
	            				<th>Set Active</th>
	            				<th>Set Paused</th>
	            				<th>Set Sold</th>
	            				<th>Delete</th>
	            			</tr>
	            		</thead>
	            		<tbody>
	            		@foreach($products as $product)  
	            			<tr>
	            				<td class="td0_5">{{$loop->iteration}}</td>
	            				<td class="td1 small"><a href="/news/{{$product->slug}}">{{ str_limit($product->title, 50) }}</a></td>
	            				<td> </td>
	            				<td class="small">{{$product->status}}</td>
	            				<td><a href="/admin/product/active/{{$product->slug}}" class="btn btn-info btn-xs">Activate</a></td>
	            				<td><a href="/admin/product/pause/{{$product->slug}}" class="btn btn-info btn-xs">Pause</a></td>
	            				<td><a href="/admin/product/sold/{{$product->slug}}" class="btn btn-info btn-xs">Sold</a></td>
	            				<td>
	            					<form action="/admin/product/delete/{{$product->id}}" method="post" value="DELETE" class="form-inline first-form" style="paddng-left: 100px;" role="form" files="true" enctype="multipart/form-data">
						                {{ csrf_field() }}
						                <input type="text" name="product_id" value="{{$product->id}}" hidden="true">
						                <input type="submit" name="submit" id="submit" class="form-control btn btn-xs btn-danger" value="Delete Product">
						            </form>
	            				</td>
	            			</tr>
	            		 @endforeach
	            		</tbody>
	            	</table>
	            </div>
        	</div>
	</section>
	</div>
	@include('partials/sidebar')
	</div>
	
	
	
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function () {

});


</script>
