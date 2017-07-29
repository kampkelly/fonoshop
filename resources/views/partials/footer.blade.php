<div style="heiht: 350px"></div>
<footer style="position: relative; bottom: -10em; min-height: 5em; background-color: #DF8109; width: 100%; padding-top: 1.8em">
	<ul class="list-inline list-unstyled container">
		<li><a href="/">Fonoshop</a></li>
		<li><a href="/products">Products</a></li>
		<li><a href="/terms">Terms</a></li>
		<li><a href="/privacy">Privacy Policy</a></li>
		<li><a href="/about">About</a></li>
		@if(Auth::check())
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
		@endif
	</ul>
	<ul class="list-inline list-unstyled container">
	<li><p class="small">Fonoshop &copy 2017 Address: Benin City, Nigeria Email: fonoshop@gmail.com</p></li>
	</ul>

</footer>