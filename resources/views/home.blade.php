@extends('layouts.new_master')

@section('content')
<style type="text/css">
    #bk_second {
      /*  background-image: -webkit-linear-gradient(rgba(16, 52, 53, 0.592156862745098), rgba(0, 0, 0, 0.6980392156862745)), url("/homepage/new/business.jpg"); */
        background-image: -webkit-linear-gradient(left, rgba(23, 22, 22, 0.58), rgba(23, 22, 22, 0.58)), url("/homepage/new/business.jpg");
        background-position: center;
        background-size: cover;
    }
    input {
        color: white;
        background-color: #F8F8F8;
    }
    .square-thumb {
            width: 200px;
            height: 600px;
        }
</style>
<div class="new_cover">
    <div style="height: 0px"></div>
    <div class="container firstsection" style="background-color: #f5fafd; height: 83vh;">
        <h3 style="color: #333333;">SalesNaija - <span style="font-size: 20px; color: #333333;" class="hspan">purchase all IT gadgets (computers, phones, accessories, etc.)</span></h3>
        <div class="row">
            <div class="col-xs-12 col-sm-5 col-md-5 col-lg-6">
                <div class="introtext1">
                    <h4>Find a product, contact seller, buy! <strong>It's that easy!</strong></h4>
                 <!--   <h5 class="text-center">- bringing technology closer!</h5> -->
                </div>
                <div class="introtext2">
                    <h4 class="text-center">Find a product, contact seller, buy!<br> <strong style="font-size: 15px;">It's that easy!</strong></h4>
                 <!--   <h5 class="text-center">- bringing technology closer!</h5> -->
                </div>
                <div class="text-center">
                    
                    <a href="#" class="btn btn-md btn-primary">See All Products</a>
                </div>
                <hr>
                <h4 class="text-center">Our Categories</h4>
                <ul class="row list-unstyled text-center intrtext1">
                    <li class="col-xs-5 col-sm-5 col-md-5 col-lg-6"><h5>Computers</h5></li>
                    <li class="col-xs-5 col-sm-5 col-md-5 col-lg-6"><h5>Mobile Phones</h5></li>
                    <li class="col-xs-5 col-sm-5 col-md-5 col-lg-6"><h5>IT Softwares</h5></li>
                    <li class="col-xs-5 col-sm-5 col-md-5 col-lg-6"><h5>Accessories</h5></li>
                </ul>
                <h5 class="text-center introtext1">Buy Cryptocurrencies</h5>
                <ul class="row list-unstyled text-center introtext1">
                    <li class="col-xs-5 col-sm-5 col-md-5 col-lg-6"><h5>Bitcoins</h5></li>
                    <li class="col-xs-5 col-sm-5 col-md-5 col-lg-6"><h5>Perfect Money</h5></li>                
                </ul>
            </div>
            <div class="col-xs-12 col-sm-7 col-md-7 col-lg-6">
            <h5 class="text-capitalize"><b>Want to sell?</b> quickly upload your product below</h5>
            <form action="/newregister" method="POST" class="form-inline first-form" style="paddng-left: 100px;" role="form" files="true" enctype="multipart/form-data">
                {{ csrf_field() }}
                <input type="email" name="email" id="email" class="form-control" required="required" placeholder="Email Address" required="true">
                <input type="email" name="email" id="email" class="form-control" required="required" placeholder="Product Title" required="true">
                <input type="submit" name="email" id="email" class="form-control btn btn-sm btn-warning" required="required" placeholder="Email Address" required="true" value="Continue">
            </form>
                 <!--carousel-->
                 <div id="carousel-id" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carousel-id" data-slide-to="0" class=""></li>
                        <li data-target="#carousel-id" data-slide-to="1" class=""></li>
                        <li data-target="#carousel-id" data-slide-to="2" class="active"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="item">
                            <img data-src="holder.js/900x500/auto/#777:#7a7a7a/text:First slide" alt="First slide" src="homepage/new/3.jpg" style="height: 371.5px; filter: blur(0px) brightness(0.8) grayscale(0%);">
                            <div class="container">
                                <div class="carousel-caption">
                                    <h3 style="margin-top: -160px;">Be Satisfied With What You Get!</h3>
                                    <p></p>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <img data-src="holder.js/900x500/auto/#666:#6a6a6a/text:Second slide" alt="Second slide" src="homepage/new/2remod.jpg" class="img-responsive" style="height: 371.5px; filter: blur(0px) brightness(0.8) grayscale(10%);">
                            <div class="container">
                                <div class="carousel-caption">
                                    <h3 style="margin-top: -160px;">Everything Tech Related.</h3>
                                    <p></p>
                                    <p><a class="btn btn-lg btn-primary" href="#" role="button">Browse Products</a></p>
                                </div>
                            </div>
                        </div>
                        <div class="item active">
                            <img data-src="holder.js/900x500/auto/#555:#5a5a5a/text:Third slide" alt="Third slide" src="homepage/new/1.jpg" style="height: 371.5px; filter: blur(0px) brightness(0.8) grayscale(20%);">
                            <div class="container">
                                <div class="carousel-caption">
                                    <h2 style="margin-top: -200px;">Buy New or Used Items</h2>
                                    <p></p>
                                    <p><a class="btn btn-lg btn-warning" href="#" role="button">Learn More</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a class="left carousel-control" href="#carousel-id" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
                    <a class="right carousel-control" href="#carousel-id" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
                </div>
                 <!--carousel-->
            </div>
        </div>
    </div>
    <div style="height: 90px;"></div>
    <section style="height: 100vh; background-color: #49422C;">
        <div class="container" style="height: 32vh;">
            <div class="row">
                <div class="col-xs-4 col-sm-3 col-md-3 col-lg-3">
                    <h4 class="text-center" style="color: white;">Computers</h4>
                    <img src="homepage/new/cat/1.jpg" style="filter: blur(0px) brightness(1) grayscale(0%);" class="img-responsive img-thumbnail">
                </div>
                <div class="col-xs-4 col-sm-3 col-md-3 col-lg-3">
                    <h4 class="text-center" style="color: white;">Softwares</h4>
                    <img src="homepage/new/cat/1.jpg" style="filter: blur(0px) brightness(1) grayscale(0%);" class="img-responsive img-thumbnail">
                </div>
                <div class="col-xs-4 col-sm-3 col-md-3 col-lg-3">
                    <h4 class="text-center" style="color: white;">General</h4>
                    <img src="homepage/new/cat/1.jpg" style="filter: blur(0px) brightness(1) grayscale(0%);" class="img-responsive img-thumbnail">
                </div>
                <div class="col-xs-4 col-sm-3 col-md-3 col-lg-3">
                    <h4 class="text-center" style="color: white;">Bitcoins</h4>
                    <img src="homepage/new/cat/1.jpg" style="filter: blur(0px) brightness(1) grayscale(0%);" class="img-responsive img-thumbnail">
                </div>
            </div>
        </div>
        <div style="height: 65vh; backgroud-color: green;" id="bk_second">
           <!-- <img src="homepage/new/2.jpg" style="filter: blur(0px) brightness(1) grayscale(0%); height: 65vh; width: 100%;" class="img-responsive img-rounded"> -->
           <div class="text-center">
               <h3 class="text-center" style="color: white; padding-top: 2.5em;">Get Quick Access To Your Laptops, Phones, Softwares</h3>
               <div style="height: 1em"></div>
               <h4 class="text-center" style="color: white; line-height: 30px;">Whatever your needs are, be it buying or selling, we cater for it. Get access to sellers within your location.<br>
               No extra charges,<br>
               Find a Seller, make a call, buy the product!<br>
               It's that easy.</h4>
               <a href="#" class="btn btn-lg btn-primary">Learn More</a>
           </div>
        </div>
    </section>
    <!--products section-->
    <?php $ka=['game','boy','boy','boy','boy','boy','boy','boy','boy','boy','boy','boy',]; ?>
    <div style="height: 45px;"></div>
    <div class="row container-fluid">
    <h3 class="text-center">Latest Products</h3>
    @foreach($products as $product)
        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-3 img-respnsive">
            <div style="padding-bottm:100%; oveflow:hidden; poition:relative;">
                <img src="{{ asset('uploads/'.$product->image) }}" class="img-responsive img-rounded" style="height: 200px; width: 100%; posiion: absolute; mx-width: 100%;max-hight: 100%;op: 40%;
      lft: 0%;">
        <div class="panel panel-defalt">
            <div class="panel-footr">
            <h6>{{str_limit($product->title, 25)}}</h6>
                <span class="pull-left">{{$product->condition}}, N{{$product->price}}</span>

                <div class="clearfix"></div>
                
            </div>
        </div>
            
            </div>
            <div style="height: 15px;"></div>
        </div>
    @endforeach
    </div>
 </div>   
    <!--products section-->
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function () {
//    jQuery('.nailthumb-container').nailthumb();
    var imgHeight = document.getElementById('firstimgheight').offsetHeight;
    document.getElementById("secondimgheight").innerHTML = imgHeight;
   // var ig = '10px';
   // $('#secondimgheight').css("height", imgHeight);
});

</script>