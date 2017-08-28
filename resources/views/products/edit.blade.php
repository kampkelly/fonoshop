@extends('layouts.new_master')

@section('content')
<style>
    input[type="file"] {

     display:block;
    }
    .imageThumb {
     max-height: 75px;
     border: 2px solid;
     margin: 10px 10px 0 0;
     padding: 1px;
     }
</style>
@include('partials/mobile_search')
	<div style="height: 0px"></div>
	<div style="height: 0px"></div>
	<div class="row">
	<div class="col-xs-12 col-sm-8 col-md-9 col-lg-9">
	<section class="container-fluid">
		<h4 class="text-center">Edit this product</h4>
		<a href="#pics" class="pull-right" style="color: #D78512;">Manage Aditional Pics</a>
		<form action="/product/{{$product->slug}}" method="POST" class="form-horizontal first-form" role="form" files="true" enctype="multipart/form-data">
				{{ csrf_field() }}
				<div class="form-group">
                    <label for="name" class="col-xs-12 col-sm-4 col-md-3 col-lg-3 control-label">Full Name <span class="asterisks">*</span></label>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                        <input type="text" name="name" id="name" class="form-control" required="required" placeholder="Full Name" required="true" value="{{$product->name}}">
                    </div>
                </div>
				<div class="form-group">
	                <label for="product_title" class="col-xs-12 col-sm-4 col-md-3 col-lg-3 control-label">Product Title <span class="asterisks">*</span></label>
	                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
						<input type="text" name="product_title" id="product_title" class="form-control" required="required" placeholder="Product Title" value="{{$product->title}}">
					</div>
				</div>
				<div class="form-group">
	                <label for="price" class="col-xs-12 col-sm-4 col-md-3 col-lg-3 control-label">Price <span class="asterisks">*</span></label>
	                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
						<input type="number" name="price" id="price" class="form-control" required="required" placeholder="Price in naira" value="{{$product->price}}">
					</div>
				</div>
				<div class="form-group">
	                <label for="price" class="col-xs-12 col-sm-4 col-md-3 col-lg-3 control-label">Description <span class="asterisks">*</span></label>
	                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
	                	<textarea class="form-control" rows="6" columns="1" id="product_content" name="description" placeholder="Enter Description" value="{{$product->description}}"></textarea>
					</div>
				</div>
				<div id="hidden_content" style="display: none;">
                    {{$product->description}}
                 </div>
				<div class="row">
					<div class="col-xs-2 col-sm-1 col-md-1 col-lg-1 col-xs-offset-2 col-sm-offset-4 col-md-offset-3 col-lg-offset-3">
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
	                <label for="image" class="col-xs-12 col-sm-4 col-md-3 col-lg-3 control-label">Cover Photo <span class="asterisks">*</span></label>
	                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
					<!--	<input type="file" name="photo" id="photo" placeholder="Enter Title" class="btn btn-success"> -->
						<input type="file" name="image" id="image" class="btn btn-success" value="{{$product->image}}">
					</div>
				</div>
				<div class="form-group">
	                <label for="photo" class="col-xs-12 col-sm-4 col-md-3 col-lg-3 control-label">Add more photos <span class="asterisks">*</span></label>
	                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-8">
					<!--	<input type="file" name="photo" id="photo" placeholder="Enter Title" class="btn btn-success"> -->
						<input type="file" name="photos[]" id="files" class="btn btn-success" value="{{$product->image}}" multiple />
					</div>
				</div>
				<div class="form-group">
	                <label for="phone" class="col-xs-12 col-sm-4 col-md-3 col-lg-3 control-label">Phone <span class="asterisks">*</span></label>
	                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
						<input type="text" name="phone" id="phone" class="form-control" required="required" placeholder="Phone Number" value="{{$product->phone}}">
					</div>
				</div>
				<div class="form-group">
	                <label for="category_id" class="col-xs-12 col-sm-4 col-md-3 col-lg-3 control-label">Category <span class="asterisks">*</span></label>
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
                        <input type="text" name="state" id="state" class="form-control" required="required" placeholder="Enter City" required="true" title="Enter City" value="Edo" disabled="true">
                    </div>
                </div>
				<div class="form-group">
                    <label for="city" class="col-xs-12 col-sm-4 col-md-3 col-lg-3 control-label">City <span class="asterisks">*</span></label>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                        <select name="city" id="city" class="form-control">
                        		<option value="{{$product->city}}" required="true">{{$product->city}}</option>
                            @foreach($cities as $city)
                                <option value="{{$city}}" required="true">{{$city}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
				<div class="form-group">
	                <label for="status" class="col-xs-12 col-sm-4 col-md-3 col-lg-3 control-label">Status <span class="asterisks">*</span></label>
	                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                        <select name="status" id="status" class="form-control">
                        	<option value="{{$product->status}}">{{$product->status}}</option>
                        	<option value="active">Active</option>
                        	<option value="paused">Pause</option>
                        	<option value="sold">Sold</option>
                        </select>
                    </div>
				</div>
				 <div class="form-group">
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 col-sm-offset-4 col-md-offset-3 col-lg-offset-3">
                        <button type="submit" class="btn btn-primary btn-block btn-sm">
                            Update Product
                        </button>
                    </div>
                </div>         
				</form>
				<div class="row" id="pics"> 
				@foreach($product->productsphoto as $photo)
			  		<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
			  			<img src="{{ asset('uploads/photos/'.$photo->image) }}" class="img-responsive img-rounded" style="height: 12em;">
			  			<form action="/product/{{$photo->id}}/image-deleted" method="post" value="DELETE" role="form">
	                         {{ csrf_field() }}
	                         <input type="text" name="photo_id" value="{{$photo->id}}" hidden="true">
	                         <input type="submit" name="delete" value="remove" class="btn btn-danger btn-xs">
                         </form> 
			  		</div>
		  		@endforeach
				</div>
	
	</section>
	</div>
	@include('partials/sidebar')
	</div>
	
	
	
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function () {
	 var x = document.getElementById('hidden_content').textContent;
    document.getElementById('product_content').value = x;

	$("#files").click(function() {
		$('#files').val("");
        $('.imageThumb').remove();
	}); 

	if(window.File && window.FileList && window.FileReader) {
        $("#files").on("change",function(e) {
            var files = e.target.files ,
            filesLength = files.length ;
            for (var i = 0; i < filesLength ; i++) {
                var f = files[i]
                var fileReader = new FileReader();
                fileReader.onload = (function(e) {
                    var file = e.target;
                    $("<img></img>",{
                        class : "imageThumb",
                        src : e.target.result,
                        title : file.name
                    }).insertAfter("#files"); 
                 /*   $("<span class=\"pip\">" +
		            "<img class=\"imageThumb\" src=\"" + e.target.result + "\" title=\"" + file.name + "\"/>" +
		            "<span class=\"remove text-danger\" style=\"cursor:pointer;\">Remove image</span>" +
		            "</span>").insertAfter("#files");
		          $(".remove").click(function(){
		            $(this).parent(".pip").remove();
		        //    $('this').val("");
		          }); */
               });
               fileReader.readAsDataURL(f);
           }
      });
     } else { alert("Your browser doesn't support to File API") }
});


</script>
