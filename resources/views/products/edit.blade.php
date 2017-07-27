@extends('layouts.master')

@section('content')
	<div style="height: 60px"></div>
	<h4 class="text-center">Edit this product</h4>
	<div style="height: 40px"></div>
	<section class="container">
		<form action="/product/{{$product->slug}}" method="POST" class="form-horizontal first-form" role="form" files="true" enctype="multipart/form-data">
				{{ csrf_field() }}
				<div class="form-group">
	                <label for="product_title" class="col-xs-12 col-sm-4 col-md-4 col-lg-3 control-label">Product Title <span class="asterisks">*</span></label>
	                <div class="col-xs-12 col-sm-8 col-md-8 col-lg-6">
						<input type="text" name="product_title" id="product_title" class="form-control" required="required" placeholder="Product Title" value="{{$product->title}}">
					</div>
				</div>
				<div class="form-group">
	                <label for="price" class="col-xs-12 col-sm-4 col-md-4 col-lg-3 control-label">Price <span class="asterisks">*</span></label>
	                <div class="col-xs-12 col-sm-8 col-md-8 col-lg-6">
						<input type="text" name="price" id="price" class="form-control" required="required" placeholder="Price" value="{{$product->price}}">
					</div>
				</div>
				<div class="form-group">
	                <label for="price" class="col-xs-12 col-sm-4 col-md-4 col-lg-3 control-label">Description <span class="asterisks">*</span></label>
	                <div class="col-xs-12 col-sm-8 col-md-8 col-lg-6">
	                	<textarea class="form-control" rows="2" columns="1" name="description" placeholder="Enter Description" value="{{$product->description}}"></textarea>
					</div>
				</div>
				<div class="row">
					<div class="col-xs-6 col-sm-6 col-md-6 col-lg-1 col-lg-offset-3">
						@if($product->condition == 'new')
							<div class="radio">
								<label>
									<input type="radio" name="condition" id="input" value="new" checked="true">
									New
								</label>
							</div>
							@else
								<div class="radio">
									<label>
										<input type="radio" name="condition" id="input" value="new">
										New
									</label>
								</div>
							@endif
					</div>
					<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
						@if($product->condition == 'used')
							<div class="radio">
								<label>
									<input type="radio" name="condition" id="input" value="used" checked="true">
									Used
								</label>
							</div>
						@else
								<div class="radio">
									<label>
										<input type="radio" name="condition" id="input" value="used">
										Used
									</label>
								</div>
						@endif
					</div>
				</div>
				<div style="height: 10px;"></div>
				<div class="form-group">
	                <label for="image" class="col-xs-12 col-sm-4 col-md-4 col-lg-3 control-label">Cover Photo <span class="asterisks">*</span></label>
	                <div class="col-xs-12 col-sm-8 col-md-8 col-lg-6">
					<!--	<input type="file" name="photo" id="photo" placeholder="Enter Title" class="btn btn-success"> -->
						<input type="file" name="image" id="image" class="btn btn-success" value="{{$product->image}}">
					</div>
				</div>
				<div class="form-group">
	                <label for="photo" class="col-xs-12 col-sm-4 col-md-4 col-lg-3 control-label">Add more photos <span class="asterisks">*</span></label>
	                <div class="col-xs-12 col-sm-8 col-md-8 col-lg-6">
					<!--	<input type="file" name="photo" id="photo" placeholder="Enter Title" class="btn btn-success"> -->
						<input type="file" name="photos[]" id="photo" class="btn btn-success" value="{{$product->image}}" multiple />
					</div>
				</div>
				<div class="form-group">
	                <label for="phone" class="col-xs-12 col-sm-4 col-md-4 col-lg-3 control-label">Phone <span class="asterisks">*</span></label>
	                <div class="col-xs-12 col-sm-8 col-md-8 col-lg-6">
						<input type="text" name="phone" id="phone" class="form-control" required="required" placeholder="Phone Number" value="{{$product->phone}}">
					</div>
				</div>
				<div class="form-group">
	                <label for="category_id" class="col-xs-12 col-sm-4 col-md-4 col-lg-3 control-label">Category <span class="asterisks">*</span></label>
	                <div class="col-xs-12 col-sm-8 col-md-8 col-lg-6">
                        <select name="category_id" id="category_id" class="form-control">
                            @foreach($categories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>
				</div>
				<div class="form-group">
	                <label for="status" class="col-xs-12 col-sm-4 col-md-4 col-lg-3 control-label">Status <span class="asterisks">*</span></label>
	                <div class="col-xs-12 col-sm-8 col-md-8 col-lg-6">
                        <select name="status" id="status" class="form-control">
                        	<option value="{{$product->status}}">{{$product->status}}</option>
                        	<option value="active">Active</option>
                        	<option value="paused">Pause</option>
                        	<option value="sold">Sold</option>
                        </select>
                    </div>
				</div>
				 <div class="form-group">
                    <div class="col-md-6 col-md-offset-3">
                        <button type="submit" class="btn btn-primary btn-block btn-sm">
                            Update Product
                        </button>
                    </div>
                </div>         
				</form>
				<div class="row"> 
				@foreach($product->productsphoto as $photo)
			  		<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
			  			<img src="{{ asset('uploads/'.$photo->image) }}" class="img-responsive img-rounded" style="height: 12em;">
			  			<form action="/product/{{$photo->id}}/image-deleted" method="post" value="DELETE" role="form">
	                         {{ csrf_field() }}
	                         <input type="text" name="photo_id" value="{{$photo->id}}" hidden="true">
	                         <input type="submit" name="delete" value="remove" class="btn btn-danger btn-xs">
                         </form> 
			  		</div>
		  		@endforeach
				</div>
	
	</section>
	
	
	
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript">



</script>
