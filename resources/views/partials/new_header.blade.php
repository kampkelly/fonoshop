<nav class="navbar navbar-default navbar-static-top tophead" role="navigation">
	<div class="container">
		<a class="navbar-brand" href="#" style="color: #d78512;">SalesNaija</a>
		<ul class="nav navbar-nav" style="width: 80%;">
			<li class="active">
				<a href="#" style="color: #d78512;">Home</a>
			</li>
			<li>
				<a href="#" style="color: #d78512;">Categories</a>
			</li>
			<li>
				<a href="#" style="color: #d78512;">Cryptocurrencies</a>
			</li>
			<li>
				<a href="#" style="color: #d78512;">About</a>
			</li>
			<li class="pull-right">
				<a href="#" style="color: #d78512;">Signup</a>
			</li>
			<li class="pull-right">
				<a href="#" style="color: #d78512;">Login</a>
			</li>
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
<div class="container" id="searchdiv" style="padding: 0px 40px 0px 40px;">
	<form action="/search" method="POST" role="search">
        {{ csrf_field() }}
        <div class="input-group">
            <input type="text" class="form-control" name="q"
                placeholder="Search laptops, desktops, phones, softwares, hard disks, etc..."> <span class="input-group-btn">
                <button type="submit" class="btn btn-default">
                    <span class="glyphicon glyphicon-search" style="height: 1.4em;"></span>
                </button>
            </span>
        </div>
    </form>
</div>
<!--search form -->