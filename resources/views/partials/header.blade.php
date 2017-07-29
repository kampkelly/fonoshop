<nav class="nvbar navbar-transparent navbar-fixed-top" role="navigation">
  <div class="contaner">
  <!--  <a class="navbar-brand" href="/" style="font-size: 1em !important; margin-top: -10px;"><span class="icon-fonoshop" style="font-size: 2.8em; height: 10em;">
                <span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span>
                </span>Fonoshop</a>  -->
 <!--   <div class="navbr-brand" style="display: inline;">
        <span class="icon-fonoshop" style="font-size: 1.8em; height: 10em;">
                <span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span>
                </span>
                <a href="#" style="margin-top: -300px;">Fonoshop</a>
    </div> -->
    <ul class="nv nvbar-nav">
      <li class="actie">
       <span class="icon-fonoshop" style="font-size: 2em; height: 10em !important;">
                <span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span>
                </span>
                <a href="/" style="font-size: 1.2em !important;">Fonoshop</a>
   <!--   <li>
        <a href="/category/2">IT Softwares</a>
      </li>
      <li>
        <a href="/category/1">Computers/Mobiles</a>
      </li>
      <li>
        <a href="/category/3">General Equipment</a>
      </li>
      <li> -->
      <style type="text/css">
        .drop:hover ul {
          
        }
        .drop ul li {
          padding: 5px 0px 10px 0px;
          border-bottom: 1px solid gray;
          border-right: none;
          cursor: pointer;
        }
        .drop ul #last {
          border-bottom: none;
        }
      </style>
      <li style="position: relative;" class="drop">
        <a href="#" style="cursor: pointer; color: white;">Categories</a>
        <ul style="position: absolute; left: 0%; bottom: -320%; width: 200%; height: 7em; background-color: #DF8109; padding: 5px 10px 0px 10px; text-align: none; display: none; z-index: 99;">
          <li style="display: block;"><a href="/category/1">Computers/Phones/Gadgets</a></li>
          <li style="display: block;"><a href="/category/2">IT Softwares</a></li>
          <li style="display: block;" id="last"><a href="/category/3">General Products</a></li>
        </ul>
      </li>
      <li style="position: relative;" class="drop">
        <a href="/cryptocurrencies" style="cursor: pointer; color: white;">Cryptocurrencies</a>
        <ul style="position: absolute; left: 0%; bottom: -320%; width: 180%; height: 7em; background-color: #DF8109; padding: 5px 10px 0px 10px; text-align: none; display: none; z-index: 99;">
          <li style="display: block;"><a href="/cryptocurrencies">Buy Cryptocurrency</a></li>
          <li style="display: block;" id="last"><a href="/cryptocurrency/new">Sell Cryptocurrency</a></li>
        </ul>
      <li>
      <li style="position: relative;" class="drop">
        <a href="#" style="cursor: pointer; color: white;">Products</a>
        <ul style="position: absolute; left: 0%; bottom: -320%; width: 180%; height: 7em; background-color: #DF8109; padding: 5px 10px 0px 10px; text-align: none; display: none; z-index: 99;">
          <li style="display: block;"><a href="/products">Buy Products</a></li>
          <li style="display: block;" id="last"><a href="/product_new">Sell Products</a></li>
        </ul>
      @if(Auth::check())
        <li>
          <a href="/myitems/{{Auth::user()->email}}">My Products</a>
        </li>
        <li>
          <a href="/myprofile/update/{{Auth::user()->email}}">Update Profile</a>
        </li>
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
      <li>
        <a href="/login">Login</a>
      </li> 
      @endif 
      <li id="li_form"> 
        <form action="/search" method="POST" class="navbar-form navbar-cente" role="search" style="display: inline;">
          {{ csrf_field() }}
          <div class="form-group">
            <input type="text" class="form-control" name="item" placeholder="Product, category or brand..." style="width: 15em; height: 2em;">
          </div><span>
          <button type="submit" class="btn btn-success">
                <span class="glyphicon glyphicon-search"></span>
            </button></span>
        </form>
      </li>
    </ul>
  </div>
</nav>










<div id='cssmenu' class="mobilehead" style="position: fixed; color: white; top: 0%; z-index: 2; width: 100%;">
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
        <li><a id="reg" href="#register">Signup</a></li>
        @endif
</ul>
</div>


