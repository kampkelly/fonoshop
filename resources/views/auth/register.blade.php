@extends('layouts.new_master')

@section('content')
<div class="container register">
<style type="text/css">
    body {
        background-color: #FAFAFA;
    }
</style>
    <form action="/newregister" method="POST" class="form-horizontal first-form" role="form" files="true" enctype="multipart/form-data">
    {{ csrf_field() }}
        <h4 class="text-center">Please signup to sell your product</h4>
            @if(@isset ($price))
                <div class="form-group">
                    <label for="product_title" class="col-xs-3 col-sm-4 col-md-4 col-lg-4 control-label">Title <span class="asterisks">*</span></label>
                    <div class="col-xs-8 col-sm-5 col-md-4 col-lg-4">
                        <input type="text" name="product_title" id="product_title" class="form-control" required="required" placeholder="Name of product" required="true" minlength="1" title="Enter name of the product you want to sell" value="{{$product_title}}" style="background-color: #f2f2f2;">
                    </div>
                </div>
                 <div class="form-group">
                    <label for="price" class="col-xs-3 col-sm-4 col-md-4 col-lg-4 control-label">Price <span class="asterisks">*</span></label>
                    <div class="col-xs-8 col-sm-5 col-md-4 col-lg-4">
                        <input type="text" name="price" id="price" class="form-control" required="required" placeholder="Price of product" required="true" title="Enter price of product in naira"  value="{{$price}}" style="background-color: #f2f2f2;">
                    </div>
                </div>
            @else
                 <div class="form-group">
                    <label for="product_title" class="col-xs-3 col-sm-4 col-md-4 col-lg-4 control-label">Title <span class="asterisks">*</span></label>
                    <div class="col-xs-8 col-sm-5 col-md-4 col-lg-4">
                        <input type="text" name="product_title" id="product_title" class="form-control" required="required" placeholder="Name of product" required="true" minlength="1"  title="Enter name of the product you want to sell">
                    </div>
                </div>
                 <div class="form-group">
                    <label for="price" class="col-xs-3 col-sm-4 col-md-4 col-lg-4 control-label">Price <span class="asterisks">*</span></label>
                    <div class="col-xs-8 col-sm-5 col-md-4 col-lg-4">
                        <input type="text" name="price" id="price" class="form-control" required="required" placeholder="Price of product" title="Enter price of product in naira" required="true">
                    </div>
                </div>
            @endif
                <div class="form-group">
                    <label for="phone" class="col-xs-3 col-sm-4 col-md-4 col-lg-4 control-label">Category <span class="asterisks">*</span></label>
                    <div class="col-xs-8 col-sm-5 col-md-4 col-lg-4">
                        <select name="category_id" id="category_id" class="form-control" title="Choose the category does the product falls in">
                            @foreach($categories as $category)
                                <option value="{{$category->id}}" required="true">{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="image" class="col-xs-3 col-sm-4 col-md-4 col-lg-4 control-label">Cover Photo <span class="asterisks">*</span></label>
                    <div class="col-xs-8 col-sm-5 col-md-4 col-lg-4">
                    <!--    <input type="file" name="photo" id="photo" placeholder="Enter Title" class="btn btn-success"> --><span class="asterisks small">(cover photo, not more than 600kb)</span>
                        <input type="file" name="image" id="image" class="btn btn-warning btn-block" required="true" accept="image/*" onchange="validateFileType()">
                    </div>
                </div>
                <div class="form-group">
                    <label for="photo" class="col-xs-3 col-sm-4 col-md-4 col-lg-4 control-label">Additional Photos <span class="asterisks">*</span></label>
                    <div class="col-xs-8 col-sm-5 col-md-4 col-lg-7">
                    <!--    <input type="file" name="photo" id="photo" placeholder="Enter Title" class="btn btn-success"> --><span class="asterisks small">(multiple photos,each not more than 600kb)</span>
                        <input type="file" name="photos[]" id="files" class="btn btn-success" accept="image/*" onchange="validateFileType()" multiple />
                    </div>
                </div>
                <div class="form-group">
                    <label for="price" class="col-xs-3 col-sm-4 col-md-4 col-lg-4 control-label">Description <span class="asterisks">*</span></label>
                    <div class="col-xs-8 col-sm-5 col-md-4 col-lg-4">
                        <textarea class="form-control" rows="2" columns="1" name="description" placeholder="Enter full description of product including accessories, functions, etc." title="Fully describe the product" required="true"></textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-0 col-sm-0 col-md-0 col-lg-3">
                    
                    </div>
                    <div class="col-xs-2 col-sm-2 col-md-3 col-lg-1">
                        <label>Condition <span class="asterisks">*</span></label>
                    </div>
                    <div class="col-xs-2 col-sm-3 col-md-1 col-lg-1 col-xs-offset-2 col-sm-offset-2 col-md-offset-2 col-lg-offset-0" style="margin-top: -15px">
                        <div class="radio">
                            <label>
                                <input type="radio" name="condition" id="input" value="new" checked="" title="New Product">
                                New
                            </label>
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-4 col-md-6 col-lg-6" style="margin-top: -15px">
                        <div class="radio">
                            <label>
                                <input type="radio" name="condition" id="input" value="used" title="Used Product">
                                Used
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="state" class="col-xs-3 col-sm-4 col-md-4 col-lg-4 control-label">State <span class="asterisks">*</span></label>
                    <div class="col-xs-8 col-sm-5 col-md-4 col-lg-4">
                        <input type="text" name="state" id="state" class="form-control" required="required" placeholder="Enter City" required="true" title="Enter City" value="Edo" disabled>
                    </div>
                </div>
                <div class="form-group">
                    <label for="city" class="col-xs-3 col-sm-4 col-md-4 col-lg-4 control-label">Location <span class="asterisks">*</span></label>
                    <div class="col-xs-8 col-sm-5 col-md-4 col-lg-4">
                        <select name="city" id="city" class="form-control" title="Enter State" required>
                            @foreach($cities as $city)
                                <option value="{{$city}}" required="true">{{$city}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="phone" class="col-xs-3 col-sm-4 col-md-4 col-lg-4 control-label">Phone <span class="asterisks">*</span></label>
                    <div class="col-xs-8 col-sm-5 col-md-4 col-lg-4">
                        <input type="text" name="phone" id="phone" class="form-control" required="required" placeholder="Phone Number" required="true" title="Enter contact phone number">
                    </div>
                </div>
                <div class="form-group">
                    <label for="name" class="col-xs-3 col-sm-4 col-md-4 col-lg-4 control-label">Name <span class="asterisks">*</span></label>
                    <div class="col-xs-8 col-sm-5 col-md-4 col-lg-4">
                        <input type="text" name="name" id="name" class="form-control" required="required" placeholder="Full Name" required="true" title="Enter Full name">
                    </div>
                </div>
                <div class="form-group">
                    <label for="email" class="col-xs-3 col-sm-4 col-md-4 col-lg-4 control-label">Email <span class="asterisks">*</span></label>
                    <div class="col-xs-8 col-sm-5 col-md-4 col-lg-4">
                        <input type="email" name="email" id="email" class="form-control" required="required" placeholder="Email Address" required="true" title="Enter Email Address">
                    </div>
                </div>             
                <div class="form-group">
                    <label for="password" class="col-xs-3 col-sm-4 col-md-4 col-lg-4 control-label">Pasword <span class="asterisks">*</span></label>
                    <div class="col-xs-8 col-sm-5 col-md-4 col-lg-4">
                        <input type="password" name="password" id="password" class="form-control" required="required" placeholder="Enter Password" required="true" minlength="8" title="Enter password">
                    </div>
                </div>
                 <div class="form-group">
                    <div class="col-xs-12 col-sm-8 col-md-7 col-lg-4 col-sm-offset-4">
                        <button type="submit" class="btn btn-primary btn-block btn-sm">
                            Submit
                        </button>
                    </div>
                </div>
    </form>
</div>
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('.search_top').hide();
        $('.search_top').css('visibility', 'hidden');
        $('.search_desktop').hide();
        //File Preview
        $("#files").click(function() {
            $('#files').val("");
            $('.imageThumb').remove();
        }); 

    if(window.File && window.FileList && window.FileReader) {
        $("#files").on("change",function(e) {
            var files = e.target.files ,
            filesLength = files.length ;
            for (var i = 0; i < filesLength ; i++) {
                var f = files[i]
                var fileReader = new FileReader();
                fileReader.onload = (function(e) {
                    var file = e.target;
                    $("<img></img>",{
                        class : "imageThumb",
                        src : e.target.result,
                        title : file.name
                    }).insertAfter("#files"); 
               });
               fileReader.readAsDataURL(f);
           }
      });
     } else { alert("Your browser doesn't support the File API") }
    });
</script>
