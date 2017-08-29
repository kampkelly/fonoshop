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
      <img src="{{ asset('logo.png') }} " alt="logo" class="img-responsive">
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
            <li style="display: block;"><a href="/myitems/{{Auth::user()->email}}" class="small">My Products</a></li>
            <li style="display: block;"><a href="/contact" class="small">Contact Us</a></li>
          <!--  <li style="display: block;"><a href="/cryptocurrency/new" class="small">Settings</a></li> -->
            <li id="last" style="display: block;">
                <a href="{{ route('logout') }}" class="small" style="color: #d78512;"  
                    onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();">
                    Logout
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
            </li>
          </ul>
        </li>
      @else
      <li class="pull-right">
        <a href="/register" style="color: #d78512;">Register</a>
      </li>
      <li class="pull-right">
        <a href="/login" style="color: #d78512;">Login</a>
      </li>
      @endif
		</ul>
	</div>
</nav>
<!--second form below --><div style="height: 0px;"></div>
<div id='cssmenu' class="mobilehead" style="position: fixed; color: white; top: 0%; z-index: 99; width: 100%;">

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
      <li><a href='#'>Sell</a>
        <ul>
             <li><a href="/new/product">Sell Products</a></li>
             <li><a href="/cryptocurrency/new">Sell Cryptocurrency</a></li>
        </ul>
    </li>
    @endif
  <li><a href='#'>Categories</a>
      <ul>
      @foreach($side_categories as $category)
          <li><a href='/category/{{$category->id}}'>{{$category->name}}</a>
        @endforeach
      </ul>
  </li>
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
        <li><a id="log" href="/login">Signin</a></li>
        @endif
</ul>
</div>
