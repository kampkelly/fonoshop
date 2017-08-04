<nav class="navbar navbar-default navbar-static-top tophead" role="navigation">
	<div class="container">
		<a class="navbar-brand" href="/" style="color: #d78512;">SalesNaija</a>
		<ul class="nav navbar-nav" style="width: 80%;">
			<li class="active">
				<a href="/" style="color: #d78512;">Home</a>
			</li>
			<li>
        <a href="/products" style="color: #d78512;">Products</a>
      </li>
      
			<li>
        <a href="/cryptocurrencies" style="color: #d78512;">Cryptocurrencies</a>
      </li>
      @if(Auth::check())
        <li>
        <a href="/product_new" style="color: #d78512;">Sell A Product</a>
      </li>
        <li>
          <a href="/myprofile/update/{{Auth::user()->email}}" style="color: #d78512;">My Profile</a>
        </li>
        <li>
  				<a href="/myitems/{{Auth::user()->email}}" style="color: #d78512;">My Products</a>
  			</li>
        @if(checkPermission(['admin']))
            <li>
              <a href="/admin/panel" style="color: #d78512;">Admin Panel</a>
            </li>
        @endif
      @endif
			<li>
				<a href="#" style="color: #d78512;">Contact Us</a>
			</li>
      @if(Auth::check())
			  <li class="pull-right">
            <a href="{{ route('logout') }}" style="color: #d78512;"  
                onclick="event.preventDefault();
                         document.getElementById('logout-form').submit();">
                Logout
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>
        </li>
      @else
      <li class="pull-right">
        <a href="/register" style="color: #d78512;">Register</a>
      </li>
      <li class="pull-right">
        <a href="/login" style="color: #d78512;">Login</a>
      </li>
      @endif
		<!--	<p class="navbar-text">Purchase all used and new items...</p> -->
		</ul>
	</div>
</nav>
<!--second form below --><div style="height: 0px;"></div>
<div id='cssmenu' class="mobilehead" style="position: relative; color: white; top: 0%; z-index: 99; width: 100%;">

<ul>
   <li><a href='/'>Home</a></li>
    <li><a href='/products'>Categories</a>
      <ul>
          <li><a href='/category/1'>Computers/Phones</a>
          <li><a href='/category/2'>IT Softwares</a>
          <li><a href='/category/3'>General Equipments</a>
      </ul>
  </li>
  <li><a href='/products'>All Products</a></li>
  <li><a href='/cryptocurrencies'>Cryptocurrencies</a>
      <ul>
          <li><a href='/cryptocurrencies'>Buy Cryptocurrency</a>
          <li><a href='/cryptocurrency/new'>Sell Cryptocurrency</a>
      </ul>
  </li>
   
   <li><a href='/about'>About</a></li>
   @if (Auth::check())
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
<!--search form -->
<div style="height: 0px;"></div>

<!--search form -->