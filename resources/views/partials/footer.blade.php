<div style="heiht: 350px"></div>
<footer style="position: relative; bottom: -1em; min-height: 5em; background-color: #DF8109; width: 100%; padding-top: 1.8em">
<div class="text-center">
	<ul class="list-inline list-unstyled container">
		<li><a href="/" class="small">Fonoshop</a></li>
		<li><a href="/products" class="small">Products</a></li>
		<li><a href="/terms" class="small">Terms</a></li>
		<li><a href="/privacy" class="small">Privacy Policy</a></li>
		<li><a href="/news" class="small">News Updates</a></li>
		<li><a href="/about" class="small">About</a></li>
		<li><a href="/contact" class="small">Contact us</a></li>
		@if(Auth::check())
		<li>
			 <a href="{{ route('logout') }}"  class="small" 
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
		<a href="/sendmail" style="visibility: visible;">Test Email</a>
</div>

</footer>