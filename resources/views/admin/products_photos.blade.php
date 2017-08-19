@extends('layouts.new_master')

@section('content')
	<div style="height: 20px"></div>
	<div class="container">
	<div style="height: 10px"></div>
	<div class="row">
	<div class="col-xs-12 col-sm-8 col-md-9 col-lg-9">
	<section class="container-fluid">
		<h4 class="text-center">Manage Products Photos</h4>
		<hr>
			<div class="row">
				@foreach($productsphotos as $photo)
					<div class="col-xs-6 col-sm-4 col-md-3 col-lg-3">
						<img src="{{ asset('uploads/photos/'.$photo->image) }}" class="img-responsive" style="height: 150px;">
						<form action="/product/{{$photo->id}}/image-deleted" method="post" value="DELETE" id="photo-delete" role="form">
	                         {{ csrf_field() }}
	                         <input type="text" name="photo_id" value="{{$photo->id}}" hidden="true">
	                         <input type="submit" name="delete" value="remove" class="btn btn-danger btn-xs" onclick="logout();"> by{{$photo->user->name}}
	                          <script>
					                function logout() {
					                    if (confirm('Delete this image, cannot undo this action. Continue?')){
					                        event.preventDefault();
					                        document.getElementById('photo-delete').submit();
					                    } else {
					                        event.preventDefault();
					                    }
					                }
					                
					            </script>
                         </form>
						<div style="height: 20px;"></div>
					</div>
				@endforeach
			</div>
	</section>
	</div>
	@include('partials/sidebar')
	</div>
	
	
	
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function () {

});


</script>
