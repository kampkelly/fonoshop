@extends('layouts.master')

@section('content')
	<div style="height: 60px"></div>
	<div class="container">
		<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<section class="container-fluid terms">
            <div class="text-center">
				<h3>Contact Us</h3>
                <p>Please leave us a message below and we will get back to you within 24hours.</p>
            </div>
				 <form action="/contact" method="POST" class="form-horizontal first-form" role="form" files="true" enctype="multipart/form-data">
        {{ csrf_field() }}
                <div class="form-group">
                    <label for="contact_name" class="col-xs-3 col-sm-3 col-md-3 col-lg-4 control-label">Name <span class="asterisks">*</span></label>
                    <div class="col-xs-8 col-sm-8 col-md-7 col-lg-6">
                        <input type="text" name="contact_name" id="contact_name" class="form-control" required="required" placeholder="Full Name" required="true" minlength="4" style="background-color: #f2f2f2;">
                    </div>
                </div>
                 <div class="form-group">
                    <label for="contact_email" class="col-xs-3 col-sm-3 col-md-3 col-lg-4 control-label">Email <span class="asterisks">*</span></label>
                    <div class="col-xs-8 col-sm-8 col-md-7 col-lg-6">
                        <input type="text" name="contact_email" id="contact_email" class="form-control" required="required" placeholder="Email Address" required="true" style="background-color: #f2f2f2;">
                    </div>
                </div>
                <div class="form-group">
                    <label for="contact_msg" class="col-xs-3 col-sm-3 col-md-3 col-lg-4 control-label">Message <span class="asterisks">*</span></label>
                    <div class="col-xs-8 col-sm-8 col-md-7 col-lg-6">
                    <textarea class="form-control" rows="5" placeholder="Type Message" name="contact_msg"></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-xs-8 col-sm-8 col-md-7 col-lg-6 col-xs-offset-3 col-sm-offset-3 col-md-offset-3 col-lg-offset-4">
                        <button type="submit" class="btn btn-primary btn-block btn-sm">
                            Leave a Message
                        </button>
                    </div>
                </div>
        </form>
				
			
			</section>
		</div>
	</div>
	</div>
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript">



</script>
