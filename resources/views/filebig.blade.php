@extends('layouts.new_master')

@section('content')
<div class="body-container">
<div class="row" style="position: relative;">
<div style="height: 10px;"></div>
    <h4 class="text-center">The upload failed because the file size was too big.<br> You will redirected back in a few seconds. If you aren't redirected, <a class="btn btn-info" href="{{ URL::previous() }}">click here!</a></h4>
</div>
</div>
<div style="height:200px;"></div>
@endsection