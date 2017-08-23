@extends('layouts.new_master')

@section('content')
@include('partials/mobile_search')
	<div style="height: 0px"></div>
	<div class="container">
	<div style="height: 10px"></div>
	<div class="row">
	<div class="col-xs-12 col-sm-8 col-md-9 col-lg-9">
	<section class="container-fluid">
    <!--LOOP post STARTS-->
        <div class="container-fluid all_innovations" style="padding-left: 30px">
            <h3 class="text-center">{{$news->title}}</h3>        
                <div class="panel panel-inf">
                    <div class="panel-heading background-third">
                        <h3 class="panel-title" style="colr: white;">{{$news->title}}<span class="small pull-right" style="clor:white;"> By SalesNaija, {{$news->created_at->diffForHumans()}}</span></h3>
                    </div>
                    <div class="panel-body">
                      <p class="text-justify" style="padding: 0px 10px 0px 10px;"> {{$news->body}} </p>
                    </div>
                </div>
            
        </div>
        <!--LOOP post ENDS-->
     </section>
	</div>
	@include('partials/sidebar')
	</div>
	
	
	
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript">



</script>
