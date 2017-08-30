<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>SalesNaija</title>
 <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
         <!-- Compiled and minified CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">

  <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
  <!-- Compiled and minified JavaScript -->
  <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Lora" rel="stylesheet">

</head>
<style type="text/css">
	body {
		font-family: 'Lato', sans-serif;
	}
</style>
<body>
<ul id="dropdown1" class="dropdown-content">
  <li><a href="/myprofile/update/{{Auth::user()->email}}">My Profile</a></li>
  <li><a href="/myitems/{{Auth::user()->email}}">My Products</a></li>
  <li><a href="/contact">Contact</a></li>
  <li class="divider"></li>
   <li>
        <a href="{{ route('logout') }}" class="small"  
            onclick="event.preventDefault();
                     document.getElementById('logout-form').submit();">
            Logout
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
        </form>
    </li>
</ul>
<nav> <!--header-->
  <div class="nav-wrapper orange darken-1">
    <a href="/" class="brand-logo ceter"><img src="{{ asset('logo.png') }} " alt="logo" class="responsive-img" style="width: 160px;">SalesNaija</a>
    <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
    <ul class="right hide-on-med-and-down">
      <li><a href="/products">Product</a>
      <li><a href="/cryptocurrencies">Cryptocurrencies</a>
      <li class="rigt"><a href="/cryptocurrency/new">Sell Cryptocurrency</a>

      	

      @if(Auth::check())
        @if(checkPermission(['user']))
        <li><a href="/new/product">Sell A Product</a>
        @endif
        @if(checkPermission(['admin']))
        	<li><a href="/admin/panel">Admin Panel</a>
        @endif
      @endif
      </li>
      @if(Auth::check())
      <li class="riht"><a class="dropdown-button" href="#!" data-activates="dropdown1">My Account<i class="material-icons right">arrow_drop_down</i></a></li>
      @else
      	<li><a href="/register">Register</a></li>
	      <li><a href="/login">Login</a></li>
      @endif
      <!-- Dropdown Trigger -->
      
    </ul>
    <ul class="side-nav grey lighten-3" id="mobile-demo">
        <li><a href="/" class="orange-text">Home</a></li>
        <li><a href="/products" class="orange-text">Products</a></li>
        <li><a href="/cryptocurrencies" class="orange-text">Cryptocurrencies</a></li>
        <li><a href="/cryptocurrency/new" class="orange-text">Sell Cryptocurrency</a></li>
        @if(Auth::check())
        <li><a href="/new/product" class="orange-text">Sell Product</a></li>
        <li><a href="/myprofile/update/{{Auth::user()->email}}" class="orange-text">My Profile</a></li>
        <li><a href="/myitems/{{Auth::user()->email}}" class="orange-text">My Products</a></li>
        <li><a href="/contact" class="orange-text">Contact</a></li>
         <li>
	        <a href="{{ route('logout') }}" class="small orange-text"  
	            onclick="event.preventDefault();
	                     document.getElementById('logout-form').submit();">
	            Logout
	        </a>

	        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
	            {{ csrf_field() }}
	        </form>
	    </li>
        @else
        <li><a href="/contact" class="orange-text">Contact</a></li>
        <li><a href="/login" class="orange-text">Login</a></li>
        <li><a href="/register" class="orange-text">Register</a></li>
        @endif
      </ul>
  </div>
</nav>

