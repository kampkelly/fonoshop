<div class="col-xs-12 col-sm-4 col-md-3 col-lg-3">
 <form action="/search" method="POST" role="search" style="display: none;">
    {{ csrf_field() }}
    <div class="input-group">
        <input type="text" class="form-control" name="q"
            placeholder="Search items and sellers"> <span class="input-group-btn">
            <button type="submit" class="btn btn-default">
                <span class="glyphicon glyphicon-search" style="height: 20px;"></span>
            </button>
        </span>
    </div>
</form>
<div class="pael panel-primary">
    <div class="panel-heading">
        <h3 class="panel-title">Purchase Cryptocurrencies</h3>   
    </div>
    <div class="panel-body row">
        <div class="col-xs-3 col-sm-4 col-md-4 col-lg-4">
            <img src=" {{ asset('homepage/new/bitcoin.jpg') }} " class="img-responsive img-rounded" style="heght: 60px;">
        </div>
        <div class="col-xs-9 col-sm-8 col-md-8 col-lg-8">
        <p class="small">Great deals for bitcoins and perfect money. Buy Now!</p>
        <a href="/cryptocurrencies" class="btn btn-primary btn-sm" style="color: white;">Buy Now</a>
        </div>
    </div>
</div>
		<h4 class="text-center">Latest Products</h4>
		<ul class="list-group">
		@foreach($side_products as $p)
			<li class="list-group-item list"><a href="/product/{{$p->slug}}"> {{$p->title}}</a></li>
		@endforeach
		</ul>
		<h5 class="text-center">Categories</h5>
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
            <button type="submit" class="btn btn-primary btn-block btn-xs">Go</button>
        </form>
        <h4 class="text-center">News Updates</h4>
        <ul class="list-group">
        @foreach($side_news as $news)
            <li class="list-group-item list"><a href="/news/{{$news->slug}}"> {{$news->title}}</a></li>
        @endforeach
        </ul>
	</div>