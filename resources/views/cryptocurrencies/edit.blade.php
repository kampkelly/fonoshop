@extends('layouts.new_master')

@section('content')
@include('partials/mobile_search')
	<div style="height: 0px"></div>
	<div class="row">
	<div class="col-xs-12 col-sm-8 col-md-9 col-lg-9">
	<section class="container">
	<h4 class="text-center">Edit Cryptocurrency</h4>
	<div style="height: 10px"></div>
		<form action="/cryptocurrencies/{{$cryptocurrency->id}}" method="POST" class="form-horizontal first-form" role="form" files="true" enctype="multipart/form-data">
				{{ csrf_field() }}
				<div class="form-group">
	                <label for="price" class="col-xs-12 col-sm-4 col-md-4 col-lg-3 control-label">Price <span class="asterisks">*</span></label>
	                <div class="col-xs-12 col-sm-8 col-md-8 col-lg-6">
						<input type="text" name="price" id="price" class="form-control" required="required" placeholder="Price" value="{{$cryptocurrency->price}}">
					</div>
				</div>
				<div class="form-group">
	                <label for="currency" class="col-xs-12 col-sm-4 col-md-4 col-lg-3 control-label">Currency <span class="asterisks">*</span></label>
	                <div class="col-xs-12 col-sm-8 col-md-8 col-lg-6 col-lg-offset-0">
                        <select name="currency" id="currency" class="form-control">
                            <option value="Bitcoin">Bitcoin</option>
                            <option value="Perfect Money">Perfect Money</option>
                        </select>
                    </div>
				</div>
				 <div class="form-group">
                    <div class="col-md-6 col-md-offset-3">
                        <button type="submit" class="btn btn-primary btn-block btn-sm">
                            Update Cryptocurrency
                        </button>
                    </div>
                </div>         
				</form>
	
	</section>
	</div>
	@include('partials/sidebar')
	</div>
	
	
	
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript">



</script>
