@extends('layouts.new_master')

@section('content')
	<div style="height: 20px"></div>
	<div class="container">
	<div style="height: 10px"></div>
	<div class="row">
	<div class="col-xs-12 col-sm-8 col-md-9 col-lg-9">
	<section class="container-fluid">
		<h4 class="text-center">Manage Users</h4>
		<a href="/admin/post/new" id="show">Create New Post</a>
		<hr>
			<div class="container-fluid all_innovations" style="padding-left: 30px">
	            <div class="table-responsive">
	            	<table class="table table-hover">
	            		<thead>
	            			<tr>
	            				<th class="td0_5">S/N</th>
	            				<th class="td1">Name</th>
	            				<th>Admin</th>
	            				<th>Status</th>
	            				<th>Last Profile Update</th>
	            				<th>Block</th>
	            				<th>Delete</th>
	            			</tr>
	            		</thead>
	            		<tbody>
	            		@foreach($users as $user)  
	            			<tr>
	            				<td class="td0_5">{{$loop->iteration}}</td>
	            				<td class="td1 small"><a href="/news/{{$user->id}}">{{ str_limit($user->name, 50) }}</a></td>
	            				<td> </td>
	            				<td>{{$user->status}}</td>
	            				<td class="small">{{$user->updated_at->diffForHumans()}}</td>
	            				<td class="small"></td>
	            				<td class="small"></td>
	            			<!--	<td><a href="/admin/post/edit/{{$user->id}}" class="btn btn-info btn-xs">Block</a></td>
	            				<td><a href="/admin/post/delete/{{$user->id}}" class="btn btn-danger btn-xs">Delete</a></td> -->
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
