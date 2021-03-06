@extends('layouts.new_master')

@section('content')
@include('partials/mobile_search')
	<div style="height: 1px"></div>
	<div class="container">
	<div style="height: 10px"></div>
	<div class="row">
	<div class="col-xs-12 col-sm-8 col-md-9 col-lg-9">
	<section class="container-fluid">
    <!--LOOP post STARTS-->
        <div class="container-fluid all_innovations" style="padding-left: 30px">
            <h3 class="text-center">Site News</h3>        
	        @foreach($news as $new)
                By SalesNaija
                <div class="panel panel-inf">
                    <div class="panel-heading background-third">
                        <h3 class="panel-title"><a href="/news/{{$new->slug}}" style="coor: white;">{{$new->title}}</a><span class="small pull-right" style="colr:white;">{{$new->created_at->diffForHumans()}}</span></h3>
                    </div>
                    <div class="panel-body">
                       <p> {{ str_limit(strip_tags($new->body), 50) }} <a href="/news/{{$new->slug}}" class="btn btn-xs btn-info">Read More...</a> 
                       @if(Auth::check())
                           @if(checkPermission(['admin']))
                                <a href="/admin/post/edit/{{$new->slug}}" class="btn btn-xs btn-warning">Edit</a> </p>
                           @endif
                       @endif
                    </div>
                </div>
            @endforeach
            
        </div>
        <!--LOOP post ENDS-->
     </section>
	</div>
	@include('partials/sidebar')
	</div>
	
	
	
@endsection
