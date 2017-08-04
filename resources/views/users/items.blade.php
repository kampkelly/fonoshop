<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Fonoshop</title>
  <link href="{{ asset('bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <link href="{{ asset('css/headmobile.css') }}" rel="stylesheet">
  <link href="{{ asset('css/style.css') }}" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
  <script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('js/headscript.js') }}"></script>
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script src="{{ asset('js/script.js') }}"></script>
  
  <script>
  $( function() {
    $( "#tabs" ).tabs();
  } );
  $( function() {
    $( "input" ).checkboxradio();
  } );
  </script>
</head>
<body>
@include('partials/new_header')
<div style="height: 70px;"></div>
 <div class="container">
	 <div class="row">
		<div class="col-xs-12 col-sm-8 col-md-9 col-lg-9">
		<h4 class="text-center">My Products</h4>
		<div id="tabs">
		  <ul>
		    <li><a href="#tabs-1">Products</a></li>
		    <li><a href="#tabs-2">My Cryptocurrencies</a></li>
		    <li><a href="#tabs-3">Empty</a></li>
		  </ul>
		  <div id="tabs-1">
		  	<div class="row">
			  	@foreach($products as $product)
			  	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 panel panel-default myitems">
			  		<div class="row">
				  		<div class="col-xs-3 col-sm-4 col-md-4 col-lg-3">
				  			<img src="{{ asset('uploads/'.$product->image) }}" class="img-responsive img-thumbnail">
				  			<a href="/product/edit/{{$product->slug}}" style="color: white;" class="btn btn-primary btn-xs btn-block">Update</a>
				  		</div>
				  		<div class="col-xs-9 col-sm-8 col-md-8 col-lg-9">
				  			<div class="panel panel-info">
				  				<div class="panel-heading">
				  					<h3 class="panel-title">{{$product->title}}</h3><span style="color: green;">#{{$product->price}}</span> <span style="color: green;">{{$product->condition}}</span> <span class="pull-right small">{{$product->category->name}}<br>{{$product->status}}</span>
				  				</div>
				  				<div class="panel-body">
				  					<p class="small">{{str_limit($product->description, 100)}}</p>
				  				</div>
			  					<div class="panel-foter">
			  						<p class="small">Phone: {{$product->phone}}, City: {{$product->user->city}}</p>
			  					</div>
				  			</div>
				  		</div>
			  		</div>	
			  		<div class="row more-images">
			  			<h6 class="text-center" style="text-decoration: underline;">Addditional Images</h6>
			  			@if(count($product->productsphoto) > 0)
			  			@foreach($product->productsphoto as $photo)
			  			<style type="text/css">
			  				.ch img:hover {
			  					cursor: pointer;
			  					position: absolute;
			  					transform: scale(2);
			  					transition: 2s;
			  					z-index: 99;
			  				}
			  			</style>
					  		<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 ch">
					  			<img src="{{ asset('uploads/'.$photo->image) }}" class="img-responsive img-rounded">
					  		</div>
				  		@endforeach
				  		@else
				  			<p class="text-center text-warning small">No additional images</p>
				  		@endif
			  		</div>	
			  	</div>
				@endforeach
			</div>
		    
		  </div>
		  <div id="tabs-2" class="currency">
		  	@foreach($cryptocurrencies as $cryptocurrency)
				<p class="small">Am selling {{$cryptocurrency->currency}}s at {{$cryptocurrency->price}}/{{$cryptocurrency->currency}} <a href="/cryptocurrency/edit/{{$cryptocurrency->id}}">Edit</a></p>
			@endforeach
		    
		  </div>
		  <div id="tabs-3">
		    <p>Empty!</p>
		  </div>
		</div>
		<div class="widget">
  <h1>Checkbox and radio button widgets</h1>
 
  <h2>Radio Group</h2>
  <fieldset>
    <legend>Select a Location: </legend>
    <label for="radio-1">New York</label>
    <input type="radio" name="radio-1" id="radio-1">
    <label for="radio-2">Paris</label>
    <input type="radio" name="radio-1" id="radio-2">
    <label for="radio-3">London</label>
    <input type="radio" name="radio-1" id="radio-3">
  </fieldset>
 
  <h2>Checkbox</h2>
  <fieldset>
    <legend>Hotel Ratings: </legend>
    <label for="checkbox-1">2 Star</label>
    <input type="checkbox" name="checkbox-1" id="checkbox-1">
    <label for="checkbox-2">3 Star</label>
    <input type="checkbox" name="checkbox-2" id="checkbox-2">
    <label for="checkbox-3">4 Star</label>
    <input type="checkbox" name="checkbox-3" id="checkbox-3">
    <label for="checkbox-4">5 Star</label>
    <input type="checkbox" name="checkbox-4" id="checkbox-4">
  </fieldset>
 
  <h2>Checkbox nested in label</h2>
  <fieldset>
    <legend>Bed Type: </legend>
    <label for="checkbox-nested-1">2 Double
      <input type="checkbox" name="checkbox-nested-1" id="checkbox-nested-1">
    </label>
    <label for="checkbox-nested-2">2 Queen
      <input type="checkbox" name="checkbox-nested-2" id="checkbox-nested-2">
    </label>
    <label for="checkbox-nested-3">1 Queen
      <input type="checkbox" name="checkbox-nested-3" id="checkbox-nested-3">
    </label>
    <label for="checkbox-nested-4">1 King
      <input type="checkbox" name="checkbox-nested-4" id="checkbox-nested-4">
    </label>
  </fieldset>
</div>
		 
		 </div>
		 @include('partials/sidebar')
	 </div>
 </div>
<script type="text/javascript">
$(document).ready(function () {
	$(".drop").mouseenter(function() {
	//	$(".drop ul").show("");
		$(".drop ul").slideDown();
	}); 
	$(".drop").mouseleave(function() {
		$(".drop ul").hide();
	}); 
}); 
</script> 
</body>
</html>