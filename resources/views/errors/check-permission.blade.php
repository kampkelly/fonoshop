@extends('layouts.new_master')

@section('content')
<div class="body-container">
<div class="row" style="position: relative;">
<div style="height: 10px;"></div>
    <h4 class="text-center">Invalid Operation!<br> You will redirected back in a few seconds. If you aren't redirected, <a class="btn btn-info" href="{{ URL::previous() }}">click here!</a></h4>
    <?php
    // header("Refresh:5; url={{URL::previous()}}"); 
     ?>
    <script type="text/javascript">
    	setTimeout(function () {    
		    window.location.href = 'javascript:history.go(-1)'; 
		},5000); // 5 seconds
    </script>
</div>
</div>
<div style="height:200px;"></div>
@endsection