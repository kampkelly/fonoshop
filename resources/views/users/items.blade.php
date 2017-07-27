<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>jQuery UI Tabs - Default functionality</title>
  <link href="{{ asset('bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <link href="{{ asset('css/style.css') }}" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
  <script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script src="{{ asset('js/script.js') }}"></script>
  <script>
  $( function() {
    $( "#tabs" ).tabs();
  } );
  </script>
</head>
<body>
@include('partials/header')
<div style="height: 50px;"></div>
 
 <h4 class="text-center">My Items</h4>
<div id="tabs">
  <ul>
    <li><a href="#tabs-1">Products</a></li>
    <li><a href="#tabs-2">My Cryptocurrencies</a></li>
    <li><a href="#tabs-3">Empty</a></li>
  </ul>
  <div id="tabs-1">
  	<div class="row">
	  	@foreach($products as $product)
	  	<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 panel panel-default" style="height: 27em;">
	  		<div class="row">
		  		<div class="col-xs-6 col-sm-6 col-md-6 col-lg-4">
		  			<img src="{{ asset('uploads/'.$product->image) }}" class="img-responsive img-thumbnail" style="height: 12em;">
		  			<a href="/product/edit/{{$product->slug}}" style="color: white;" class="btn btn-primary btn-xs btn-block">Edit this product</a>
		  		</div>
		  		<div class="col-xs-6 col-sm-6 col-md-6 col-lg-8">
		  			<div class="panel panel-info">
		  				<div class="panel-heading">
		  					<h3 class="panel-title">{{$product->title}}</h3><span style="color: green;">#{{$product->price}}</span> <span style="color: green;">{{$product->condition}}</span> <span class="pull-right small">{{$product->category->name}}<br>{{$product->status}}</span>
		  				</div>
		  				<div class="panel-body">
		  					<p class="small">{{$product->description}}</p>
		  				</div>
	  					<div class="panel-footer">
	  						<p class="small">Phone: {{$product->phone}}, City: {{$product->user->city}}</p>
	  					</div>
		  			</div>
		  		</div>
	  		</div>	
	  		<div class="row">
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
			  			<img src="{{ asset('uploads/'.$photo->image) }}" class="img-responsive img-rounded" style="height: 7em;">
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
  <div id="tabs-2">
  	@foreach($cryptocurrencies as $cryptocurrency)
		<p>Am selling {{$cryptocurrency->currency}}s at {{$cryptocurrency->price}}/{{$cryptocurrency->currency}}</p>
		<a href="/cryptocurrency/edit/{{$cryptocurrency->id}}">Edit</a>
	@endforeach
    
  </div>
  <div id="tabs-3">
    <p>Empty!</p>
  </div>
</div>
 
 
</body>
</html>