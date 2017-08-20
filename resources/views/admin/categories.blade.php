@extends('layouts.new_master')

@section('content')
	<div style="height: 20px"></div>
	<div class="container">
	<div style="height: 10px"></div>
	<div class="row">
	<div class="col-xs-12 col-sm-8 col-md-9 col-lg-9">
	<section class="container-fluid">
		<h4 class="text-center">Manage Your Categories</h4>
		<a href="#" id="show">Add New Category</a>
		<a href="#" id="hide" style="display: none;">Hide</a>
		<form action="/categoriess" method="post" class="form-inline first-form" style="paddng-left: 100px; display: none;" role="form" files="true" enctype="multipart/form-data" id="form">
            {{ csrf_field() }}
            <input type="text" name="name" id="name" class="form-control" placeholder="Enter Category Name" required="true">
            <input type="file" name="image" class="btn btn-success" required="true">
            <input type="submit" name="submit" id="submit" class="form-control btn btn-xs btn-warning" value="Create Category">
        </form>
		<hr>
		
			@foreach($categories as $category)
			<div class="row">
				<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
					<div class="row">
						<div class="col-xs-4 col-sm-4 col-md-4 col-lg-3">
							{{$category->name}}
						</div>
						<div class="col-xs-6 col-sm-6 col-md-6 col-lg-9">
							<form action="/category/{{$category->id}}" method="post" class="form-inline first-form" style="paddng-left: 100px;" role="form" files="true" enctype="multipart/form-data">
				                {{ csrf_field() }}
				                <input type="text" name="name" id="name" class="form-control" placeholder="New Category Name" required="true" value="{{$category->name}}">
				                <input type="submit" name="submit" id="submit" class="form-control btn btn-xs btn-warning" value="Update Name">
				            </form>
						</div>
					</div>
					<div style="height: 20px;"></div>
				</div>
				<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
						<div class="row">
							<div class="col-xs-4 col-sm-4 col-md-4 col-lg-3">
								<img src="{{ asset('categories/'.$category->image) }}" style="height: 60px;" width="100%" class="img-responsive">
							</div>
							<div class="col-xs-6 col-sm-6 col-md-6 col-lg-9">
								<form action="/category/{{$category->id}}" method="post" class="form-inline first-form" style="paddng-left: 100px;" role="form" files="true" enctype="multipart/form-data">
					                {{ csrf_field() }}
					                <input type="file" name="image" class="btn btn-success" required="true">
					                <input type="submit" name="submit" id="submit" class="form-control btn btn-xs btn-warning" value="Update Picture">
					            </form>
							</div>
						</div>	
					<div style="height: 20px;"></div>
				</div>
			</div>
			<form action="/category/delete/{{$category->id}}" method="post" value="DELETE" id="category-delete" class="form-inline first-form" style="paddng-left: 100px;" role="form" files="true" enctype="multipart/form-data">
                {{ csrf_field() }}
                <input type="text" name="category_id" value="{{$category->id}}" hidden="true">
                <input type="submit" name="submit" id="submit" class="form-control btn btn-xs btn-danger" value="Delete Category" onclick="logou();">
            </form>
            <script>
                function logout() {
                    if (confirm('Delete this category, cannot undo this action. Continue?')){
                        event.preventDefault();
                        document.getElementById('category-delete').submit();
                    } else {
                        event.preventDefault();
                    }
                }
                
            </script>
			<hr>
			@endforeach
		
		
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
