<nav class="navbar navbar-transparent navbar-fixed-top" role="navigation">
	<div class="container">
		<a class="navbar-brand" href="/">Fonoshop</a>
		<ul class="nav navbar-nav">
			<li class="active">
				<a href="/">Home</a>
			</li>
			<li>
				<a href="#">IT Softwares</a>
			</li>
		<!--	<li>
				<a href="#">Computer Gadgets</a>
			</li>
			<li>
				<a href="#">General Equipment</a>
			</li>
			<li>
				<a href="#">Buy/Sell Cryptocurrencies</a>
			</li> -->
			<li>
				<a href="/product/new">Add new product</a>
			</li> 
			<li> 
			<form class="navbar-form navbar-right" role="search">
				<div class="form-group">
					<input type="text" class="form-control" placeholder="Search Computers, Smartphones, Softwares, General Stuffs, etc.">
				</div><span>
				<button type="submit" class="btn btn-warning">
			        <span class="glyphicon glyphicon-search"></span>
			    </button></span>
			</form>
			
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
			@else
			<li>
				<a href="/login">Login</a>
			</li> 
			@endif 
		</ul>
	</div>
</nav>


<!--
<form class="navbar-form navbar-left" role="search">
				<div class="form-group">
					<input type="text" class="form-control" placeholder="Search">
				</div>
				<button type="submit" class="btn btn-default">Submit</button>
			</form> -->

			<!--<form action="/search" method="POST" role="search">
			        {{ csrf_field() }}
			        <div class="input-group">
			            <input type="text" class="form-control" name="q"
			                placeholder="Search Computers, Smartphones, Softwares, General Stuffs, etc."> <span class="input-group-btn">
			                <button type="submit" class="btn btn-warning">
			                    <span class="glyphicon glyphicon-search"></span>
			                </button>
			            </span>
			        </div>
			    </form> -->