<div style="position: relative;" id="mob-head-container" class=" hide-mini-laptop hide-desktop">
<header id="mob-hea" style="background:#F5FAFD !important; width: 100%; position: fixed; z-index: 99; height: 45px;">
    <div style="background: red !important; width: 100%;">
        <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2" style="background:#F5FAFD !important;">
            <h4><span class="glyphicon glyphicon-menu-hamburger" style="color: #DF8109" id="openicon"></span><span class="glyphicon glyphicon-remove" style="color: #DF8109; display: none;" id="closeicon"></span></h4>
        </div>
        <div class="col-xs-10 col-sm-2 col-md-2 col-lg-2" style="background:#F5FAFD !important;">
            <h4 class="text-cente" style="color: #DF8109">SalesNaija
              <a href="/new/product" class="pull-right" style="font-size: 70%; color:grey;  padding-right: 10px;">Sell a Product</a></h4>
        </div>
    </div>
</header>
<nav id="mobmenu">
    <ul class="list-unstyled list-group" style="padding-top: 0px;">
        <li class="list-group-item"><a href="/homepag">Home</a></li>
        <li class="list-group-item"><a href="/products">Products</a></li>
        <li class="list-group-item expand">
            <a href="#categories" data-toggle="collapse">Categories</a> <i class="glyphicon glyphicon-plus"></i>
            <ul class="nav collapse" id="categories">
                @foreach($side_categories as $headcategories)
                    <li style="padding-bottom:0px;">
                        <div class="col-sm-1">&nbsp;</div>
                        <div class="col-sm-1">
                            <a href="/category/{{$headcategories->idk}}">{{$headcategories->name}}</a>
                        </div>
                        <div class="clearfix"></div>
                    </li>
                @endforeach
            </ul>
        </li>
        <li class="list-group-item"><a href="/cryptocurrencies">Buy Cryptocurrencies</a></li>
        <li class="list-group-item"><a href="/cryptocurrency/new">Sell Cryptocurrencies</a></li>
        @if(Auth::check())
            <li class="list-group-item"><a href="/myprofile/update/{{Auth::user()->email}}">My Profile</a></li>
            <li class="list-group-item"><a href="/allmyitems/{{Auth::user()->email}}">My Products</a></li>
            <li class="list-group-item">
                <a href="{{ route('logout') }}"  
                    onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();">
                    Signout
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
            </li>
        @else
            <li class="list-group-item"><a href="/login">Signin</a></li>
            <li class="list-group-item"><a href="/authregister">Signup</a></li>
        @endif  
        <li class="list-group-item"><a href="/contact">Contact</a></li>
        <li class="list-group-item"><a href="/about">About</a></li>
        <li class="list-group-item"><a href="/terms">Terms</a></li>
    </ul>
</nav>
</div>
<div id="desk-head-container" style="display: none;">
  <header>
    
  </header>
</div>















<style type="text/css">
        .namedrop ul li {
          padding: 5px 0px 10px 0px;
          border-bottom: 1px solid gray;
          border-right: none;
          cursor: pointer;
        }
        .namedrop ul li a {
          color: #DF8109;
        }
        .namedrop ul #last {
          border-bottom: none;
        }
      </style>
<nav class="navbar navbar-default navbar-static-top tophead" role="navigation">
	<div class="container">
    <a class="navbar-brand" href="/" style="color: white;">
      <img src="{{ asset('newlogo.png') }} " alt="logo" class="img-responsive">
    </a>
		<ul class="nav navbar-nav" style="width: 80%;">
			<li>
        <a href="/products" style="color: #d78512;">Product</a>
      </li>
      
			<li>
        <a href="/cryptocurrencies" style="color: #d78512;">Cryptocurrencies</a>
      </li>
       <li>
          <a href="/cryptocurrency/new" style="color: #d78512;">Sell Cryptocurrency</a>
        </li>
      @if(Auth::check())
        @if(checkPermission(['user']))
        <li>
          <a href="/new/product" style="color: #d78512;">Sell A Product</a>
        </li>
        @endif
        @if(checkPermission(['admin']))
            <li>
              <a href="/admin/panel" style="color: #d78512;">Admin Panel</a>
            </li>
        @endif
      @endif

      @if(Auth::check())
        <li class="pull-right namedrop" style="position: relative;">
          <a href="#" style="color: #d78512;">{{Auth::user()->name}} <span class="glyphicon glyphicon-circle-arrow-down" aria-hidden="true"></span></a>
          <ul style="position: absolute; left: 0%; bottom: -240%; width: 180%; height: 9.2em; background-color: #DF8109; padding: 5px 10px 0px 10px; text-align: none; display: none; z-index: 99;">
            <li style="display: block;"><a href="/myprofile/update/{{Auth::user()->email}}" class="small">My Profile</a></li>
            <li style="display: block;"><a href="/allmyitems/{{Auth::user()->email}}" class="small">My Products</a></li>
            <li style="display: block;"><a href="/contact" class="small">Contact Us</a></li>
          <!--  <li style="display: block;"><a href="/cryptocurrency/new" class="small">Settings</a></li> -->
            <li id="last" style="display: block;">
                <a href="{{ route('logout') }}" class="small" style="color: #d78512;"  
                    onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();">
                    Signout
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
            </li>
          </ul>
        </li>
      @else
      <li class="pull-right">
        <a href="/authregister" style="color: #d78512;">Register</a>
      </li>
      <li class="pull-right">
        <a href="/login" style="color: #d78512;">Login</a>
      </li>
      @endif
		</ul>
	</div>
</nav>
<!--second form below --><div style="height: 0px;"></div>
<div id='cssmenu' class="mobilehead" style="position: fixed; color: white; top: 0%; z-index: 99; width: 100%; display: none;">

<ul>
   <li><a href='/'>Home</a></li>
  <li><a href='/products'>All Products</a></li>
  <li><a href='/cryptocurrencies'>Cryptocurrencies</a></li>
   @if(Auth::check())
      @if(checkPermission(['admin']))
          <li>
            <a href="/admin/panel">Admin Panel</a>
          </li>
      @endif
      <li><a href='/new/product'>Sell Products</a></li>
  <!--    <li><a href='#'>Sell</a>
        <ul>
             <li><a href="/new/product">Sell Products</a></li>
             <li><a href="/cryptocurrency/new">Sell Cryptocurrency</a></li>
        </ul>
    </li> -->
    @endif
    <li><a href='/cryptocurrency/new'>Sell Cryptocurrencies</a></li>
<!--  <li><a href='#'>Categories</a>
      <ul>
      @foreach($side_categories as $category)
          <li><a href='/category/{{$category->id}}'>{{$category->name}}</a>
        @endforeach
      </ul>
  </li> -->
   @if (Auth::check())
       <li>
        <a href="/myitems/{{Auth::user()->email}}">My Products</a>
      </li> 
      <li>
        <a href="/myprofile/update/{{Auth::user()->email}}">My Profile</a>
      </li>
      <li><a href='/contact'>Contact Us</a></li>
        <li>
            <a href="{{ route('logout') }}"  
                onclick="event.preventDefault();
                         document.getElementById('logout-form').submit();">
                Logout
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>
        </li>
        @else
        <li><a href='/contact'>Contact Us</a></li>
        <li><a id="log" href="/login">Signin</a></li>
        @endif
</ul>
</div>
