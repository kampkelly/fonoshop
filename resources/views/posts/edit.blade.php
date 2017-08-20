@extends('layouts.new_master')

@section('content')
@include('partials/mobile_search')
	<div style="height: 0px"></div>
	<div class="container">
	<div style="height: 0px"></div>
	<div class="row">
	<div class="col-xs-12 col-sm-8 col-md-9 col-lg-9">
	<section class="container-fluid">
    <!--LOOP post STARTS-->
        <div class="container-fluid all_innovations" style="padding-left: 30px">
            <h3 class="text-center">Edit {{$news->title}}</h3>        
            <form action="/admin/post/{{$news->slug}}" method="POST" value="PUT" class="form-horizontal" role="form">
            {{ csrf_field() }}
                    <div class="form-group">
                        <label for="post_title" class="control-label">Title</label>
                        <div class="col-sm-12 col-sm-offset-0">
                            <input type="text" name="post_title" id="post_title" class="form-control" placeholder="Post Title" value="{{$news->title}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="body" class="control-label">Post Body</label>
                        <div class="col-sm-12 col-sm-offset-0">
                            <textarea name="body" id="post_content" class="form-control" rows="5" style="resize:none;" placeholder="Body of Post" value="{{$news->body}}"></textarea>
                        </div>
                    </div>
                    <!--hidden content -->
                    <div id="hidden_content" style="display: none;">
                    {{$news->body}}
                    </div>
                    <!--hidden content -->
                    <div class="form-group">
                        <div class="col-sm-12 col-sm-offset-0">
                            <button type="submit" class="btn btn-primary btn-block">Submit</button>
                        </div>
                    </div>
            </form>
            
        </div>
        <!--LOOP post ENDS-->
     </section>
	</div>
	@include('partials/sidebar')
	</div>
	
	
	
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function () {
    var x = document.getElementById('hidden_content').textContent;
    document.getElementById('post_content').value = x;
});


</script>
