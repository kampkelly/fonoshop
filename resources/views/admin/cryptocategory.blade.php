@extends('layouts.new_master')

@section('content')
	<div style="height: 20px"></div>
	<div class="container">
	<div style="height: 10px"></div>
	<div class="row">
	<div class="col-xs-12 col-sm-8 col-md-9 col-lg-9">
	<section class="container-fluid">
		<h4 class="text-center">Manage Your Cryptocategory</h4>
		<a href="#" id="show">Add CryptoCategory</a>
			<a href="#" id="hide" style="display: none;">Hide</a>
		<form action="/cryptocategories" method="post" class="form-inline first-form" style="paddng-left: 100px; display: none;" role="form" files="true" enctype="multipart/form-data" id="form">
            {{ csrf_field() }}
            <input type="text" name="name" id="name" class="form-control" placeholder="Enter Crypto Category Name" required="true">
            <input type="submit" name="submit" id="submit" class="form-control btn btn-xs btn-warning" value="Create CryptoCategory">
        </form>
		<hr>
			<div class="container-fluid all_innovations" style="padding-left: 30px">
	            <div class="table-responsive">
	            	<table class="table table-hover">
	            		<thead>
	            			<tr>
	            				<th class="td0_5">S/N</th>
	            				<th class="td1">Title</th>
	            				<th>Admin</th>
	            				<th>Edit</th>
	            				<th>Delete</th>
	            			</tr>
	            		</thead>
	            		<tbody>
	            		@foreach($cryptocategories as $cryptocategory)  
	            			<tr>
	            				<td class="td0_5">{{$loop->iteration}}</td>
	            				<td class="td1 small">{{$cryptocategory->currency_name}}</td>
	            				<td> </td>
	            				<td>
	            					<form action="/cryptocategory/{{$cryptocategory->id}}" method="post" class="form-inline first-form" style="paddng-left: 100px;" role="form" files="true" enctype="multipart/form-data">
						                {{ csrf_field() }}
						                <input type="text" name="name" id="name" class="form-control" placeholder="New CryptoCategory Name" required="true" value="{{$cryptocategory->currency_name}}">
						                <input type="submit" name="submit" id="submit" class="form-control btn btn-xs btn-warning" value="Update Name">
						            </form>
	            				</td>
	            			
	            				<td>
	            					<form action="/cryptocategory/delete/{{$cryptocategory->id}}" method="post" value="DELETE" class="form-inline first-form" id="cryptocategory-delete" style="paddng-left: 100px;" role="form" files="true" enctype="multipart/form-data">
						                {{ csrf_field() }}
						                <input type="text" name="cryptocategory_id" value="{{$cryptocategory->id}}" hidden="true">
						                <input type="submit" name="submit" id="submit" class="form-control btn btn-xs btn-danger" value="Delete Cryptocategory" onclick="de();">
						            </form>
						            <script>
						                function del() {
						                    if (confirm('Delete this Cryptocategory, cannot undo this action. Continue?')){
						                        event.preventDefault();
						                        document.getElementById('cryptocategory-delete').submit();
						                    } else {
						                        event.preventDefault();
						                    }
						                }
						                
						            </script>
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
	$("#show").click(function() {
		$('#form').slideDown();
		$('#show').hide();
		$('#hide').show();
	}); 
	$("#hide").click(function() {
		$('#form').slideUp();
		$('#hide').hide();
		$('#show').show();
	}); 
});
</script>
