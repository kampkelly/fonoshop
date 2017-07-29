<div class="col-xs-12 col-sm-4 col-md-3 col-lg-3">
		<h4 class="text-center">Latest Products</h4>
		<ul class="list-group">
		@foreach($side_products as $p)
			<li class="list-group-item list"><a href="#"> {{$p->title}}</a></li>
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
	</div>