<div class="row"> <!--start of row-->
	<div class="col s12 m12 l9">  <!-- column 9-->
  <div id="ajax-demo">
  f
  </div>
		<h5 class="center-align">My Products</h5>
		<div class="card-tabs">
	      <ul class="tabs tabs-fixd-width">
	        <li class="tab"><a href="#test5" class="brown-text">My Products</a></li>
	        <li class="tab"><a href="#test4" class="brown-text">Cryptocurrencies</a></li>
	      </ul>
	    </div>
	    <div style="height: 20px;"></div>
	    <div id="test5"> <!--products tab content-->
	    	@foreach($products as $product)
	    	<div class="row"> <!--product row-->
	    		<div class="col s12"> <!--top links-->
	    			<span class="right small"><span class="hide-on-small-only">Category:</span> {{$product->category->name}}<br><span class="hide-on-small-only">Status:</span> {{$product->status}}</span>
	    			<h6 class="panel-title"><a href="/product/{{$product->slug}}">{{$product->title}}</a></h6><span style="color: green;"> &#8358;{{$product->price}}</span> <span style="color: green;">{{$product->condition}}</span> 
	    			<p>{{str_limit($product->description, 100)}}</p>
	    		</div>
	    		<div class="col s12">  <!--images and links-->
	    			<div class="row">
		    			<div class="col s6 m3 l6">  <!--cover image-->
		    			 	<img src="{{ asset('uploads/cover/'.$product->image) }}" class="responsive-img materialboxed">
		    			 </div>
		    			 	@foreach($product->productsphoto as $photo)
		    			 	<div class="col s3 m3 l3">  <!--additional images-->
						  		<img src="{{ asset('uploads/photos/'.$photo->image) }}" class="responsive-img p_img">
						  		<div style="height: 10px;"></div>
						  	 </div>
					  		@endforeach
	    			 </div>
	    			 <p class="small">Phone: {{$product->phone}}, City: {{$product->user->city}} <span><a href="/product/{{$product->slug}}">View</a></span>
					@if(Auth::user()->id == $user->id)
					 <span><a href="/product/edit/{{$product->slug}}">Edit</a></span></p> 
					 @endif
	    		</div>	
	    	</div>
	    		<div class="divider"></div>
	    	@endforeach
	    </div>
	    <div id="test4"> <!--cryptocurrencies tab-->
	    	@foreach($cryptocurrencies as $cryptocurrency)
				<p class="small">Am selling {{$cryptocurrency->currency}}s at &#8358;{{$cryptocurrency->price}}/{{$cryptocurrency->currency}} <a href="/cryptocurrency/edit/{{$cryptocurrency->id}}">Edit</a> <a href="/mycryptocurrency/delete/{{$cryptocurrency->id}}">Delete</a></p>
			@endforeach
		</div>
	</div>
	
	<div style="height: 40px;"></div>
	<div class="col s12 m12 l3">   <!--column 3 the sidebar-->
		 <div class="row">
	        <div class="col s12 m12">
	          <div class="card grey lighten-4 z-depth-1">
	            <div class="card-content white-text row">
	            <span class="card-title brown-text">Buy or Sell Cryptocurrencies</span>
	            <div class="col s4 ">
		            <img src=" {{ asset('homepage/new/bitcoin.jpg') }} " class="responsive-img" style="heght: 60px;">
		        </div>
		        <div class="col s8">
		        	
	              	<p class="brown-text">We offer the sale of bitcoins and perfect money. Buy Now!</p>
		        </div>   
	            </div>
	            <div class="card-action">
	              <a href="#">Buy Now</a>
	            </div>
	          </div>
	        </div>
	      </div>
	      <h6 class="center">Latest Products</h6>
	      <div class="collection">
	      	@foreach($side_products as $p)
				<a href="/product/{{$p->slug}}" class="collection-item light-blue-text">{{$p->title}}</a>
			@endforeach
	      </div>
	      <h6 class="center">Categories</h6>
	      <form action="/category" method="POST" role="form">  
            {{csrf_field()}}      
          
            <div class="form-group">
                <select name="category_id" class="form-control">
                    <option class="btn btn-block">Select a Category</option>
                    @foreach($side_categories as $category)
                        <option class="btn btn-block" value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="blue btn">Go</button>
        </form>
        <h6 class="center">News Updates</h6>
	      <div class="collection">
	      	@foreach($side_news as $news)
				<a href="/product/{{$news->slug}}" class="collection-item light-blue-text">{{$news->title}}</a>
			@endforeach
	      </div>
	</div>
</div>

 <form method="post" action="/contact" id="sendform">
   {{ csrf_field() }}
   <input type="text" name="name" value="mynamejssokn" id="name">
   <input type="email" name="email" id="email" value="kamp@gmail.com">
   <textarea name="message" id="message"></textarea>
   <button type="submit" onclick="sendnow()">Send</button>
 </form>

<div id="hm">djkd</div>
<div id="hmmm">djkd</div>

















  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
<script type="text/javascript">
$(document).ready(function () {

	$('.materialboxed').materialbox();
	$(".button-collapse").sideNav();
	$('select').material_select();
	$(".drop").mouseenter(function() {
		$(".drop ul").slideDown();
	}); 
	$(".drop").mouseleave(function() {
		$(".drop ul").hide();
	}); 
	if ($(window).width() < 600) {
         $('.p_img').css("height", "50px");
    }else if($(window).width() > 992){
        $('.p_img').css("height", "110px");
    }else{
    	$('.p_img').css("height", "auto");
    }

     window.addEventListener("resize", myFunction);
    function myFunction() {
        var w = window.outerWidth;
        var h = window.outerHeight;
        var txt = "Window size: width=" + w + ", height=" + h;
        if (w < 600) {
            $('.p_img').css("height", "50px");
        }else if(w > 992){
            $('.p_img').css("height", "110px");
        }else{
        	$('.p_img').css("height", "auto");
        }
    }
}); 
</script> 
</body>
</html>