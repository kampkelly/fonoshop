@extends('layouts.master')

@section('content')
	<div style="height: 60px"></div>
	<h4 class="text-center">Edit Cryptocurrency</h4>
	<div style="height: 40px"></div>
	<section class="container">
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
	
	
	
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript">



</script>
