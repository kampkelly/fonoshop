@extends('layouts.new_master')

@section('content')
<div class="new_cover" style="margin-top: 10px;">
    <div style="height: 10px" class="search_top"></div>
    <div style="margin-top: -10px" class="search_desktop"></div>
    <div class="container firstsection">
    <h3 class="text-center" style="color: #DF8109; text-shadow: 0.3px 0.3px #DF8109;">Find a Product, contact Seller, Buy! It's that easy.</h3>

    <!--insertion-->

    <section class="row container-fluid third_section">
    <ul class="list-unstyled list-inline" style="display: flex;">
        <li style="flex: 1; border-bottom: 1px solid grey; cursor: pointer;" onclick="leftMove()" id="leftc"><h4 style="color: grey">Products on Sale</h4></li>
        <li style="flex: 1; cursor: pointer;" onclick="rightMove()" id="rightc"><h4 style="color: grey;">Categories</h4></li>
    </ul>
    <div id="leftevent">
        @foreach($products as $product)
            <div class="col-xs-6 col-sm-4 col-md-4 col-lg-3 product" style="padding: 0px 10px 0px 10px;">
                <div style="background-color: #FAFAFA;">
                    <a href="/product/{{$product->slug}}">
                            <h5 class="text-center">{{str_limit($product->title, 20)}}</h5>
                            <h5><b> &#8358;{{$product->price}}</b> {{$product->condition}}</h5>
                            <img src="{{ asset('uploads/cover/'.$product->image) }}" class="img-responsive img-rounded">
                    </a>
                </div>
                    <div style="height: 15px;"></div>
            </div>
        @endforeach
    </div>
    <div id="rightevent" style="display: none;">
         <section class="fourth_section">
            <div class="container">
                <h3 class="text-center">Categories</h3>
                <div class="row">
                @foreach($categories as $category)
                @if($loop->iteration <= 3)
                    <div class="col-xs-6 col-sm-4 col-md-4 col-lg-4 category">        
                         <div style="position: relative;">
                            <a href="/category/{{$category->id}}">
                                <h4 class="text-center">{{$category->name}}</h4>
                                <img src="{{ asset('categories/'.$category->image) }}" class="img-responsive img-rounded">
                            </a>
                        </div>
                        <div style="height: 20px;"></div>
                    </div>
                @endif
                @endforeach
                </div>
            </div>
        </section>
    </div>
    </section>
    <!--insertion-->
        <div class="row hide-smartphone hide-tablet hide-mini-laptop hide-desktop">
               <div class="col-xs-12 col-sm-8 col-md-6 col-lg-6">
                @if(Auth::check())
                  <!--  <a href="/newitems/{{Auth::user()->email}}">new design</a>  -->
                @else
                <div class="text-center">
                    <h5 class="text-capitalize"><b>Have something to sell?</b> Start Now...</h5>
                    <form action="/toregister" method="post" class="form-inline" style="paddng-left: 100px;" role="form" files="true" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <input type="text" name="product_title" id="product_title" class="form-control" required="required" placeholder="Name of product" title="Enter name of the product you want to sell" required="true">
                        <input type="number" name="price" id="price" class="form-control" required="required" placeholder="Price e.g 3000" title="Enter price of product in naira" required="true">
                        <input type="submit" name="submit" id="submit" class="form-control btn btn-sm btn-warning" value="Continue">
                    </form>
                </div>
                @endif
                   
                </div>
            <div class="col-xs-12 col-sm-4 col-md-3 col-lg-3">
               
            </div>
         
           
        </div>
    </div>

   <section class="row container-fluid third_section hide-smartphone hide-tablet hide-mini-laptop hide-desktop">
        @foreach($prods as $product)
         @if($loop->iteration <= 4)

         @else
            <div class="col-xs-6 col-sm-4 col-md-4 col-lg-3 product" style="padding: 0px 16px 0px 16px;" >
                <div style="background-color: #FAFAFA;">
                    <a href="/product/{{$product->slug}}">
                            <h5 class="text-center">{{str_limit($product->title, 20)}}</h5>
                            <h5><b> &#8358;{{$product->price}}</b> {{$product->condition}}</h5>
                            <img src="{{ asset('uploads/cover/'.$product->image) }}" class="img-responsive img-rounded">
                    </a>
                </div>
                    <div style="height: 15px;"></div>
            </div>
            @endif
        @endforeach
    </section>

   <section class="bitcoin_section container">
    <h3 class="text-center">Buy Cryptocurrencies</h3>
    <ul class="list-group row">
    @foreach($cryptocurrencies as $cryptocurrency)
        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
            <li class="list-group-item">{{$cryptocurrency->user->name}} is selling at <span style="color: #DF8109;">&#8358;{{$cryptocurrency->price}}/{{$cryptocurrency->currency}}</span></li>
        </div>
    @endforeach
    </ul>
    </section>
    <!--products section-->
    <div style="height: 45px;"></div>
    

    <section class="container fifth_section">
         <form action="/contact" method="POST" class="form-horizontal" role="form" files="true" enctype="multipart/form-data">
        {{ csrf_field() }}
        <h4 class="text-ceter" style="text-decoration: underline;">Have a question? Leave a message:</h4>
                <div class="form-group">
                    <label for="contact_name" class="col-xs-3 col-sm-4 col-md-4 col-lg-2 control-label">Name <span class="asterisks">*</span></label>
                    <div class="col-xs-8 col-sm-5 col-md-4 col-lg-4">
                        <input type="text" name="contact_name" id="contact_name" class="form-control" required="required" placeholder="Full Name" required="true" minlength="4">
                    </div>
                </div>
                 <div class="form-group">
                    <label for="contact_email" class="col-xs-3 col-sm-4 col-md-4 col-lg-2 control-label">Email <span class="asterisks">*</span></label>
                    <div class="col-xs-8 col-sm-5 col-md-4 col-lg-4">
                        <input type="text" name="contact_email" id="contact_email" class="form-control" required="required" placeholder="Email Address" required="true">
                    </div>
                </div>
                <div class="form-group">
                    <label for="contact_msg" class="col-xs-3 col-sm-4 col-md-4 col-lg-2 control-label">Message <span class="asterisks">*</span></label>
                    <div class="col-xs-8 col-sm-5 col-md-4 col-lg-4">
                    <textarea class="form-control" rows="5" placeholder="Type Message" name="contact_msg"></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-xs-12 col-sm-8 col-md-7 col-lg-4 col-sm-offset-2">
                        <button type="submit" class="btn btn-primary btn-block btn-sm">
                            Send
                        </button>
                    </div>
                </div>
        </form>
    </section>
 </div>   
    <!--products section-->
@endsection
<script type="text/javascript">

    function leftMove() {
        $('#rightevent').hide();
        $('#leftevent').show();
        $('#rightc').css('border-bottom', 'none');
        $('#leftc').css('border-bottom', '1px solid grey');
    } 
    function rightMove() {
        $('#leftevent').hide();
        $('#rightevent').show();
        $('#leftc').css('border-bottom', 'none');
        $('#rightc').css('border-bottom', '1px solid grey');
    }
    //==$(document).ready(function () {  border-bottom: 1px solid grey;
    $('#rightevent').hide();
    $('#leftc').css('border-bottom', '1px solid grey');
//});

</script>
