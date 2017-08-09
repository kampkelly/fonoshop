@extends('layouts.new_master')

@section('content')
	<div style="height: 0px"></div>
	<div class="container">
	<div style="height: 10px"></div>
	<div class="row">
	<div class="col-xs-12 col-sm-8 col-md-9 col-lg-9">
	<section class="container-fluid">
		<h4 class="text-center">Add a new product</h4>
		<form action="/products" method="POST" class="form-horizontal first-form" role="form" files="true" enctype="multipart/form-data">
				{{ csrf_field() }}
				<div class="form-group">
                    <label for="name" class="col-xs-12 col-sm-4 col-md-3 col-lg-3 control-label">Name <span class="asterisks">*</span></label>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                        <input type="text" name="name" id="name" class="form-control" required="required" placeholder="Name" required="true">
                    </div>
                </div>
				<div class="form-group">
	                <label for="product_title" class="col-xs-12 col-sm-4 col-md-3 col-lg-3 control-label">Product Title <span class="asterisks">*</span></label>
	                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
						<input type="text" name="product_title" id="product_title" class="form-control" required="required" placeholder="Product Title">
					</div>
				</div>
				<div class="form-group">
	                <label for="price" class="col-xs-12 col-sm-4 col-md-3 col-lg-3 control-label">Price <span class="asterisks">*</span></label>
	                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
						<input type="text" name="price" id="price" class="form-control" required="required" placeholder="Price">
					</div>
				</div>
				<div class="form-group">
	                <label for="price" class="col-xs-12 col-sm-4 col-md-3 col-lg-3 control-label">Description <span class="asterisks">*</span></label>
	                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
	                	<textarea class="form-control" rows="2" columns="1" name="description" placeholder="Enter Description"></textarea>
					</div>
				</div>
				<div class="row">
					<div class="col-xs-2 col-sm-1 col-md-1 col-lg-1 col-xs-offset-2 col-sm-offset-4 col-md-offset-3 col-lg-offset-3">
						<div class="radio">
							<label>
								<input type="radio" name="condition" id="input" value="new">
								New
							</label>
						</div>
					</div>
					<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
						<div class="radio">
							<label>
								<input type="radio" name="condition" id="input" value="used">
								Used
							</label>
						</div>
					</div>
				</div>
				<div style="height: 10px;"></div>
				<div class="form-group">
	                <label for="image" class="col-xs-12 col-sm-4 col-md-3 col-lg-3 control-label">Cover Photo <span class="asterisks">*</span></label>
	                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
					<!--	<input type="file" name="photo" id="photo" placeholder="Enter Title" class="btn btn-success"> -->
						<input type="file" name="image" id="image" class="btn btn-success">
					</div>
				</div>
				<div class="form-group">
	                <label for="photo" class="col-xs-12 col-sm-4 col-md-3 col-lg-3 control-label">Add more photos <span class="asterisks">*</span></label>
	                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
					<!--	<input type="file" name="photo" id="photo" placeholder="Enter Title" class="btn btn-success"> -->
						<input type="file" name="photos[]" id="photo" class="btn btn-success" multiple />
					</div>
				</div>
				<div class="form-group">
	                <label for="phone" class="col-xs-12 col-sm-4 col-md-3 col-lg-3 control-label">Phone <span class="asterisks">*</span></label>
	                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
						<input type="text" name="phone" id="phone" class="form-control" required="required" placeholder="Phone Number">
					</div>
				</div>
				<div class="form-group">
	                <label for="phone" class="col-xs-12 col-sm-4 col-md-3 col-lg-3 control-label">Category <span class="asterisks">*</span></label>
	                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                        <select name="category_id" id="category_id" class="form-control">
                            @foreach($categories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>
				</div>
				<div class="form-group">
                    <label for="state" class="col-xs-12 col-sm-4 col-md-3 col-lg-3 control-label">State <span class="asterisks">*</span></label>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                        <select name="state" id="state" class="form-control">
                            @foreach($states as $state)
                                <option value="{{$state}}" required="true">{{$state}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="city" class="col-xs-12 col-sm-4 col-md-3 col-lg-3 control-label">City <span class="asterisks">*</span></label>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                        <input type="text" name="city" id="city" class="form-control" required="required" placeholder="Enter City" required="true">
                    </div>
                </div>
				 <div class="form-group">
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 col-sm-offset-4 col-md-offset-3 col-lg-offset-3">
                        <button type="submit" class="btn btn-primary btn-block btn-sm">
                            Add Product
                        </button>
                    </div>
                </div>         
				</form>
	
	</section>
	</div>
	@include('partials/sidebar')
	</div>
	
	
	
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript">



</script>
