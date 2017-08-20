@extends('layouts.new_master')

@section('content')
@include('partials/mobile_search')
	<div style="height: 11px"></div>
	<div class="container">
		<div class="row">
		<div class="col-xs-12 col-sm-8 col-md-9 col-lg-9">
			<section class="container-fluid">
				<h3 class="text-center">Sell Cryptocurrency</h3>
				<div style="height: 20px"></div>
				<form action="/cryptocurrencies" method="POST" class="form-horizontal first-form" role="form" files="true" enctype="multipart/form-data">
						{{ csrf_field() }}
						<div class="form-group">
			                <label for="price" class="col-xs-12 col-sm-3 col-md-4 col-lg-4 control-label">Price <span class="asterisks">*</span></label>
			                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-5">
								<input type="text" name="price" id="price" class="form-control" required="required" placeholder="Price per currency">
							</div>
						</div>
						<div class="form-group">
			                <label for="currency" class="col-xs-12 col-sm-3 col-md-4 col-lg-4 control-label">Currency <span class="asterisks">*</span></label>
			                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-5 col-lg-offset-0">
		                        <select name="currency" id="currency" class="form-control">
		                            @foreach($cryptocategories as $cryptocategory)
		                                <option value="{{$cryptocategory->currency_name}}">{{$cryptocategory->currency_name}}</option>
		                            @endforeach
		                        </select>
		                    </div>
						</div>
						 <div class="form-group">
		                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-5 col-sm-offset-3 col-md-offset-4 col-lg-offset-4">
		                        <button type="submit" class="btn btn-primary btn-block btn-sm">
		                            Sell Cryptocurrency
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
